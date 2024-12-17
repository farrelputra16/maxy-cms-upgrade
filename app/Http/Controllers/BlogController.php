<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use App\Models\MBlog;
use App\Models\MBlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    //
    public function getBlog()
    {
        $data = MBlog::orderBy('created_at', 'desc')->get();

        // dd($data);
        return view('blog.index', compact('data'));
    }

    public function getBlogData(Request $request)
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

        $blogs = MBlog::select(
            'm_blog.*',
            'm_blog.status_highlight AS highlight_status'
        )
        ->with('tags');

        // Global search
        // if (!empty($searchValue)) {
        //     $blogs->where(function ($query) use ($searchValue) {
        //         $query->where('title', 'like', "%{$searchValue}%")
        //             ->orWhere('slug', 'like', "%{$searchValue}%")
        //             ->orWhere('content', 'like', "%{$searchValue}%");
        //     });
        // }

        // Column-specific search
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];

            if (!empty($columnSearchValue) && $columnName !== 'action') {
                switch ($columnName) {
                    case 'title':
                        $blogs->where('title', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'slug':
                        $blogs->where('slug', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'content':
                        $blogs->where('content', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'highlight_status':
                        if (stripos($columnSearchValue, 'y') !== false) {
                            $blogs->where('status_highlight', '=', 1);
                        } else if (stripos($columnSearchValue, 't') !== false) {
                            $blogs->where('status_highlight', '=', 0);
                        }
                        break;
                    case 'status':
                        $blogs->where('status', '=', stripos($columnSearchValue, 'Non') !== false ? 0 : 1);
                        break;
                }
            }
        }

        // Ordering
        $blogs->orderBy($finalOrderColumn, $orderDirection);

        return DataTables::of($blogs)
            ->addIndexColumn()
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('title', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->title) . '">'
                    . \Str::limit(e($row->title), 30)
                    . '</span>';
            })
            ->addColumn('slug', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->slug) . '">'
                    . '<a href="' . env('FRONTEND_APP_URL') . '/blog/' . e($row->slug) . '" target="_blank">'
                    . \Str::limit(e($row->slug), 30) . '</a>'
                    . '</span>';
            })
            ->addColumn('content', function ($row) {
                $strippedContent = strip_tags($row->content);
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' . e($strippedContent) . '">'
                    . \Str::limit(e($strippedContent), 30)
                    . '</span>';
            })
            ->addColumn('tags', function ($row) {
                return $row->tags->map(function ($tag) {
                    return '<div class="badge bg-secondary px-2">' . $tag->name . '</div>';
                })->implode(' ');
            })
            ->addColumn('highlight_status', function ($row) {
                $isHighlighted = $row->highlight_status == 1;
                return '<a class="btn ' . ($isHighlighted ? 'btn-success' : 'btn-danger') . '">
                    <i class="fas fa-' . ($isHighlighted ? 'check' : 'times') . '"></i> &nbsp; '
                    . ($isHighlighted ? 'Ya' : 'Tidak') . '</a>';
            })
            ->addColumn('description', function ($row) {
                $description = strip_tags($row->description);
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' . e($description) . '">'
                    . (!empty($description) ? \Str::limit(e($description), 30) : '-')
                    . '</span>';
            })
            ->addColumn('status', function ($row) {
                return '<button
                    class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '"
                    data-id="' . $row->id . '"
                    data-status="' . $row->status . '"
                    data-model="MBlog">
                    ' . ($row->status == 1 ? 'Aktif' : 'Nonaktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group">
                    <a href="' . route('getEditBlog', ['id' => $row->id]) . '"
                        class="btn btn-primary">Ubah</a>
                </div>';
            })
            ->rawColumns(['title', 'slug', 'content', 'tags', 'highlight_status', 'description', 'status', 'action'])
            ->make(true);
    }

    public function getAddBlog()
    {
        $data = MBlogTag::where('status', 1)->get();

        return view('blog.add', compact('data'));
    }
    public function postAddBlog(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:m_blog,slug',  // Validasi slug unik
            'content' => 'required|string|max:16777215',
            'description' => 'nullable|string|max:65535',
            'file_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi file gambar
            'tag' => 'nullable|array', // Validasi tag sebagai array
        ]);

        try {
            // Tambahkan data baru ke database
            $blog = new MBlog();
            $blog->title = $request->title;
            $blog->slug = $request->slug;
            $blog->content = $request->content;
            $blog->cover_img = 'temp';  // Placeholder sementara
            $blog->status_highlight = $request->status_highlight == '' ? 0 : 1;
            $blog->description = $request->description;
            $blog->status_highlight = $request->status_highlight == '' ? 0 : 1;
            $blog->status = $request->status == '' ? 0 : 1;
            $blog->created_id = Auth::user()->id;
            $blog->updated_id = Auth::user()->id;
            $blog->save();

            // Hubungkan tag
            if ($request->has('tag')) {
                $blog->tags()->attach($request->tag);
            }

            // Simpan cover image jika ada
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $extension = $file->getClientOriginalExtension();
                $fileName = $blog->id . '.' . $extension;
                $directory = public_path('/uploads/blog/' . $request->slug . '/');

                // Buat folder tujuan jika belum ada
                if (!File::exists($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }

                // Pindahkan file ke folder tujuan
                $file->move($directory, $fileName);

                // Update cover_img setelah file di-upload
                $blog->cover_img = $fileName;
                $blog->save();
            }

            return redirect()->route('getBlog')->with('success', 'Data successfully created.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save data: ' . $e->getMessage());
        }
    }

    public function getEditBlog(Request $request)
    {
        $data = MBlog::find($request->id);
        $idBlog = $data->id;
        $blogTagList = MBlogTag::where('status', 1)->get();
        $currentTags = array_column(json_decode(BlogTag::CurrentBlogTags($idBlog)), 'name', 'id');

        return view('blog.edit', compact('data', 'blogTagList', 'currentTags'));
    }


    public function postEditBlog(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|regex:/^[^<>#$]+$/|max:255',
            'slug' => 'required|string|max:255|unique:m_blog,slug,' . $request->id,  // Validasi slug unik kecuali untuk blog yang sedang di-edit
            'content' => 'required|string|max:16777215',
            'description' => 'nullable|string|max:65535',
            'status' => 'nullable|boolean',
            'file_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validasi file gambar
            'tag' => 'nullable|array', // Validasi tag sebagai array
        ]);

        try {
            // Temukan blog berdasarkan ID
            $blog = MBlog::find($request->id);

            if ($blog) {
                // Tangani upload cover image
                $fileName = $request->img_keep; // Default jika tidak ada file baru
                if ($request->hasFile('file_image')) {
                    $file = $request->file('file_image');
                    $extension = $file->getClientOriginalExtension();
                    $fileName = $blog->id . '.' . $extension;
                    $directory = public_path('/uploads/blog/' . $request->slug . '/');

                    // Buat folder jika belum ada
                    if (!File::exists($directory)) {
                        File::makeDirectory($directory, 0755, true);
                    }

                    // Pindahkan file ke folder yang sesuai
                    $file->move($directory, $fileName);
                }

                // Update data blog
                $blog->title = $request->title;
                $blog->slug = $request->slug;
                $blog->content = $request->content;
                $blog->cover_img = $fileName;
                $blog->status_highlight = $request->status_highlight == '' ? 0 : 1;
                $blog->description = $request->description;
                $blog->status = $request->status == 0 ? 0 : 1;
                $blog->created_id = Auth::user()->id;
                $blog->updated_id = Auth::user()->id;
                $blog->save();

                // Sinkronkan tag
                $currentTags = $blog->tags()->pluck('id')->toArray();
                $oldTags = $request->tag_old ?? []; // tag lama yang disimpan di form
                $newTags = $request->tag ?? []; // tag baru dari input

                // Jika ada perubahan pada tag lama dan tag baru
                if (array_diff($currentTags, $oldTags) !== []) {
                    // Hapus tag yang sudah tidak terpakai
                    $removedTags = array_diff($currentTags, $oldTags);
                    $blog->tags()->detach($removedTags);
                }

                // Filter tag baru untuk hanya menyertakan tag yang belum ada di currentTags
                $tagsToAdd = array_diff($newTags, $currentTags);

                if (!empty($tagsToAdd)) {
                    // Tambahkan tag baru yang belum ada di currentTags
                    $blog->tags()->attach($tagsToAdd);
                }

                return redirect()->route('getBlog')->with('success', 'Data updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Blog not found.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save data: ' . $e->getMessage())->withInput();
        }
    }


    public function getBlogTag()
    {
        $data = MBlogTag::get();
        return view('blog-tag.index', compact('data'));
    }
    public function getBlogTagData(Request $request)
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

        $blogTags = MBlogTag::select(
            'm_blog_tag.*'
        );

        // Global search
        // if (!empty($searchValue)) {
        //     $blogTags->where(function ($query) use ($searchValue) {
        //         $query->where('name', 'like', "%{$searchValue}%")
        //             ->orWhere('color', 'like', "%{$searchValue}%")
        //             ->orWhere('description', 'like', "%{$searchValue}%");
        //     });
        // }

        // Column-specific search
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];

            if (!empty($columnSearchValue) && $columnName !== 'action') {
                switch ($columnName) {
                    case 'id':
                        $blogTags->where('id', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'name':
                        $blogTags->where('name', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'color':
                        $blogTags->where('color', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'description':
                        $blogTags->where('description', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'status':
                        $blogTags->where('status', '=', stripos($columnSearchValue, 'Non') !== false ? 0 : 1);
                        break;
                    case 'created_at':
                        $blogTags->where('created_at', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'updated_at':
                        $blogTags->where('updated_at', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'created_id':
                        $blogTags->where('created_id', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'updated_id':
                        $blogTags->where('updated_id', 'like', "%{$columnSearchValue}%");
                        break;
                }
            }
        }

        // Ordering
        $blogTags->orderBy($finalOrderColumn, $orderDirection);

        return DataTables::of($blogTags)
            ->addIndexColumn()
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('color', function ($row) {
                return '<div class="rounded w-25 h-100" style="color: ' . e($row->color) . '; background-color: ' . e($row->color) . '">-</div>';
            })
            ->addColumn('description', function ($row) {
                $description = strip_tags($row->description);
                return '<span class="data-long" data-toggle="tooltip" data-placement="top" title="' . e($description) . '">'
                    . (!empty($description) ? \Str::limit(e($description), 30) : '-')
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
                    data-model="MBlogTag">
                    ' . ($row->status == 1 ? 'Aktif' : 'Nonaktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group">
                    <a href="' . route('getEditBlogTag', ['id' => $row->id]) . '"
                        class="btn btn-primary">Ubah</a>
                </div>';
            })
            ->rawColumns(['name', 'color', 'description', 'status', 'action'])
            ->make(true);
    }
    public function getAddBlogTag()
    {
        $data = MBlogTag::get();
        return view('blog-tag.add', compact('data'));
    }
    public function postAddBlogTag(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'color' => 'required|string|max:8',  // Validasi untuk warna
            'description' => 'nullable|string|max:65535',  // Deskripsi opsional
        ]);

        try {
            // Tambahkan data baru ke database
            $create = MBlogTag::create([
                'name' => $request->name,
                'color' => $request->color,
                'description' => $request->description,
                'status' => $request->status == '' ? 0 : 1,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            return redirect()->route('getBlogTag')->with('success', 'Data successfully created.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save data: ' . $e->getMessage());
        }
    }

    public function getEditBlogTag(Request $request)
    {
        $data = MBlogTag::find($request->id);
        return view('blog-tag.edit', compact(['data']));
    }
    public function postEditBlogTag(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'color' => 'required|string|max:8',  // Validasi untuk warna
            'description' => 'nullable|string|max:65535',  // Deskripsi opsional
            'status' => 'nullable|boolean',      // Status opsional
        ]);

        try {
            // Temukan tag berdasarkan ID
            $blogTag = MBlogTag::find($request->id);

            if ($blogTag) {
                // Update data blog tag
                $blogTag->name = $request->name;
                $blogTag->color = $request->color;
                $blogTag->description = $request->description;
                $blogTag->status = $request->status == 0 ? 0 : 1;
                $blogTag->created_id = Auth::user()->id;
                $blogTag->updated_id = Auth::user()->id;
                $blogTag->save();

                return redirect()->route('getBlogTag')->with('success', 'Data updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Blog tag not found.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save data: ' . $e->getMessage());
        }
    }

}
