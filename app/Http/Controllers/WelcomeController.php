<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class WelcomeController extends Controller
{
    public function index()
    {
        // Get all packages for display on the welcome page
        $packages = Package::all();
        return view('welcome', compact('packages'));
    }
}
