<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\User;

class SuperAdminController extends Controller
{
    public function index()
    {
        return view('superadmin.index');
    }
}
