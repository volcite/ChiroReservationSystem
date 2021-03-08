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

class BookingController extends Controller
{

    public function index()
    {
        $reservations = Reservation::orderBy('reservation_date')->orderBy('time_id')->paginate(5);
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
        return view('admin.reservation.show', compact('reservation'));
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);

        // editする予約日と同日の予約済み時間を探す
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

        return redirect()->action('Admin\BookingController@confirm');
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
            return redirect()->action("Admin\BookingController@edit", ['id' => $reservation["id"]])
            ->with('message', '修正に失敗しました');
        }
        return view('admin.reservation.confirm', compact('courses', 'times', 'reservation', 'reservation_date'));
    }

    public function update(Request $request) 
    {
        $reservationData = $request->session()->all();

        // 変更希望時間に既に予約が入っているかチェック
        $already_reserved = Reservation::where('reservation_date', $reservationData['reservation_date'])
                            ->where('time_id', $reservationData['time_id'])
                            ->get();
        // セッション情報がないor 既に予約済みなら編集画面へ戻す
        if(!$reservationData || $already_reserved == null){
            return redirect()->action("Admin\BookingController@edit", ['id' => $reservation["id"]])
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

        $request->session()->forget([
            'id', 
            'reservation_date', 
            'time_id', 
            'course_id', 
            'name', 
            'age', 
            'gender', 
            'email', 
            'phone_number'
            ]);
        // 二度送信防止
        $request->session()->regenerateToken();

        return view('admin.reservation.complete');
    }

    public function delete($id)
    {
        DB::transaction(function () use ($id) {
            Reservation::destroy($id);
        });
        return redirect()->route('admin.index');
    }
}

