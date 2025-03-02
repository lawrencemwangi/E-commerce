<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function Dashboard()
    {
        if (Auth::id()) {
            $user_level = Auth()->user()->$user_level;

            if($user_level==1)
            {
                return redirect()->route('admin_dashboard');
            }
            else if($user_level==2)
            {
                return redirect()->route('home');
            }
            else
            {
                return redirect()->back();
            }
        }
        
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
