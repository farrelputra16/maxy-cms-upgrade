<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursePackage;
use App\Models\MCourseType;
use App\Models\MDifficultyType;
use App\Models\Category;
use App\Models\CourseCategory;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    function getCourse()
    {
        return view('course.indexv3');
    }

    function getCourseData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
        ];

        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $partners = Course::with('type')
            ->whereHas('type', function ($q) {
                $q->where('name', '!=', 'MBKM');
            })
            ->select('id', 'name', 'fake_price', 'price', 'm_course_type_id', 'credits', 'duration', 'short_description', 'description', 'content', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
            ->orderBy($finalOrderColumn, $orderDirection);

        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'm_course_type_id') {
                $partners->whereHas('type', function ($query) use ($columnSearchValue) {
                    $query->where('name', 'like', "%{$columnSearchValue}%");
                });
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $partners->where('status', '=', 0);
                else
                    $partners->where('status', '=', 1);
            } else {
                $partners->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        if (env('APP_ENV') == 'local') {
            return DataTables::of($partners)
                ->addIndexColumn() // Adds DT_RowIndex for serial number
                ->addColumn('id', function ($row) {
                    return $row->id;
                })
                ->addColumn('name', function ($row) {
                    return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                        . \Str::limit(e($row->name), 30)
                        . '</span>';
                })
                ->addColumn('m_course_type_id', function ($row) {
                    return $row->type->name ?? '-';
                })
                ->addColumn('credits', function ($row) {
                    return $row->credits;
                })
                ->addColumn('duration', function ($row) {
                    return $row->duration;
                })
                ->addColumn('short_description', function ($row) {
                    return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                        . e(strip_tags($row->short_description)) . '">'
                        . (!empty($row->short_description) ? \Str::limit(strip_tags($row->short_description), 30) : '-')
                        . '</span>';
                })
                ->addColumn('description', function ($row) {
                    return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                        . e(strip_tags($row->description)) . '">'
                        . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-')
                        . '</span>';
                })
                ->addColumn('content', function ($row) {
                    return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                        . e(strip_tags($row->content)) . '">'
                        . (!empty($row->content) ? \Str::limit(strip_tags($row->content), 30) : '-')
                        . '</span>';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->addColumn('created_id', function ($row) {
                    return $row->created_id;
                })
                ->addColumn('updated_at', function ($row) {
                    return $row->updated_at;
                })
                ->addColumn('updated_id', function ($row) {
                    return $row->updated_id;
                })
                ->addColumn('status', function ($row) {
                    return '<button
                        class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '"
                        data-id="' . $row->id . '"
                        data-status="' . $row->status . '"
                        data-model="Course">
                        ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                    </button>';
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('getEditCourse', ['id' => $row->id]) . '"
                                class="btn btn-primary rounded">Ubah</a>
                            <a href="' . route('getCourseModule', ['course_id' => $row->id, 'page_type' => 'LMS']) . '"
                                class="btn btn-outline-primary rounded-end">Daftar Modul</a>';
                })
                ->orderColumn('id', 'id $1')
                ->rawColumns(['name', 'short_description', 'description', 'content', 'status', 'action'])
                ->make(true);
        } else {
            return DataTables::of($partners)
                ->addIndexColumn() // Adds DT_RowIndex for serial number
                ->addColumn('id', function ($row) {
                    return $row->id;
                })
                ->addColumn('name', function ($row) {
                    return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                        . \Str::limit(e($row->name), 30)
                        . '</span>';
                })
                ->addColumn('fake_price', function ($row) {
                    return $row->fake_price;
                })
                ->addColumn('price', function ($row) {
                    return $row->price;
                })
                ->addColumn('m_course_type_id', function ($row) {
                    return $row->type->name ?? '-';
                })
                ->addColumn('credits', function ($row) {
                    return $row->credits;
                })
                ->addColumn('duration', function ($row) {
                    return $row->duration;
                })
                ->addColumn('short_description', function ($row) {
                    return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                        . e(strip_tags($row->short_description)) . '">'
                        . (!empty($row->short_description) ? \Str::limit(strip_tags($row->short_description), 30) : '-')
                        . '</span>';
                })
                ->addColumn('description', function ($row) {
                    return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                        . e(strip_tags($row->description)) . '">'
                        . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-')
                        . '</span>';
                })
                ->addColumn('content', function ($row) {
                    return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                        . e(strip_tags($row->content)) . '">'
                        . (!empty($row->content) ? \Str::limit(strip_tags($row->content), 30) : '-')
                        . '</span>';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at;
                })
                ->addColumn('created_id', function ($row) {
                    return $row->created_id;
                })
                ->addColumn('updated_at', function ($row) {
                    return $row->updated_at;
                })
                ->addColumn('updated_id', function ($row) {
                    return $row->updated_id;
                })
                ->addColumn('status', function ($row) {
                    return '<button
                        class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '"
                        data-id="' . $row->id . '"
                        data-status="' . $row->status . '"
                        data-model="Course">
                        ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                    </button>';
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('getEditCourse', ['id' => $row->id]) . '"
                                class="btn btn-primary rounded">Ubah</a>
                            <a href="' . route('getCourseModule', ['course_id' => $row->id, 'page_type' => 'LMS']) . '"
                                class="btn btn-outline-primary rounded-end">Daftar Modul</a>';
                })
                ->orderColumn('id', 'id $1')
                ->rawColumns(['name', 'short_description', 'description', 'content', 'status', 'action'])
                ->make(true);
        }
    }

    function getCourseMBKM()
    {
        return view('course.MBKM.indexv3');
    }

    function getCourseMBKMData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
        ];

        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $partners = Course::with('type')
            ->whereHas('type', function ($q) {
                $q->where('name', 'MBKM');
            })
            ->select('id', 'name', 'short_description', 'description', 'content', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
            ->orderBy($finalOrderColumn, $orderDirection);

        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'm_course_type_id') {
                $partners->whereHas('type', function ($query) use ($columnSearchValue) {
                    $query->where('name', 'like', "%{$columnSearchValue}%");
                });
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $partners->where('status', '=', 0);
                else
                    $partners->where('status', '=', 1);
            } else {
                $partners->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($partners)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('short_description', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                    . e(strip_tags($row->short_description)) . '">'
                    . (!empty($row->short_description) ? \Str::limit(strip_tags($row->short_description), 30) : '-')
                    . '</span>';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                    . e(strip_tags($row->description)) . '">'
                    . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-')
                    . '</span>';
            })
            ->addColumn('content', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                    . e(strip_tags($row->content)) . '">'
                    . (!empty($row->content) ? \Str::limit(strip_tags($row->content), 30) : '-')
                    . '</span>';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->addColumn('created_id', function ($row) {
                return $row->created_id;
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at;
            })
            ->addColumn('updated_id', function ($row) {
                return $row->updated_id;
            })
            ->addColumn('status', function ($row) {
                return '<button
                    class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '"
                    data-id="' . $row->id . '"
                    data-status="' . $row->status . '"
                    data-model="Course">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditMBKM', ['id' => $row->id]) . '"
                            class="btn btn-primary rounded">Ubah</a>
                        <a href="' . route('getCourseModule', ['course_id' => $row->id, 'page_type' => 'LMS']) . '"
                            class="btn btn-outline-primary rounded">Daftar Modul</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'short_description', 'description', 'content', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    function getAddCourse()
    {
        $allPackagePrices = CoursePackage::where('status', 1)->get();
        $allCourseTypes = MCourseType::where('status', 1)->get();
        $allCourseDifficulty = MDifficultyType::where('status', 1)->get();
        $allCourseCategory = Category::where('status', 1)->get();
        $allCoursePackages = CoursePackage::where('status', 1)->get();
        $allDifficultyTypes = MDifficultyType::where('status', 1)->get();

        return view('course.manage', [
            'allPackagePrices' => $allPackagePrices,
            'allCourseTypes' => $allCourseTypes,
            'allCourseDifficulty' => $allCourseDifficulty,
            'allCourseCategory' => $allCourseCategory,
            'allCoursePackages' => $allCoursePackages,
            'allDifficultyTypes' => $allDifficultyTypes,
        ]);
    }

    function getAddMBKM()
    {
        $allPackagePrices = CoursePackage::where('status', 1)->get();
        $allCourseTypes = MCourseType::where('status', 1)->get();
        $allCourseDifficulty = MDifficultyType::where('status', 1)->get();
        $allCourseCategory = Category::where('status', 1)->get();
        $allCoursePackages = CoursePackage::where('status', 1)->get();


        // Ambil ID berdasarkan slug 'mbkm'
        $mbkmType = DB::table('m_course_type')->where('slug', 'mbkm')->where('status', 1)->first();
        if ($mbkmType == null) {
            return redirect()->back()->with('error', 'Course Type MBKM not found.');
        }

        return view('course.MBKM.addv3', [
            'allPackagePrices' => $allPackagePrices,
            'allCourseTypes' => $allCourseTypes,
            'allCourseDifficulty' => $allCourseDifficulty,
            'allCourseCategory' => $allCourseCategory,
            'allCoursePackages' => $allCoursePackages,
            'mbkmTypeId' => $mbkmType->id // Kirim ID MBKM ke view
        ]);
    }

    public function postAddCourse(Request $request)
    {
        // validation with dynamic rules
        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'slug' => 'required',
            'type' => 'required',
            'file_image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048', // max filesize 2MB
            ],
            'level' => 'required|numeric', // difficulty level
            'courseCategory' => 'required|array',
            'courseCategory.*' => 'exists:m_category_course,id',
            'short_description' => 'nullable|string', // preview text
            'content' => 'required|string', // full content text
            'payment_link' => 'nullable|string|max:255',
            'mini_fake_price' => 'nullable|string',
            'mini_price' => 'nullable|string',
            'credits' => 'required|numeric|min:1',
            'description' => 'nullable|string', // admin notes

        ], [
            'file_image.max' => 'File is too large! (max 2MB)', // Pesan error khusus
            'file_image.image' => 'File must be a type of image! (jpeg, png, jpg, gif, svg)',
            'file_image.mimes' => 'File must be a type of image! (jpeg, png, jpg, gif, svg)',
            'payment_link.url' => 'Payment link must use a valid URL!',
            'payment_link.regex' => 'Payment link must start with "https://"!',
            'name.regex' => 'Name must only contain letters, numbers, or spaces!',
        ]);

        try {
            // upload image file
            $fileName = null;
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('/uploads/course_img'), $fileName);
            }

            // remove all non-numeric characters from price
            $trimDiscountedPrice = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->mini_fake_price));
            $trimPrice = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->mini_price));

            // if there is discounted price, put it on price. original price will be put on "fake price" column instead.
            if($trimDiscountedPrice > 0){
                $fakePrice = $trimPrice;
                $price = $trimDiscountedPrice;
            }

            // create new course
            $create = Course::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'image' => $fileName,
                'credits' => $request->credits,
                'duration' => $request->duration,
                'short_description' => $request->short_description,
                'm_course_type_id' => $request->type,
                'course_package_id' => $request->type == 2 ? null : $request->package,
                'm_difficulty_type_id' => $request->level,
                'content' => $request->content,
                'fake_price' => (float) $fakePrice,
                'price' => (float) $price,
                'payment_link' => env('APP_ENV') != 'local' ? $request->payment_link : null,
                'description' => $request->description,
                'status' => $request->status == '' ? 0 : 1,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create) {
                session()->flash('course_added', 'Course created successfully! Please add new modules for this course.');
                $categories = $request->courseCategory;

                // add course category to category pivot table
                if ($categories) {
                    foreach ($categories as $categoryId) {
                        DB::table('course_category')->insert([
                            'course_id' => $create->id,
                            'category_id' => $categoryId,
                            'created_id' => Auth::user()->id,
                            'updated_id' => Auth::user()->id
                        ]);
                    }
                }

                // redirect based on course type
                $courseType = MCourseType::find($request->type);
                if ($courseType && $courseType->name === 'MBKM') {
                    return redirect()->route('getCourseMBKM')->with('success', 'Berhasil menambahkan mata kuliah MBKM!');
                } else {
                    return redirect()->route('getCourse')->with('success', 'Course created successfully!');
                }
            } else {
                return app(HelperController::class)->Warning('getCourse');
            }
        } catch (\Exception $e) {
            \Log::error('Error adding course: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Error while trying to create the course'])->withInput();
        }
    }



    function getEditCourse(Request $request)
    {
        $idCourse = $request->id;
        $course = Course::find($idCourse);

        if (strpos($course->name, '-') !== false) {
            $parts = explode('-', $course->name, 2);
            $course->code = trim($parts[0]);
            $name = trim($parts[1]);
        } else {
            $course->code = null;
        }

        $allCourseCategory = Category::where('status', 1)->get();
        $selectedCategoryId = DB::table('course_category')
            ->where('course_id', $idCourse)
            ->pluck('category_id')
            ->toArray();


        $currentDataCourse = Course::CurrentDataCourse($idCourse);
        $currentCoursePackages = Course::CurrentCoursePackages($idCourse);

        $allCourseTypes = MCourseType::where('id', '!=', $currentDataCourse->m_course_type_id)->where('status', 1)->get();
        $allDifficultyTypes = MDifficultyType::where('id', '!=', $currentDataCourse->m_difficulty_type_id)->where('status', 1)->get();

        if ($currentCoursePackages == NULL) {
            $allCoursePackages = CoursePackage::where('status', 1)->get();
        } else {
            $allCoursePackages = CoursePackage::where('id', '!=', $currentCoursePackages->course_package_id)->where('status', 1)->get();
        } //dd($selectedCategoryId);

        // dd(explode('-', $course->name));

        return view('course.manage', [
            'course' => $course,
            'currentDataCourse' => $currentDataCourse,
            'allCourseTypes' => $allCourseTypes,
            'currentCoursePackages' => $currentCoursePackages,
            'allCoursePackages' => $allCoursePackages,
            'allDifficultyTypes' => $allDifficultyTypes,
            'allCourseCategory' => $allCourseCategory,
            'selectedCategoryId' => $selectedCategoryId,
        ]);
    }

    function getEditMBKM(Request $request)
    {
        $idCourse = $request->id;
        $courses = Course::find($idCourse);
        $allCourseCategory = Category::where('status', 1)->get();
        $selectedCategoryId = DB::table('course_category')->where('course_id', $request->id)->pluck('category_id')->toArray();

        $currentDataCourse = Course::CurrentDataCourse($idCourse);
        $currentCoursePackages = Course::CurrentCoursePackages($idCourse);

        $allCourseTypes = MCourseType::where('id', '!=', $currentDataCourse->m_course_type_id)->where('status', 1)->get();
        $allDifficultyTypes = MDifficultyType::where('id', '!=', $currentDataCourse->m_difficulty_type_id)->where('status', 1)->get();

        if ($currentCoursePackages == NULL) {
            $allCoursePackages = CoursePackage::where('status', 1)->get();
        } else {
            $allCoursePackages = CoursePackage::where('id', '!=', $currentCoursePackages->course_package_id)->where('status', 1)->get();
        } //dd($selectedCategoryId);

        return view('course.MBKM.editv3', [
            'courses' => $courses,
            'currentDataCourse' => $currentDataCourse,
            'allCourseTypes' => $allCourseTypes,
            'currentCoursePackages' => $currentCoursePackages,
            'allCoursePackages' => $allCoursePackages,
            'allDifficultyTypes' => $allDifficultyTypes,
            'allCourseCategory' => $allCourseCategory,
            'selectedCategoryId' => $selectedCategoryId,
        ]);
    }


    function postEditCourse(Request $request)
    {
        // validation with dynamic rules
        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'slug' => 'required',
            'type' => 'required',
            'file_image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048', // max filesize 2MB
            ],
            'level' => 'required|numeric', // difficulty level
            'courseCategory' => 'required|array',
            'courseCategory.*' => 'exists:m_category_course,id',
            'short_description' => 'nullable|string', // preview text
            'content' => 'required|string', // full content text
            'payment_link' => 'nullable|string|max:255',
            'mini_fake_price' => 'nullable|string',
            'mini_price' => 'nullable|string',
            'credits' => 'required|numeric|min:1',
            'description' => 'nullable|string', // admin notes

        ], [
            'file_image.max' => 'File is too large! (max 2MB)', // Pesan error khusus
            'file_image.image' => 'File must be a type of image! (jpeg, png, jpg, gif, svg)',
            'file_image.mimes' => 'File must be a type of image! (jpeg, png, jpg, gif, svg)',
            'payment_link.url' => 'Payment link must use a valid URL!',
            'payment_link.regex' => 'Payment link must start with "https://"!',
            'name.regex' => 'Name must only contain letters, numbers, or spaces!',
        ]);

        try {
            $course = Course::find($request->id);

            if ($course) {

                // save new cover image file
                if ($request->hasFile('file_image')) {
                    $file = $request->file('file_image');
                    $fileName = $file->getClientOriginalName();
                    $file->move(public_path('/uploads/course_img'), $fileName);
                } else {
                    $fileName = $course->image;
                }

                // remove all non-numeric characters from price
                $trimDiscountedPrice = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->mini_fake_price));
                $trimPrice = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->mini_price));

                // if there is discounted price, put it on price. original price will be put on "fake price" column instead.
                if($trimDiscountedPrice > 0){
                    $fakePrice = $trimPrice;
                    $price = $trimDiscountedPrice;
                }

                $update = DB::table('course')
                    ->where('id', $course->id)
                    ->update([
                        'name' => $request->name,
                        'slug' => $request->slug,
                        'image' => $fileName,
                        'credits' => $request->credits,
                        'duration' => $request->duration,
                        'm_course_type_id' => $request->type,
                        'm_difficulty_type_id' => $request->level,
                        'short_description' => $request->short_description,
                        'content' => $request->content,
                        'payment_link' => $request->payment_link,
                        'fake_price' => $fakePrice,
                        'price' => $price,
                        'description' => $request->description,
                        'status' => $request->status == 0 ? 0 : 1,
                        'updated_id' => Auth::user()->id
                    ]);

                if ($update) {
                    // delete and re-insert course category
                    if (CourseCategory::where('course_id', $request->id)->exists()) {
                        DB::table('course_category')->where('course_id', $request->id)->delete();
                    }

                    $categories = $request->input('courseCategory');
                    if ($categories) {
                        foreach ($categories as $categoryId) {
                            DB::table('course_category')->insert([
                                'course_id' => $request->id,
                                'category_id' => $categoryId,
                                'created_id' => Auth::user()->id,
                                'updated_id' => Auth::user()->id,
                            ]);
                        }
                    }

                    // redirect based on course type
                    $courseType = MCourseType::find($request->type);
                    if ($courseType && $courseType->name === 'MBKM') {
                        return redirect()->route('getCourseMBKM')->with('success', 'Berhasil mengubah mata kuliah MBKM!');
                    } else {
                        return redirect()->route('getCourse')->with('success', 'Course updated successfully');
                    }
                } else {
                    // if update failed
                    return redirect()->back()->withErrors(['error' => 'Error while trying to update the course!'])->withInput();
                }
            } else {
                // if course not found
                return redirect()->back()->withErrors(['error' => 'Course not found!'])->withInput();
            }
        } catch (\Exception $e) {
            Log::error('Error updating course: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Error while trying to update the course!'])->withInput();
        }
    }
}
