<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index () {
        //return collection
        $reservations = Reservation::all()->sortBy('reservation_date');
        return view('admin.index', compact('reservations'));
    }
}
