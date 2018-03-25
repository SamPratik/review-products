<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function home() {
      return view('home');
    }

    public function profile() {
      return view('profile');
    }

    public function food($food) {
      return view('food');
    }

    public function electronics($electronics) {
        return view('electronics');
    }
}
