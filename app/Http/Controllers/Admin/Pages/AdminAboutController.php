<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\AboutTeam;

class AdminAboutController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first(); //This will pick the 1 row for AboutUs.
        $team = AboutTeam::where('isDeleted', 0)->get();
        return view('admin.pages.about.index', ['aboutus' => $aboutUs, 'team' => $team]);
    }

    public function editAbout()
    {
        $aboutUs = AboutUs::first(); //This will pick the 1 row for AboutUs.
        return view('admin.pages.about.edit', ['aboutus' => $aboutUs]);
    }

    public function storeAbout()
    {
        $aboutUs = AboutUs::findOrFail(1);
        $img = request('aboutImg');
        if(isset($img))
        {
            $newImageName = time(). '-' . request('aboutImg')->extension(); //renames the image
            request('aboutImg')->move(public_path('img'), $newImageName); //Moves uploaded file image into the public image folder
            $aboutUs->img = $newImageName;
        }
        $aboutUs->title = request('title');
        $aboutUs->description = request('description');
        $aboutUs->save();

        return redirect("/admin/page/about");
    }

    public function removeMember($memberID)
    {
        $member = AboutTeam::findOrFail($memberID);
        $member->isDeleted = request('isDeleted');
        $member->save();
        return redirect('/admin/page/about');
    }

    public function create()
    {
        return view('admin.pages.about.team.create');
    }

    public function add()
    {
        $newImageName = time(). '-' . request('fullname') . '.' . request('memberImg')->extension(); //renames the image
        request('memberImg')->move(public_path('img'), $newImageName); //Moves uploaded file image into the public image folder

        $member = new AboutTeam();
        $member->fullname = request('fullname');
        $member->role = request('role');
        $member->memberImg = $newImageName;
        $member->twitter_link = request('twitter');
        $member->linkedin_link = request('linkedin');
        $member->save();
        return redirect('/admin/page/about');
    }

    public function editMember($memberID)
    {
        $member = AboutTeam::findOrFail($memberID);
        return view('admin.pages.about.team.edit', ['member' => $member]);
    }
    
    public function storeMember($memberID)
    {
        $member = AboutTeam::findOrFail($memberID);
        $img = request('memberImg');
        if(isset($img))
        {
            $newImageName = time(). '-' . request('fullname') . '.' . request('memberImg')->extension(); //renames the image
            request('memberImg')->move(public_path('img'), $newImageName); //Moves uploaded file image into the public image folder
            $member->memberImg = $newImageName;
        }
        $member->fullname = request('fullname');
        $member->role = request('role');
        $member->twitter_link = request('twitter');
        $member->linkedin_link = request('linkedin');
        $member->save();

        return redirect("/admin/page/about");
    }
}
