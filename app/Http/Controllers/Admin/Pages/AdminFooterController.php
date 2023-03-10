<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class AdminFooterController extends Controller
{
    public function index()
    {
        $footer = Footer::first(); //This will pick the 1 row for footer.
        return view('Admin.pages.footer.index', ['footer' => $footer]);
    }

    public function edit()
    {
        $footer = Footer::first(); //This will pick the 1 row for footer.
        return view('Admin.pages.footer.edit', ['footer' => $footer]);
    }

    public function store()
    {
        $footer = Footer::findOrFail(1);

        $footer->aboutDescription = request('aboutDescription');
        $footer->location = request('location');
        $footer->phoneNo = request('phoneNo');
        $footer->emailAddress = request('email');
        $footer->igLink = request('ig');
        $footer->twitterLink = request('twitter');
        $footer->fbLink = request('fb');
        $footer->ytLink = request('yt');
        $footer->save();

        return redirect("/admin/page/footer");
    }
}
