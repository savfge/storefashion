<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Prodect;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::count();
        $prodect = Prodect::count();
        $category = Category::count();
        $review = Review::count();
        return view('admin.index',compact('orders','prodect','category','review'));
    }
    public function logout()
    {
        Auth::logout();
        return response()->json(['sms' => 'Page Is  Logout']);
    }
}
