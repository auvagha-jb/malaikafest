<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Eventcategories;
use App\Models\Events;
use Carbon\Carbon;

class AdminEventController extends Controller
{
    public function indexCategories()
    {
        $categories = Eventcategories::where('isDeleted', '0')->get();
        return view('admin.page-categories.index-categories', ['categories' => $categories]);
    }

    public function createCategory()
    {
        return view('admin.page-categories.add-category');
    }

    public function addCategory()
    {
        $category = new Eventcategories();
        $category->categoryName = request('category');
        $category->save();
        return redirect('/admin/event/categories');
    }

    public function removeCategory($eventCategoryID)
    {
        $category = Eventcategories::findOrFail($eventCategoryID); //Find the record in the db of this id
        $category->isDeleted = request('isDeleted');
        $category->save();
        return redirect('/admin/event/categories');

        // error_log(request('isDeleted'));
    }

    public function indexEvent()
    {
        $events = Events::where('isDeleted', '0')->get();
        return view('admin.events.index-events', ['events' => $events]);
    }

    public function showEvent($eventID)
    {
        $event = Events::findOrFail($eventID);
        $eventDescription = htmlspecialchars($event -> eventDescription);
        return view('admin.events.show-event', ['event' => $event], compact('eventDescription'));
    }

    public function createEvent()
    {
        $categories = Eventcategories::where('isDeleted', '0')->get();
        return view('admin.events.create-event', ['categories' => $categories]);
    }

    public function addEvent()
    {
        $newImageName = time(). '-' . request('eventCategory') . '.' . request('posterImg')->extension(); //renames the image

        // $image = Image::make($request->file('image'))->resize(null, 300, 
        // function ($constraint) 
        // {
        //     $constraint->aspectRatio();
        // });

        request('posterImg')->move(public_path('img'), $newImageName); //Moves uploaded file image into the public image folder

        $event = new Events();
        $event->eventName = request('eventName');
        $event->eventCategory = request('eventCategory');
        $event->startDate = request('startDate');
        $event->endDate = request('endDate');
        $event->startTime = request('startTime');
        $event->endTime = request('endTime');
        $event->location = request('location');
        $event->ticketPrice = request('ticketPrice');
        $event->eventDescription = request('eventDescription');
        $event->posterImg= $newImageName;
        $event->save();
        return redirect('/admin/events');
    }

    public function editEvent($eventID)
    {
        $categories = Eventcategories::where('isDeleted', '0')->get();

        $event = Events::findOrFail($eventID);
        return view('admin.events.edit-event', ['event' => $event], ['categories' => $categories]);
    }

    public function store($eventID)
    {
        $event = Events::findOrFail($eventID);
        $img = request('posterImg');
        if(isset($img))
        {
            $newImageName = time(). '-'. $eventID . '-' . request('eventCategory') . '.' . $img->extension();
            $img->move(public_path('img'), $newImageName); //Moves uploaded file image into the public image folder
            $event->posterImg = $newImageName;
        }
        $event->eventName = request('eventName');
        $event->eventCategory = request('eventCategory');
        $event->startDate = request('startDate');
        $event->endDate = request('endDate');
        $event->startTime = request('startTime');
        $event->endTime = request('endTime');
        $event->location = request('location');
        $event->ticketPrice = request('ticketPrice');
        $event->eventDescription = request('eventDescription');
        $event->save();

        return redirect("/admin/event/$eventID");
    }

    public function removeEvent($eventID)
    {
        $event = Events::findOrFail($eventID); //Find the record in the db of this id
        $event->isDeleted = request('isDeleted');
        $event->save();
        return redirect('/admin/events');

    }
}
