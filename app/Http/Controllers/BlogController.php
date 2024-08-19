<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
        $blog = MBlog::get();
        return view('blog.index', compact('blog'));
    }
    public function getAddBlog()
    {
        $blogTagList = MBlogTag::all();

        return view('blog.add', compact('blogTagList'));
    }
    public function postAddBlog(Request $request)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'content' => 'nullable|string',
                'description' => 'nullable|string',
            ]);

            // save cover image
            $fileName = '';
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $fileName = $file->getClientOriginalName();
                $directory = public_path('/uploads/blog/' . $request->slug . '/');

                // Create destination folder if it doesn't exist
                if (!File::exists($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }

                // Move the file to the directory
                $file->move($directory, $fileName);
            }

            // add new data to database
            $create = MBlog::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'cover_img' => $fileName,
                'description' => $request->description,
                'status' => $request->status == '' ? 0 : 1,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            $create->tags()->attach($request->tag);

            return redirect()->route('getBlog')->with('success', 'data successfully created.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'failed to save data, ' . $e->getMessage());
        }
    }
    public function getEditBlog(Request $request)
    {
        $blog = MBlog::find($request->id);
        $blogTagList = MBlogTag::all();

        return view('blog.edit', compact(['blog', 'blogTagList']));
    }
    public function postEditBlog(Request $request)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'content' => 'nullable|string',
                'description' => 'nullable|string',
                'status' => 'nullable|boolean',
            ]);

            // save cover image
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('/uploads/blog/' . $request->slug . '/'), $fileName);
            } else {
                $fileName = $request->img_keep;
            }

            // update database
            $blog = MBlog::find($request->id);

            if ($blog) {
                // Update blog
                $blog->title = $request->title;
                $blog->slug = $request->slug;
                $blog->content = $request->content;
                $blog->cover_img = $fileName;
                $blog->description = $request->description;
                $blog->status = $request->status == '' ? 0 : 1;
                $blog->created_id = Auth::user()->id;
                $blog->updated_id = Auth::user()->id;
                $blog->save();

                // Sinkronkan tag
                $tagIds = $request->tag; // Ambil ID tag dari request
                $blog->tags()->sync($tagIds); // Sinkronkan tag

                return redirect()->route('getBlog')->with('success', 'data updated successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'failed to save data, ' . $e->getMessage());
        }
    }
    public function getBlogTag()
    {
        $data = MBlogTag::get();
        return view('blog-tag.index', compact('data'));
    }
    public function getAddBlogTag()
    {
        $blogTagList = MBlogTag::all();

        return view('blog-tag.add', compact('blogTagList'));
    }
    public function postAddBlogTag(Request $request)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'content' => 'nullable|string',
                'description' => 'nullable|string',
            ]);

            // save cover image
            $fileName = '';
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $fileName = $file->getClientOriginalName();
                $directory = public_path('/uploads/blog/' . $request->slug . '/');

                // Create destination folder if it doesn't exist
                if (!File::exists($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }

                // Move the file to the directory
                $file->move($directory, $fileName);
            }

            // add new data to database
            $create = MBlog::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->content,
                'cover_img' => $fileName,
                'description' => $request->description,
                'status' => $request->status == '' ? 0 : 1,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            $create->tags()->attach($request->tag);

            return redirect()->route('getBlog')->with('success', 'data successfully created.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'failed to save data, ' . $e->getMessage());
        }
    }
    public function getEditBlogTag(Request $request)
    {
        $blog = MBlog::find($request->id);
        $blogTagList = MBlogTag::all();

        return view('blog-tag.edit', compact(['blog', 'blogTagList']));
    }
    public function postEditBlogTag(Request $request)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'content' => 'nullable|string',
                'description' => 'nullable|string',
                'status' => 'nullable|boolean',
            ]);

            // save cover image
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('/uploads/blog/' . $request->slug . '/'), $fileName);
            } else {
                $fileName = $request->img_keep;
            }

            // update database
            $blog = MBlog::find($request->id);

            if ($blog) {
                // Update blog
                $blog->title = $request->title;
                $blog->slug = $request->slug;
                $blog->content = $request->content;
                $blog->cover_img = $fileName;
                $blog->description = $request->description;
                $blog->status = $request->status == '' ? 0 : 1;
                $blog->created_id = Auth::user()->id;
                $blog->updated_id = Auth::user()->id;
                $blog->save();

                // Sinkronkan tag
                $tagIds = $request->tag; // Ambil ID tag dari request
                $blog->tags()->sync($tagIds); // Sinkronkan tag

                return redirect()->route('getBlog')->with('success', 'data updated successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'failed to save data, ' . $e->getMessage());
        }
    }
}
