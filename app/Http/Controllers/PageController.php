<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\MPageContent;
use App\Models\Partner;
use App\Models\Event;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    public function getPages()
    {

        // $sections = MPageContent::select('page_id', 'status')
        //     ->distinct()
        //     ->get();
        // dd($sections);
        // return view('m_pages.index', compact('sections'));
        return view('m_pages.index');
    }

    public function getPagesData()
    {
        // Fetch pages with their details
        $pages = MPageContent::select('page_id', 'status')
            ->distinct()
            ->get()
            ->map(function ($page) {
                // Map page_id to page names
                switch ($page->page_id) {
                    case 1:
                        $pageName = 'Home';
                        break;
                    case 2:
                        $pageName = 'Browse Courses';
                        break;
                    case 3:
                        $pageName = 'Blog';
                        break;
                    default:
                        $pageName = 'Unknown Page';
                }

                return [
                    'no' => null, // This will be handled by DataTables
                    'page_id' => $page->page_id,
                    'page_name' => $pageName,
                    'status' => $page->status == 1 ? 'Aktif' : 'Non Aktif',
                    'action' => route('getEditPage', ['id' => $page->page_id])
                ];
            });

        // Return DataTables compatible JSON response
        return DataTables::of($pages)
            ->addIndexColumn() // This adds the index column (equivalent to $loop->iteration)
            ->addColumn('action', function($page) {
                return '<a href="' . $page['action'] . '" class="btn btn-primary rounded">Ubah</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // public function getEditPage(Request $request)
    // {
    //     $pageContents = MPageContent::where('page_id', $request->id)
    //         ->orderBy('order', 'asc')  // Order by 'order' column in ascending order
    //         ->get();

    //     return view('m_pages.edit', compact('pageContents'));
    // }

    public function getEditPage(Request $request)
    {
        // Ambil konten dari database
        $pageContents = MPageContent::where('page_id', $request->id)
            ->orderBy('order', 'asc')
            ->get();

        // Ambil konten elemen tertentu dari situs eksternal
        $heroContent = $this->getExternalSection('https://lms.stie-binakarya.ac.id', '#home'); // Ganti URL dan selector

        $partnerContent = $this->getExternalSection('https://lms.stie-binakarya.ac.id', '#partner-text');

        $eventContent = $this->getExternalSection('https://lms.stie-binakarya.ac.id', '#event-text');

        $blogSmallContent = $this->getExternalSection('https://lms.stie-binakarya.ac.id/blog', '#all-blog');

        $blogTrendingContent = $this->getExternalSection('https://lms.stie-binakarya.ac.id/blog', '#trending');

        // Gabungkan data dan lempar ke view
        return view('m_pages.edit', compact('pageContents', 'heroContent', 'partnerContent', 'eventContent', 'blogSmallContent', 'blogTrendingContent'));
    }

    // Save the page content
    public function savePageContent(Request $request)
    {
        $request->validate([
            'content.*' => 'required|string',
            'image.*' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        for ($i = 0; $i < count($request->page_id); $i++) {
            $imagePath = null;
            if ($request->hasFile('image.' . $i)) {
                $imagePath = $request->file('image.' . $i)->storeAs('m_pages', $request->file('image.' . $i)->getClientOriginalName(), 'public');
            } elseif(isset($request->oldImage[$i])) {


                $imagePath = $request->oldImage[$i];
            }

            $orderBy = 1;  // default order
            if ($request->page_id[$i] == 3) {


                if ($request->section_name[$i] == 'blog-trending') {
                    $orderBy = $request->order[$i] == 2 ? 1 : 2;
                } elseif ($request->section_name[$i] == 'blog-small') {
                    $orderBy = $request->order[$i] == 2 ? 1 : 2;
                }
            }

            if ($request->section_name[$i] == 'hero') {
                MPageContent::updateOrCreate(
                    [
                        'page_id' => $request->page_id[$i],
                        'section_name' => $request->section_name[$i],
                    ],
                    [
                        'content' => $request->content[$i],

                        'image' => $imagePath,
                    ]
                );
            } elseif ($request->section_name[$i] == 'blog-trending' || $request->section_name[$i] == 'blog-small') {
                MPageContent::updateOrCreate(
                    [
                        'page_id' => $request->page_id[$i],
                        'section_name' => $request->section_name[$i],
                    ],
                    [
                        'order' => $orderBy,
                    ]
                );
            } else {
                MPageContent::updateOrCreate(
                    [
                        'page_id' => $request->page_id[$i],
                        'section_name' => $request->section_name[$i],
                    ],
                    [
                        'content' => $request->content[$i],
                        'order_by' => $orderBy,
                        'image' => $imagePath,
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'All page content saved successfully.');
    }

    public function updateBlogOrder(Request $request)
    {
        $request->validate([
            'section1' => 'required|string',
            'section2' => 'required|string',
        ]);

        // Define new order values
        $orderData = [
            'blog-small' => 1,
            'blog-trending' => 2,
        ];

        // Swap order if necessary
        if ($request->section1 == 'blog-trending') {
            $orderData['blog-small'] = 2;
            $orderData['blog-trending'] = 1;
        }

        // Update the database
        MPageContent::where('page_id', 3)->where('section_name', 'blog-small')
            ->update(['order_by' => $orderData['blog-small']]);
        MPageContent::where('page_id', 3)->where('section_name', 'blog-trending')
            ->update(['order_by' => $orderData['blog-trending']]);

        return response()->json(['success' => true, 'message' => 'Order updated successfully']);
    }


    public function showPage(Request $request)
    {

        $page = MPageContent::find($request->id);

        // Home Page
        if ($page->page_name == 'home') {
            $bootcampCourses = Course::getRapidBootcampCourse();
            $miniBootcampCourses = Course::getMiniBootcampCourse();

            foreach ($bootcampCourses as $course) {
                $courseId = Course::find($course->id);
                $moduleParentAmount = CourseModule::getModuleParentCount($courseId->id);
                $course->module_parents = $moduleParentAmount;
            }

            foreach ($miniBootcampCourses as $course) {
                $courseId = Course::find($course->id);
                $moduleParentAmount = CourseModule::getModuleParentCount($courseId->id);
                $course->module_parents = $moduleParentAmount;
            }

            return view('m_pages.show', [
                'page' => $page,
                'allCompanyPartnerLogo' => Partner::getAllCompanyPartnerLogo(),
                'allUniversityPartnerLogo' => Partner::getAllCompanyPartnerLogo(),
                'upcomingEvents' => Event::getAllPublicEvent(),
                'rapidBootcampCourse' => $bootcampCourses,
                'miniBootcampCourse' => $miniBootcampCourses,
                // 'coursePackages' => $this->getCoursePackage(),
                // 'packageDiffs' => $this->getPackageBenefitDiffs(),
                // 'coursePackageBenefits' => $this->getCoursePackageBenefits(),
                // 'breadcrumbs' => $this->index(),
            ]);
        }

        // Browse-course
        else if ($page->page_name == 'browse-course') {
            return view('home');
        } else if ($page->page_name == 'blog') {
            return view('home');
        }

        return view('m_pages.show', compact($page));
    }

    public function getSection()
    {
        $url = 'https://example.com'; // Ganti dengan URL target
        $client = new Client();

        try {
            // Ambil HTML dari URL target
            $response = $client->get($url);
            $htmlContent = $response->getBody()->getContents();

            // Load HTML ke DOMDocument
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true); // Supaya tidak error dengan HTML yang tidak valid
            $dom->loadHTML($htmlContent);
            libxml_clear_errors();

            // Gunakan XPath untuk memilih elemen tertentu
            $xpath = new \DOMXPath($dom);
            $elements = $xpath->query('//*[@id="home"]'); // Ganti dengan ID/selector elemen yang diinginkan

            $selectedContent = '';
            if ($elements->length > 0) {
                $selectedContent = $dom->saveHTML($elements->item(0)); // Ambil elemen pertama dengan ID tersebut
            }
            // Kembalikan bagian yang diambil ke view
            return view('show-section', ['content' => $selectedSection]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Tidak dapat mengambil data dari URL.'], 500);
        }
    }

    private function getExternalSection(string $url, string $selector)
    {
        $client = new Client();

        try {
            // Ambil HTML dari situs eksternal
            $response = $client->get($url);
            $htmlContent = $response->getBody()->getContents();

            // Load HTML ke DOMDocument
            $dom = new \DOMDocument();
            libxml_use_internal_errors(true);
            $dom->loadHTML($htmlContent);
            libxml_clear_errors();

            // Gunakan XPath untuk memilih elemen
            $xpath = new \DOMXPath($dom);

            // Ubah selector menjadi XPath
            if (strpos($selector, '#') === 0) {
                $id = substr($selector, 1); // Hilangkan '#' di depan ID
                $query = "//*[@id='$id']";
            } else {
                $query = $selector;
            }

            $elements = $xpath->query($query);

            if ($elements->length > 0) {
                return $dom->saveHTML($elements->item(0)); // Kembalikan elemen yang ditemukan
            }

            return '<p>Elemen tidak ditemukan.</p>';
        } catch (\Exception $e) {
            return '<p>Gagal mengambil data dari situs eksternal.</p>';
        }
    }
}
