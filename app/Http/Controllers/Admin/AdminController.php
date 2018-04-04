<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function index() {
      return view('admin.top-items');
    }

    public function users() {
      return view('admin.users');
    }

    public function foods() {
        return view('admin.foods');
    }

    public function electronics() {
        return view('admin.electronics');
    }
}
