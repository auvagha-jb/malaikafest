<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function pages()
    {
        return view('admin.pages.index');
    }

    public function contact()
    {
        return view('admin.pages.contact.index');
    }
}
