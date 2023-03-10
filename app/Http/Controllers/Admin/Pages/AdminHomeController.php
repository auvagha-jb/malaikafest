<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeTestimonials;
use App\Models\HomeIntro;

class AdminHomeController extends Controller
{
    public function index()
    {
        $intro = HomeIntro::first(); //This will pick the 1 row for intro.
        $testimonials = HomeTestimonials::where('isDeleted', 0)->get();
        return view('Admin.pages.home.index', ['intro' => $intro, 'testimonials' => $testimonials]);
    }

    public function editIntro()
    {
        $intro = HomeIntro::first(); //This will pick the 1 row for intro.
        return view('Admin.pages.home.edit', ['intro' => $intro]);
    }

    public function storeIntro()
    {
        $intro = HomeIntro::findOrFail(1);
        $img = request('homeImg');
        if (isset($img)) {
            $newImageName = time() . '.' . request('homeImg')->extension(); //renames the image
            request('homeImg')->move(public_path('img'), $newImageName); //Moves uploaded file image into the public image folder
            $intro->img = $newImageName;
        }
        $intro->heading = request('heading');
        $intro->text = request('text');
        $intro->save();

        return redirect("/admin/page/home");
    }

    public function removeTestimonial($testimonialID)
    {
        $testimonial = HomeTestimonials::findOrFail($testimonialID);
        $testimonial->isDeleted = request('isDeleted');
        $testimonial->save();
        return redirect('/admin/page/home');
    }

    public function create()
    {
        return view('Admin.pages.home.testimonials.create');
    }

    public function add()
    {
        $newImageName = time() . '-' . request('fullname') . '.' . request('img')->extension(); //renames the image
        request('img')->move(public_path('img'), $newImageName); //Moves uploaded file image into the public image folder

        $testimonial = new HomeTestimonials();
        $testimonial->fullname = request('fullname');
        $testimonial->position = request('position');
        $testimonial->img = $newImageName;
        $testimonial->rating = request('rating');
        $testimonial->testimonialDescription = request('description');
        $testimonial->save();
        return redirect('/admin/page/home');
    }

    public function editTestimonial($testimonialID)
    {
        $testimonial = HomeTestimonials::findOrFail($testimonialID);
        return view('Admin.pages.home.testimonials.edit', ['testimonial' => $testimonial]);
    }

    public function storeTestimonial($testimonialID)
    {
        $testimonial = HomeTestimonials::findOrFail($testimonialID);
        $img = request('img');
        if (isset($img)) {
            $newImageName = time() . '-' . request('fullname') . '.' . request('img')->extension(); //renames the image
            request('img')->move(public_path('img'), $newImageName); //Moves uploaded file image into the public image folder
            $testimonial->img = $newImageName;
        }
        $testimonial->fullname = request('fullname');
        $testimonial->position = request('position');
        $testimonial->img = $newImageName;
        $testimonial->rating = request('rating');
        $testimonial->testimonialDescription = request('description');
        $testimonial->save();

        return redirect("/admin/page/home");
    }
}
