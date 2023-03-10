<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogcategories;
use App\Models\Blogs;

class AdminBlogController extends Controller
{
    public function indexBlogs()
    {
        $blogs = Blogs::where('isDeleted', '0')->get();
        return view('Admin.blogs.index-blog', ['blogs' => $blogs]);
    }

    public function showBlog($blogID)
    {
        $blog = Blogs::findOrFail($blogID);
        $blogText = htmlspecialchars($blog->blogText);
        return view('Admin.blogs.show-blog', ['blog' => $blog], compact('blogText'));
    }

    public function createBlog()
    {
        $categories = Blogcategories::where('isDeleted', '0')->get();
        return view('Admin.blogs.create-blog', ['categories' => $categories]);
    }

    public function addBlog()
    {
        $newImageName = time() . '-' . request('blogCategory') . '.' . request('blogImg')->extension(); //renames the image
        request('blogImg')->move(public_path('img'), $newImageName); //Moves uploaded file image into the public image folder

        $blog = new Blogs();
        $blog->blogTitle = request('blogTitle');
        $blog->blogCategory = request('blogCategory');
        $blog->blogText = request('blogText');
        $blog->blogQuote = request('blogQuote');
        $blog->blogImg = $newImageName;
        $blog->save();
        return redirect('/admin/blogs');
    }

    public function editBlog($blogID)
    {
        $categories = Blogcategories::where('isDeleted', '0')->get();
        $blog = Blogs::findOrFail($blogID);
        return view('Admin.blogs.edit-blog', ['blog' => $blog], ['categories' => $categories]);
    }

    public function store($blogID)
    {
        $blog = Blogs::findOrFail($blogID);
        $img = request('blogImg');
        if (isset($img)) {
            $newImageName = time() . '-' . $blogID . '-' . request('blogCategory') . '.' . $img->extension();
            $img->move(public_path('img'), $newImageName); //Moves uploaded file image into the public image folder
            $blog->blogImg = $newImageName;
        }
        $blog->blogTitle = request('blogTitle');
        $blog->blogCategory = request('blogCategory');
        $blog->blogQuote = request('blogQuote');
        $blog->blogText = request('blogText');
        $blog->save();

        return redirect("/admin/blog/$blogID");
    }

    public function removeBlog($blogID)
    {
        $blog = Blogs::findOrFail($blogID); //Find the record in the db of this id
        $blog->isDeleted = request('isDeleted');
        $blog->save();
        return redirect('/admin/blogs');
    }

    public function indexCategories()
    {
        $categories = Blogcategories::where('isDeleted', '0')->get();
        return view('Admin.blogs.index-categories', ['categories' => $categories]);
    }

    public function createCategory()
    {
        return view('Admin.blogs.add-category');
    }

    public function addCategory()
    {
        $category = new Blogcategories();
        $category->categoryName = request('category');
        $category->save();
        return redirect('/admin/blog/categories');
    }

    public function removeCategory($blogCategoryID)
    {
        $category = Blogcategories::findOrFail($blogCategoryID); //Find the record in the db of this id

        $category->isDeleted = request('isDeleted');
        $category->save();
        return redirect('/admin/blog/categories');

        // error_log(request('isDeleted'));
    }
}
