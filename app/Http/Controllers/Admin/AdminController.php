<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index (Request $request) {
        $name = $request->input('name');
        $date = $request->input('date');
        $time = $request->input('time');
        // return Eloquent\Builer :The base query builder instance.
        $query = Reservation::query();

        $reservations = Reservation::orderBy('reservation_date', "asc")->get();
        return view('admin.index', compact('reservations'));
    }
}
