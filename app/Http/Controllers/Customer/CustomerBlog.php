<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Blogcategories;
use App\Models\Blogcomments;

class CustomerBlog extends Controller
{
    public function blogDashboard()
    {
        $blogs1 = Blogs::orderBy('blogs.created_at', 'desc')
            ->where('blogs.importance', 1)
            ->where('blogs.isDeleted', 0)
            //Join the Blog and Blog categories table to get the name of the Blog categories
            ->join('blog_categories', 'blogs.blogCategory', "=", 'blog_categories.blogCategoryID')
            ->first();

        $blogs2 = Blogs::orderBy('blogs.created_at', 'desc')
            ->take(4)
            ->where('blogs.importance', 2)
            ->where('blogs.isDeleted', 0)

            //Join the Blog and Blog categories table to get the name of the Blog categories
            ->join('blog_categories', 'blogs.blogCategory', "=", 'blog_categories.blogCategoryID')
            ->get();

        $blogs3 = Blogs::orderBy('blogs.created_at', 'desc')
            ->take(4)
            ->where('blogs.importance', 3)
            ->where('blogs.isDeleted', 0)
            //Join the Blog and Blog categories table to get the name of the Blog categories
            ->join('blog_categories', 'blogs.blogCategory', "=", 'blog_categories.blogCategoryID')
            ->get();

        $blogs4 = Blogs::orderBy('blogs.created_at', 'desc')
            ->take(4)
            ->where('blogs.importance', 4)
            ->where('blogs.isDeleted', 0)
            //Join the Blog and Blog categories table to get the name of the Blog categories
            ->join('blog_categories', 'blogs.blogCategory', "=", 'blog_categories.blogCategoryID')
            ->get();

        return view('customer.blog.dashboard', ['blogs1' => $blogs1, 'blogs2' => $blogs2, 'blogs3' => $blogs3, 'blogs4' => $blogs4]);
    }

    public function indexBlogs()
    {
        $blogs = Blogs::orderBy('blogs.created_at', 'desc')
            ->where('blogs.isDeleted', 0)

            //Join the Blog and Blog categories table to get the name of the Blog categories
            ->join('blog_categories', 'blogs.blogCategory', "=", 'blog_categories.blogCategoryID')
            // ->paginate(6);
            ->get();

        $categories = Blogcategories::where('isDeleted', '0')->get();
        return view('customer.blog.index-blogs', ['blogs' => $blogs], ['categories' => $categories]);
    }

    public function filterBlogs($categoryID)
    {
        $blogs = Blogs::orderBy('blogs.created_at', 'desc')
            ->where('blogs.blogCategory', $categoryID)
            ->where('blogs.isDeleted', 0)

            //Join the Blog and Blog categories table to get the name of the Blog categories
            ->join('blog_categories', 'blogs.blogCategory', "=", 'blog_categories.blogCategoryID')
            // ->paginate(6);
            ->get();

        $categories = Blogcategories::where('isDeleted', '0')->get();
        return view('customer.blog.index-blogs', ['blogs' => $blogs], ['categories' => $categories]);
    }

    public function showBlogs($blogID)
    {
        $blogTxt = Blogs::findOrFail($blogID);
        $blogText = htmlspecialchars($blogTxt->blogText);

        $blog = Blogs::where('blogs.blogID', $blogID)
            //Join the Blog and Blog categories table to get the name of the Blog categories
            ->join('blog_categories', 'blogs.blogCategory', "=", 'blog_categories.blogCategoryID')
            ->first();

        $comments = Blogcomments::where('blogID', $blogID)
            ->where('isDeleted', 0)
            ->get();

        $recommendations = Blogs::orderBy('blogs.created_at', 'desc')->take(4)
            ->where('blogs.isDeleted', 0)
            //Join the Blog and Blog categories table to get the name of the Blog categories
            ->join('blog_categories', 'blogs.blogCategory', "=", 'blog_categories.blogCategoryID')
            ->get();

        return view('customer.blog.show-blog', ['blog' => $blog, 'comments' => $comments, 'recommendations' => $recommendations], compact('blogText'));
    }

    public function addComment()
    {
        $blogID = request('blogID');

        $comment = new Blogcomments();
        $comment->username = request('username');
        $comment->emailAddress = request('email');
        $comment->blogID = $blogID;
        $comment->comment = request('comment');
        $comment->save();

        return redirect("/customer/blogs/$blogID");
    }
}
