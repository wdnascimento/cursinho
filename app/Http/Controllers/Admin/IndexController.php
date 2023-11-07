<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;

class IndexController extends Controller
{

    public function __construct(Admin $admins)
    {
        $this->middleware('auth:admin');
        $this->admin = $admins;
    }

    public function index()
    {
        $data['users'] = $this->admin->count();
        return view('admin.home', compact('data'));
    }

    }
