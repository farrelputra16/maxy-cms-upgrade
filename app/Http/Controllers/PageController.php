<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\MPageContent;
use App\Models\Partner;
use App\Models\Event;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getPages()
    {

        $sections = MPageContent::select('page_id')
            ->distinct()
            ->get();

        // dd($sections);

        return view('m_pages.index', compact('sections'));
    }

    public function getEditPage(Request $request)
    {
        $pageContents = MPageContent::where('page_id', $request->id)
            ->orderBy('order', 'asc')  // Order by 'order' column in ascending order
            ->get();

        return view('m_pages.edit', compact('pageContents'));
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
}
