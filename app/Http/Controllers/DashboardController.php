<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\Models\User;
use App\Models\Collection;
use App\Models\Stock;
use App\Models\Asset;

class DashboardController extends Controller
{
   public function Dashboard()
   {
      $Count_messages = Messages::count();
      $Count_users = User::count();
      $Count_collection = Collection::count();
      $Count_stock = Stock::count();
      $Count_assets = Asset::count();

      // Calculation of the total assets value of the assets owned by the company
      $total_assets = Asset::sum('price');


      return view('backend.admin_dashboard', compact(
         'Count_messages',
         'Count_users',
         'Count_collection',
         'Count_stock',
         'Count_assets',

         // total calculation
         'total_assets',
      ));
   }
}
