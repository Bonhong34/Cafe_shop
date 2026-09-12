<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;

class HomeController extends Controller
{
    public function index()
    {
        $featuredItems = MenuItem::with('category')
            ->where('is_featured', true)
            ->where('is_available', true)
            ->take(6)
            ->get();

        return view('home', compact('featuredItems'));
    }

    public function about()
    {
        return view('about');
    }

    public function gallery()
    {
        return view('gallery');
    }
}
