<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Events;
use App\Models\Blogs;
use App\Models\ServicesPage;
use App\Models\AboutTeam;
use App\Models\AboutUs;
use App\Models\HomeTestimonials;
use App\Models\HomeIntro;

class CustomerController extends Controller
{
    public function landingPage()
    {
        //HOME INTRO
        $intro = HomeIntro::first();

        //UPCOMING EVENTS
        $events = Events::orderBy('events.created_at', 'desc')->take(5)
            ->where('events.isDeleted', 0)
            //Join the Event and Event categories table to get the name of the categories
            ->join('event_categories', 'events.eventCategory', "=", 'event_categories.eventCategoryID')
            ->get();

        //TESTIMONIALS
        $testimonials = HomeTestimonials::where('isDeleted', 0)->get();

        //RECOMMENDED BLOGS
        $recommendations = Blogs::orderBy('created_at', 'desc')->take(3)
            ->where('isDeleted', 0)
            ->get();
        return view(
            'customer.landingpg',
            [
                'events' => $events,
                'recommendations' => $recommendations,
                'testimonials' => $testimonials,
                'intro' => $intro
            ]
        );
    }

    public function about()
    {
        $aboutUs = AboutUs::first(); //This will pick the 1 row for AboutUs.
        $team = AboutTeam::where('isDeleted', 0)->get();
        return view('customer.about', ['aboutus' => $aboutUs, 'team' => $team]);
    }

    public function services()
    {
        $services = ServicesPage::where('isDeleted', 0)->get();
        return view('customer.services', ['services' => $services]);
    }

    public function contact()
    {
        return view('customer.contact');
    }
}
