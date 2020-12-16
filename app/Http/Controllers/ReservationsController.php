<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Calendar;
use App\Services\CalendarService;

class ReservationsController extends Controller
{
    public function index() {
        return view('reservations.index', [
        'calendar'         => Calendar::getCalendar(),
        'month'         => Calendar::getMonth(),
        'prev'          => Calendar::getPrev(),
        'next'          => Calendar::getNext(),
    ]);
    }

    public function create($year, $month, $day) {

        return view('reservations.create', [
            'year' => $year,
            'month' => $month,
            'day' => $day,
        ]);
    }
}