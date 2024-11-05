<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use App\Models\MBlog;
use App\Models\MBlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    //
    public function getBlog()
    {
        $data = MBlog::orderBy('created_at', 'desc')->get();
        return view('blog.index', compact('data'));
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
            'content' => 'required|string',
            'description' => 'nullable|string',
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
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:m_blog,slug,' . $request->id,  // Validasi slug unik kecuali untuk blog yang sedang di-edit
            'content' => 'nullable|string',
            'description' => 'nullable|string',
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
                $blog->status = $request->status == '' ? 0 : 1;
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
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:8',  // Validasi untuk warna
            'description' => 'nullable|string',  // Deskripsi opsional
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
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:8',  // Validasi untuk warna
            'description' => 'nullable|string',  // Deskripsi opsional
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
                $blogTag->status = $request->status == '' ? 0 : 1;
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
