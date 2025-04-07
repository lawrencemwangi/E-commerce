<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\Models\User;

class DashboardController extends Controller
{
   public function Dashboard()
   {
      $Count_messages = Messages::count();
      $Count_users = User::count();


      return view('backend.admin_dashboard', compact(
         'Count_messages',
         'Count_users',
      ));
   }
}
