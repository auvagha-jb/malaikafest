<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicesPage;

class AdminServicesController extends Controller
{
    public function index()
    {
        $services = ServicesPage::where('isDeleted', 0)
            ->get();
        return view('Admin.pages.services.index', ['services' => $services]);
    }

    public function remove($serviceID)
    {
        $service = ServicesPage::findOrFail($serviceID);
        $service->isDeleted = request('isDeleted');
        $service->save();
        return redirect('/admin/page/services');
    }

    public function create()
    {
        return view('Admin.pages.services.create');
    }

    public function add()
    {
        $service = new ServicesPage();
        $service->title = request('serviceTitle');
        $service->description = request('serviceDescription');
        $service->save();
        return redirect('/admin/page/services');
    }

    public function edit($serviceID)
    {
        $service = ServicesPage::findOrFail($serviceID);
        return view('Admin.pages.services.edit', ['service' => $service]);
    }

    public function store($serviceID)
    {
        $service = ServicesPage::findOrFail($serviceID);
        $service->title = request('serviceTitle');
        $service->description = request('serviceDescription');
        $service->save();

        return redirect("/admin/page/services");
    }
}
