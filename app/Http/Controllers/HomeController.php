<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Dashboard()
    {
        
    }


    public function HomePage()
    {
        return view('home');
    }

    public function AboutPage()
    {
        return view('about');
    }

    public function CollectionPage()
    {
        return view('collection');
    }

    public function ContactPage()
    {
        return view('contact');
    }

    public function BlogPage()
    {
        return view('blog');
    }
}
