<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Course;
use App\Models\Time;
use App\Http\Requests\ReservationRequest;

class AdminController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('reservation_date')->paginate(5);
        return view('admin.index', compact('reservations'));
    }

    public function search(Request $request)
    {
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

    public function show($id)
    {
        $reservation = Reservation::find($id);
        return view('admin.reservation.showDetail', compact('reservation'));
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);

        // editするuserと同日の予約済み時間を探す
        $reserved_times = Reservation::where('reservation_date', $reservation->reservation_date)
        ->whereNotIn('time_id', [$reservation->time_id])
        ->get();
        //予約済みのtime_idを$reserved_id配列に入れ込む
        $reserved_id = [];
        foreach($reserved_times as $reserved_time){
            array_push($reserved_id, $reserved_time->time_id);
        }

        $courses = Course::all();
        $times = Time::all();
        return view('admin.reservation.edit', compact('reservation', 'courses', 'times', 'reserved_id'));
    }

    public function rePost(ReservationRequest $request, $id)
    {
        session([
            "id" => $id,
            "reservation_date" => $request->reservation_date,
            "time_id" => $request->time_id,
            "course_id" => $request->course_id,
            "name" => $request->name,
            "age" => $request->age,
            "gender" => $request->gender,
            "email" => $request->email,
            "phone_number" => $request->phone_number,
            ]);
        return redirect()->action('Admin\AdminController@confirm');
    }

    public function confirm(Request $request)
    {
        $courses = Course::orderBy('id')->get();
        $times  = Time::orderBy('id')->get();
        
        $reservation = $request->session()->all();
        //formattingのためstr->carbon型へ
        $reservation_date = new Carbon($reservation["reservation_date"]);

        // セッション情報がなかったら編集画面へ戻す
        if(!$reservation){
            return redirect()->action("Admin\AdminController@edit", ['id' => $reservation["id"]])
            ->with('message', '修正に失敗しました');
        }
        return view('admin.reservation.confirm', compact('courses', 'times', 'reservation', 'reservation_date'));
    }

    public function update(Request $request) 
    {
        $reservationData = $request->session()->all();
          // セッション情報がなかったら編集画面へ戻す
        if(!$reservationData){
            return redirect()->action("Admin\AdminController@edit", ['id' => $reservation["id"]])
            ->with('message', '修正に失敗しました');
        }

        $reservation = Reservation::find($reservationData['id']);
        $data = [
            $reservation->reservation_date = $reservationData["reservation_date"],
            $reservation->time_id = $reservationData["time_id"],
            $reservation->course_id = $reservationData["course_id"],
            $reservation->name = $reservationData["name"],
            $reservation->age = $reservationData["age"],
            $reservation->gender = $reservationData["gender"],
            $reservation->email = $reservationData["email"],
            $reservation->phone_number = $reservationData["phone_number"]
        ];
        DB::transaction(function () use ($reservation, $data) {
            $reservation->fill($data)->save();
        });
        return view('admin.reservation.thanks');
    }

    public function delete($id)
    {
        DB::transaction(function () use ($id) {
            Reservation::destroy($id);
        });
        return redirect()->route('admin.index');
    }
}

