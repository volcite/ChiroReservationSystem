<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Controllers\Controller;

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
        $this->storeToSession($id);
        $reservation = session('reservation');
        return view('admin.reservation.showDetail', compact('reservation'));
    }

    public function editReserve()
    {
        $reservation = session('reservation');
        session()->forget('reservation');
        return view('admin.reservation.edit', compact('reservation'));
    }

    public function confirmReserve(Request $request, $id)
    {
        // 新しいsessionになってるはず…
        $this->storeToSession($id);
        $reservation = session('reservation');
        return view('admin.reservation.confirm', compact('reservation'));
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
