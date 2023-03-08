<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Events;
use App\Models\Blogs;

class CustomerEvent extends Controller
{
    public function index()
    {
        $events = Events::where('Events.isDeleted', 0)
        //Join the Event and Event categories table to get the name of the categories
        ->join('event_categories', 'Events.eventCategory', "=", 'event_categories.eventCategoryID')
        ->get();

        return view('customer.events.index', ['events' => $events]);
    }

    public function filterByCategory($eventCategory)
    {
        $events = Events::where('Events.isDeleted', 0)
        ->where('Events.eventCategory', $eventCategory)
        //Join the Event and Event categories table to get the name of the categories
        ->join('event_categories', 'Events.eventCategory', "=", 'event_categories.eventCategoryID')
        ->get();

        return view('customer.events.index', ['events' => $events]);
    }

    public function show($eventID)
    {
        $event = Events::findOrFail($eventID);
        $eventDescription = htmlspecialchars($event -> eventDescription);
        return view('customer.events.show', ['event' => $event], compact('eventDescription'));
    }

    
}
