<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Blog;
use App\Models\Blogcategory;
use App\Models\Blogtag;
use App\Models\ImagePresets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ImageGenTrait;


class BlogController extends Controller
{
    public $path = "upload/blog/thumbnail/";
    public $image_preset;
    public $image_preset_main;
    use ImageGenTrait;
    public function __construct()
    {
        $this->image_preset = ImagePresets::whereIn('id', [4,12])->get();
        $this->image_preset_main = ImagePresets::find(11);
    }
    public function index()
    {
        $blog = Blog::latest()->get(['id', 'blogcat_id', 'post_title', 'post_image', 'status', 'created_at']);
        return view('backend.blog.all_blog', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog_cat = Blogcategory::pluck('category_name', 'id');
        $post_tags = Blogtag::pluck('tag_name', 'id');
        return view('backend.blog.add_blog', compact('blog_cat', 'post_tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'post_title' => 'required|unique:blogs|max:200',
        ]);
        $post_tag = $request->post_tags;
        $post_tags = implode(",", $post_tag);
        $image = $request->file('post_image');
        if ($request->file('image') != null) {
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            $save_url = '';
        }

        Blog::insert([
            'blogcat_id' => $request->blogcat_id,
            'user_id' => Auth::user()->id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
            'post_image' =>  $save_url,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'post_tags' => $post_tags,
        ]);
        $notification = array(
            'message' => 'Blog Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blog_cat = Blogcategory::pluck('category_name', 'id');
        $post_tags = Blogtag::pluck('tag_name', 'id');
        return view('backend.blog.edit_blog', compact('blog', 'blog_cat', 'post_tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'post_title' => 'required|max:200',
        ]);
        $post_tag = $request->post_tags;
        $post_tags = implode(",", $post_tag);
        $image = $request->file('image');
        if ($request->file('image') != null) {
            if (file_exists($blog->post_image)) {
                $img = explode('.', $blog->post_image);
                $small_img = $img[0] . "_" . $this->image_preset[0]->name . "." . $img[1];
                unlink($small_img);
                unlink($blog->post_image);
            }
            $image = $request->file('image');
            $save_url = $this->imageGenrator($image, $this->image_preset_main, $this->image_preset, $this->path);
        } else {
            if ($blog->post_image != '') {
                $save_url = $blog->post_image;
            } else {
                $save_url = '';
            }
        }

        $blog->update([
            'blogcat_id' => $request->blogcat_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-', $request->post_title)),
            'post_image' =>  $save_url,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'post_tags' => $post_tags,

        ]);
        $notification = array(
            'message' => 'Blog Updated Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        $img = explode('.', $blog->post_image);
        $small_img = $img[0] . "_thumb." . $img[1];
        if (file_exists($blog->post_image)) {
            unlink($blog->post_image);
        }
        if (file_exists($small_img)) {
            unlink($small_img);
        }
        $notification = array(
            'message' => 'Blog Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function BlogDetails($slug)
    {

        $blog = Blog::where('post_slug', $slug)->first();
        $tags = $blog->post_tags;
        $tags_all = explode(',', $tags);

        $bcategory = Blogcategory::latest()->get();
        $dpost = Blog::latest()->limit(3)->get();

        return view('frontend.blog.blog_details', compact('blog', 'tags_all', 'bcategory', 'dpost'));
    } // End Method

    public function BlogCatList($id)
    {

        $blog = Blog::where('blogcat_id', $id)->paginate(3);
        $breadcat = Blogcategory::where('id', $id)->first();
        $bcategory = Blogcategory::latest()->get();
        $dpost = Blog::latest()->limit(3)->get();

        return view('frontend.blog.blog_cat_list', compact('blog', 'breadcat', 'bcategory', 'dpost'));
    } // End Method
    public function BlogList()
    {

        $blog = Blog::latest()->get();
        $bcategory = Blogcategory::latest()->get();
        $dpost = Blog::latest()->limit(3)->get();

        return view('frontend.blog.blog_list', compact('blog', 'bcategory', 'dpost'));
    } // End Method
    public function delete(Request $request)
    {
        if (is_array($request->id)) {
            $blogs = Blog::whereIn('id', $request->id);
            foreach ($blogs as $blog) {
                if (file_exists($blog->image)) {
                    $img = explode('.', $blog->image);
                    $small_img = $img[0] . "_" . $this->image_preset[0]->name . "." . $img[1];
                    unlink($small_img);
                    unlink($blog->image);
                }
            }
        } else {
            $blogs = Blog::find($request->id);
            if (file_exists($blogs->image)) {
                $img = explode('.', $blogs->image);
                $small_img = $img[0] . "_" . $this->image_preset[0]->name . "." . $img[1];
                unlink($small_img);
                unlink($blogs->image);
            }
        }

        $blogs->delete();
        $notification = array(
            'message' => 'Blog Deleted successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
}
