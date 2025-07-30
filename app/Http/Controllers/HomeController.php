<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Category;
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
        $collections = Collection::where('featured', 1)
                                ->where('visibility', 1)
                                ->orderBy('created_at', 'asc')
                                ->limit(4)
                                ->get();

        return view('home', compact('collections'));
    }

    public function AboutPage()
    {
        return view('about');
    }

    
    public function CollectionPage()
    {
        $categories = Category::orderBy('created_at', 'asc')->get();
        $collections = Collection::where('featured', 1)
                                ->where('visibility', 1)
                                ->orderBy('created_at', 'asc')
                                ->get();

        return view('collection', compact('collections', 'categories'));
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
