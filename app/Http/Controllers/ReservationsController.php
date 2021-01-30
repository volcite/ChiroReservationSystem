<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use App\Facades\Calendar;
use App\Services\CalendarService;
use App\Models\Course;
use App\Models\Time;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;


class ReservationsController extends Controller
{
    private $reservationItems = [
        "reservation_year", 
        "reservation_month", 
        "reservation_day", 
        "time_id", 
        "cource_id", 
        "name", 
        "age", 
        "gender", 
        "email", 
        "phone_number"
    ];
    
    public function index() {
        return view('reservations.index', [
        'calendar'      => Calendar::getCalendar(),
        'month'         => Calendar::getMonth(),
        'prev'          => Calendar::getPrev(),
        'next'          => Calendar::getNext(),
    ]);
    }

    public function create($year, $month, $day) {
        $reservations = Reservation::orderBy('id')->get();
        $courses = Course::orderBy('id')->get();
        $times  = Time::orderBy('id')->get();
        $monthFix = '';
        $dayFix = '';
        $count = [];
        $count[0] = '0';
        if($month >= 1 && $month < 9) {
            $monthFix = '0'.$month;
        } else {
            $monthFix = $month;
        }

        if($day >= 1 && $day < 9) {
            $dayFix = '0'.$day;
        } else {
            $dayFix = $day;
        }

        $date = $year . '/' . $monthFix . '/' . $dayFix;

        foreach($times as $key=>$time){
            foreach($reservations as $key=>$reservation ){
                if( $reservation->reservation_date->format('Y/m/d') == $date && $reservation->time_id == $time->id)  {                              
                    $count[] = '1';
                    break;
                }
            }
            $count[] = '0';
        }

        $data=[
            'reservations' => $reservations,
            'year' => $year,
            'month' => $month,
            'day' => $day,
            'date' => $date,
            'count' => $count,
            'courses' => $courses,
            'times' => $times,
        ];
        return view('reservations.create',$data);
    }

    public function checkStore(ReservationRequest $request) {

        session()->forget('year');
        session()->forget('month');
        session()->forget('reservation_date');
        session()->forget('time_id');
        session()->forget('course_id');
        session()->forget('name');
        session()->forget('age');
        session()->forget('gender');
        session()->forget('email');
        session()->forget('phone_number');

        session([
            'year' => $request->reservation_year,
            'month' => $request->reservation_month,
            'day' => $request->reservation_day,
            'time_id' => $request->time_id,
            'course_id' => $request->course_id,
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);
		
		
		return redirect()->action("ReservationsController@check");
    }
    
    public function check() {

        $courses = Course::orderBy('id')->get();
        $times  = Time::orderBy('id')->get();

        //セッションから値を取り出す
		$reservation = session()->all();
		//セッションに値が無い時はTopに戻る
		if(!$reservation){
			return redirect()->action("ReservationsController@index");
        }
        
        $data=[
            'reservation' => $reservation,
            'courses' => $courses,
            'times' => $times,
        ];

		return view("reservations.check",$data);
    }
        
    public function confirm() {

        $times  = Time::orderBy('id')->get();
        $reservations = Reservation::orderBy('id')->get();
        $reservationData = session()->all();

        if($reservationData["month"] >= 1 && $reservationData["month"] < 9) {
            $monthFix = '0'.$reservationData["month"];
        } else {
            $monthFix = $reservationData["month"];
        }

        if($reservationData["day"] >= 1 && $reservationData["day"] < 9) {
            $dayFix = '0'.$reservationData["day"];
        } else {
            $dayFix = $reservationData["day"];
        }

        $date = $reservationData["year"] . '/' . $monthFix . '/' . $dayFix;

        foreach($reservations as $key=>$reservation ){
            if($reservation->reservation_date->format('Y/m/d') == $date && $reservation->time_id == $reservationData["time_id"])  {                              
                return view("reservations.fail");
            }
        }
		return view("reservations.confirm");
    }
}