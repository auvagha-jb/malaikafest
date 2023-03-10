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
        $events = Events::where('events.isDeleted', 0)
            //Join the Event and Event categories table to get the name of the categories
            ->join('event_categories', 'events.eventCategory', "=", 'event_categories.eventCategoryID')
            ->get();

        return view('Customer.events.index', ['events' => $events]);
    }

    public function filterByCategory($eventCategory)
    {
        $events = Events::where('events.isDeleted', 0)
            ->where('events.eventCategory', $eventCategory)
            //Join the Event and Event categories table to get the name of the categories
            ->join('event_categories', 'events.eventCategory', "=", 'event_categories.eventCategoryID')
            ->get();

        return view('Customer.events.index', ['events' => $events]);
    }

    public function show($eventID)
    {
        $event = Events::findOrFail($eventID);
        $eventDescription = htmlspecialchars($event->eventDescription);
        return view('Customer.events.show', ['event' => $event], compact('eventDescription'));
    }
}
