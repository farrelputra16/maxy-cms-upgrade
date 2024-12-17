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

    function getCourseData(Request $request){
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
            ->select('id', 'name', 'fake_price', 'price', 'm_course_type_id', 'credits', 'duration', 'short_description', 'description', 'content', 'created_at', 'updated_at', 'status')
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

        if (env('APP_ENV')=='local') {
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
                ->addColumn('updated_at', function ($row) {
                    return $row->updated_at;
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
                ->addColumn('updated_at', function ($row) {
                    return $row->updated_at;
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

    function getCourseMBKMData(Request $request){
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


        return view('course.addv3', [
            'allPackagePrices' => $allPackagePrices,
            'allCourseTypes' => $allCourseTypes,
            'allCourseDifficulty' => $allCourseDifficulty,
            'allCourseCategory' => $allCourseCategory,
            'allCoursePackages' => $allCoursePackages
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

        // Validasi input dengan aturan dinamis
        $validated = $request->validate([
            'code' => $request->has('mbkmForm') ? 'nullable' : 'required', // Code wajib jika route adalah /course/add
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'slug' => 'required',
            'type' => 'required',
            'mini_fake_price' => 'nullable|string',
            'mini_price' => 'nullable|string',
            'credits' => 'nullable|numeric|min:0',
            'duration' => 'nullable|numeric|min:0',
            'file_image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048', // Validasi ukuran maksimal 2MB
            ],
            'short_description' => 'nullable|string|max:500',
            'payment_link' => env('APP_ENV') != 'local' ? ['required', 'url', 'regex:/^https:\/\/.+$/'] : 'nullable',
            'level' => 'nullable|numeric',
            'content' => 'nullable|string|max:65535',
            'description' => 'nullable|string',
            'courseCategory' => 'nullable|array',
            'courseCategory.*' => 'exists:m_category_course,id',
        ], [
            'file_image.max' => 'Ukuran gambar terlalu besar, maksimal 2MB.', // Pesan error khusus
            'file_image.image' => 'File yang diunggah harus berupa gambar.',
            'file_image.mimes' => 'Format gambar harus salah satu dari: jpeg, png, jpg, gif, svg.',
            'payment_link.required' => 'Link pembayaran diperlukan untuk lingkungan non-lokal.',
            'payment_link.url' => 'Link pembayaran harus berupa URL valid.',
            'payment_link.regex' => 'Link pembayaran harus diawali dengan "https://".',
            'name.regex' => 'Nama hanya boleh mengandung huruf, angka, dan spasi.',
        ]);

        try {
            // Proses upload file gambar
            $fileName = null;
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('/uploads/course_img'), $fileName);
            }

            // Bersihkan simbol "Rp." dan karakter non-angka dari harga
            $trim_mini_fake_price = preg_replace('/[^\d]/', '', $request->mini_fake_price);
            $trim_mini_price = preg_replace('/[^\d]/', '', $request->mini_price);

            // Concatenate kode mata kuliah dan nama mata kuliah
            $courseCode = $request->code;
            $courseName = $request->name;

            $courseConcatenate = $request->has('mbkmForm') ? $courseName : Str::upper($courseCode) . '-' . $courseName;

            // dd($courseConcatenate);

            // Simpan data course ke database
            $create = Course::create([
                'name' => $courseConcatenate,
                'fake_price' => (float) $trim_mini_fake_price,
                'price' => (float) $trim_mini_price,
                'short_description' => $request->short_description,
                'image' => $fileName,
                'payment_link' => env('APP_ENV') != 'local' ? $request->payment_link : null,
                'slug' => $request->slug,
                'credits' => $request->credits,
                'duration' => $request->duration,
                'm_course_type_id' => $request->type,
                'course_package_id' => $request->type == 2 ? null : $request->package,
                'm_difficulty_type_id' => $request->level,
                'content' => $request->content,
                'description' => $request->description,
                'status' => $request->status == '' ? 0 : 1,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create) {
                session()->flash('course_added', 'Mata Kuliah berhasil dibuat! Silakan tambahkan modul untuk mata kuliah ini.');
                $categories = $request->courseCategory;

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

                // Redirect berdasarkan tipe course
                $courseType = MCourseType::find($request->type);
                if ($courseType && $courseType->name === 'MBKM') {
                    return redirect()->route('getCourseMBKM')->with('success', 'Berhasil menambahkan mata kuliah MBKM!');
                } else {
                    return redirect()->route('getCourse')->with('success', 'Berhasil menambahkan mata kuliah!');
                }
            } else {
                return app(HelperController::class)->Warning('getCourse');
            }
        } catch (\Exception $e) {
            \Log::error('Error adding course: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menambahkan mata kuliah.'])->withInput();
        }
    }



    function getEditCourse(Request $request)
    {
        $idCourse = $request->id;
        $courses = Course::find($idCourse);

        if (strpos($courses->name, '-') !== false) {
            $parts = explode('-', $courses->name, 2);
            $courses->code = trim($parts[0]);
            $name = trim($parts[1]);
        } else {
            $courses->code = null;
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

        // dd(explode('-', $courses->name));

        return view('course.editv3', [
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
        // Validasi input dengan pesan kustom
        $validated = $request->validate([
            'code' => $request->has('mbkmForm') ? 'nullable' : 'required',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'mini_fake_price' => 'nullable|string',
            'mini_price' => 'nullable|string',
            'credits' => 'nullable|numeric|min:0',
            'duration' => 'nullable|numeric|min:0',
            'short_description' => 'nullable|string',
            'file_image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048', // Maksimal 2MB
            ],
        ], [
            'file_image.max' => 'Ukuran gambar terlalu besar, maksimal 2MB.', // Pesan error spesifik
            'file_image.image' => 'File yang diunggah harus berupa gambar.',
            'file_image.mimes' => 'Format gambar harus salah satu dari: jpeg, png, jpg, gif, svg.',
        ]);

        try {
            $updateData = Course::postEditCourse($request);
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

            // Cek apakah course type adalah MBKM
            $courseType = MCourseType::find($request->type);
            if ($courseType && $courseType->name === 'MBKM') {
                return redirect()->route('getCourseMBKM')->with('success', 'Berhasil mengubah mata kuliah MBKM!');
            } else {
                return redirect()->route('getCourse')->with('success', 'Berhasil mengubah mata kuliah!');
            }
        } catch (\Exception $e) {
            // Log error untuk developer/admin
            \Log::error('Error updating course: ' . $e->getMessage());

            // Kembalikan pesan error yang ramah kepada user
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat mengubah mata kuliah.'])->withInput();
        }
    }

    public function postDeleteCourse(Request $request)
    {
        $idCourse = $request->id;

        try {
        } catch (Error $e) {
        }
    }
}
