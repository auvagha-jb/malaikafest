<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('Admin.dashboard');
    }
    public function pages()
    {
        return view('Admin.pages.index');
    }

    public function contact()
    {
        return view('Admin.pages.contact.index');
    }
}
