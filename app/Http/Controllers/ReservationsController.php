<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Calendar;
use App\Services\CalendarService;
use App\Course;
use App\Time;

class ReservationsController extends Controller
{
    public function index() {
        return view('reservations.index', [
        'calendar'      => Calendar::getCalendar(),
        'month'         => Calendar::getMonth(),
        'prev'          => Calendar::getPrev(),
        'next'          => Calendar::getNext(),
    ]);
    }

    public function create() {

        $courses = Course::orderBy('id')->get();
        $times  = Time::orderBy('id')->get();
        $data=[
            'courses' => $courses,
            'times' => $times,
        ];

        return view('reservations.create',$data);
  
    }



    public function store() {
        return view('reservations.create');
    }
}