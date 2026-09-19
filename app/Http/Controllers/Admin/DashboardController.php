<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'categories' => MenuCategory::count(),
            'items' => MenuItem::count(),
            'reservations' => Reservation::count(),
            'messages' => Contact::count(),
            'orders' => Order::count(),
        ];

        $recentReservations = Reservation::latest()->take(5)->get();
        $recentMessages = Contact::latest()->take(5)->get();
        $recentOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentReservations', 'recentMessages', 'recentOrders'));
    }
}
