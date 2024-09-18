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
        $data = MBlog::get();
        return view('blog.index', compact('data'));
    }
    public function getAddBlog()
    {
        $data = MBlogTag::where('status', 1)->get();

        return view('blog.add', compact('data'));
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

            // add new data to database
            $blog = new MBlog();
            $blog->title = $request->title;
            $blog->slug = $request->slug;
            $blog->content = $request->content;
            // $blog->cover_img = $fileName;
            $blog->description = $request->description;
            $blog->status = $request->status == '' ? 0 : 1;
            $blog->created_id = Auth::user()->id;
            $blog->updated_id = Auth::user()->id;
            $blog->save();

            $blog->tags()->attach($request->tag);

            // save cover image
            $fileName = '';
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $extension = $file->getClientOriginalExtension();
                $fileName = $blog->id . '.' . $extension;
                $directory = public_path('/uploads/blog/' . $request->slug . '/');

                // Create destination folder if it doesn't exist
                if (!File::exists($directory)) {
                    File::makeDirectory($directory, 0755, true);
                }

                // Move the file to the directory
                $file->move($directory, $fileName);
            }

            // update cover_img data
            $blog->cover_img = $fileName;
            $blog->save();


            return redirect()->route('getBlog')->with('success', 'data successfully created.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'failed to save data, ' . $e->getMessage());
        }
    }
    public function getEditBlog(Request $request)
    {
        $data = MBlog::with('tags')->where('id', $request->id)->first();
        $blogTagList = MBlogTag::where('status', 1)->get();

        foreach ($blogTagList as $key => $item) {
            foreach ($data->tags as $d) {
                if ($d->id == $item->id) {
                    $item->selected = true;
                }
            }
        }

        return view('blog.edit', compact(['data', 'blogTagList']));
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

                $extension = $file->getClientOriginalExtension();
                $fileName = $request->id . '.' . $extension;

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
        $data = MBlogTag::get();
        return view('blog-tag.add', compact('data'));
    }
    public function postAddBlogTag(Request $request)
    {
        // dd($request->all());

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            // add new data to database
            $create = MBlogTag::create([
                'name' => $request->name,
                'color' => $request->color,
                'description' => $request->description,
                'status' => $request->status == '' ? 0 : 1,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            return redirect()->route('getBlogTag')->with('success', 'data updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'failed to save data, ' . $e->getMessage());
        }
    }
    public function getEditBlogTag(Request $request)
    {
        $data = MBlogTag::find($request->id);
        return view('blog-tag.edit', compact(['data']));
    }
    public function postEditBlogTag(Request $request)
    {
        // dd($request->all());
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            // update database
            $blogTag = MBlogTag::find($request->id);

            if ($blogTag) {
                // Update blog
                $blogTag->name = $request->name;
                $blogTag->color = $request->color;
                $blogTag->description = $request->description;
                $blogTag->status = $request->status == '' ? 0 : 1;
                $blogTag->created_id = Auth::user()->id;
                $blogTag->updated_id = Auth::user()->id;
                $blogTag->save();

                return redirect()->route('getBlogTag')->with('success', 'data updated successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'failed to save data, ' . $e->getMessage());
        }
    }
}
