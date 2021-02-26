<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Course;
use App\Models\Time;
use App\Http\Controllers\Controller;
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

    public function storeToSession($id)
    {
        $reservation = Reservation::find($id);
        session(['reservation' => $reservation]);
    }

    public function showDetail($id)
    {
        $reservation = Reservation::find($id);
        return view('admin.reservation.showDetail', compact('reservation'));
    }

    public function editReserve($id)
    {
        $this->storeToSession($id);
        $reservation = session()->get('reservation');

        // editするuserと同日の予約済み時間を探す
        $reserved_times = DB::table('reservations')->select('time_id')
        ->where('reservation_date', $reservation->reservation_date)
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

    public function rePostReserve(ReservationRequest $request, $id)
    {
        $reservation = Reservation::find($id);

        DB::transaction(function () use ($reservation, $request) {
            $reservation->reservation_date = $request->reservation_date;
            $reservation->time_id = $request->time_id;
            $reservation->course_id = $request->course_id;
            $reservation->name =$request->name;
            $reservation->age = $request->age;
            $reservation->gender = $request->gender;
            $reservation->email = $request->email;
            $reservation->phone_number = $request->phone_number;

            $reservation->save();
        });
        return view('admin.reservation.thanks');
    }

    public function deleteReserve($id)
    {
        DB::transaction(function () use ($id) {
            Reservation::destroy($id);
        });

        return redirect()->route('admin.index');
    }
}
/* revise.blade.php→編集
    check.blade.php->詳細 
 とそのあたりのcontroller再利用できそう */
//  ①button押したらセッションに保存
//  ②セッションデータをcheck 詳細 or 編集ページに流す
// 日時・コース・名前・年齢・性別・アドレス・電話
