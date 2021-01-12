<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index () {
        $reservations = Reservation::orderBy('reservation_date')->paginate(5);
        return view('admin.index', compact('reservations'));
    }

    public function search (Request $request) {
        $name = $request->input('name');
        $date = $request->input('date');
        $time = $request->input('time');
        $request->flash();
        // return Eloquent\Builer :The base query builder instance.
        $query = Reservation::query();

        /*
        and検索
        なければ該当なし表示
        */
        if (!empty($name)) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if (!empty($date)) {
            $query->whereDate('reservation_date', $date);
        }
        if (!empty($time)) {
            $query->where('time_id', '=', $time);
        }

        $reservations = $query->orderBy('reservation_date', "asc")->paginate(5)->appends(request()->query());
        return view('admin.index', compact('reservations'));
    }
}

