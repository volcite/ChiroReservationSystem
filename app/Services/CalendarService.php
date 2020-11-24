<?php

namespace App\Services;

use Carbon\Carbon;

class CalendarService
{
    /**
     * カレンダーデータを返却する
     *
     * @return array
     */
    public function getCalendar()
    {
        $dt = new Carbon(self::getYm_firstday());

        $dt->startOfMonth(); //今月の最初の日
        $dt->timezone = 'Asia/Tokyo'; //日本時刻で表示
        $daysInMonth = $dt->daysInMonth;//今月は何日まであるか
      
        //曜日の配列作成
        $headings = ['月','火','水','木','金','土','日'];
    
        $calendar = '<table class="calendar-table">';
        $calendar .= '<thead >';
        foreach($headings as $heading){
            $calendar .= '<th class="calendarHeader text-white" style="background-color:#4c586f">'.$heading.'</th>';
        }

        $calendar .= '</thead>';

        $calendar .= '<tbody><tr>';
            
            //今月は何日まであるか
                $daysInMonth = $dt->daysInMonth;
            
                for ($i = 1; $i <= $daysInMonth; $i++) {
                    if($i==1){
                        if ($dt->format('N')!= 1) {
                            $calendar .= '<td class ="h5" colspan="'.($dt->format('N')-1).'"></td>'; //1日が月曜じゃない場合はcospanでその分あける
                        }
                    }
                    if($dt->format('N') == 1){
                        $calendar .= '</tr><tr>'; //月曜日だったら改行
                    }
                    $comp = new Carbon($dt->year."-".$dt->month."-".$dt->day); //ループで表示している日
                    $comp_now = Carbon::today(); //今日

                    if($comp->lt($comp_now)){
                        $calendar .= '<td class="day" style="background-color:#ddd;">'.$dt->day.'</td>';
                    }else{
                    //ループの日と今日を比較
                    if ($comp->eq($comp_now)) {
                        //同じなので緑色の背景にする
                        $calendar .= '<td class="h5 text-white" style="background-color:#008b8b;">'.$dt->day.'</td>';
                    }else{
                        switch ($dt->format('N')) {
                            case 6:
                                $calendar .= '<td class="h5" style="background-color:#b0e0e6"><a href="./reservation/'.$dt->year.'/'.$dt->month.'/'.$dt->day.'">'.$dt->day.'</a></td>';
                                break;
                            case 7:
                                $calendar .= '<td class="h5" style="background-color:#f08080"><a href="./reservation/'.$dt->year.'/'.$dt->month.'/'.$dt->day.'">'.$dt->day.'</a></td>';
                                break;
                            default:
                            $calendar .= '<td class="h5" ><a href="./reservation/'.$dt->year.'/'.$dt->month.'/'.$dt->day.'">'.$dt->day.'</a></td>';
                                break;
                            }
                        }
                    }
                    $dt->addDay();
                }
            
            $calendar .= '</tr></tbody>';
        
        $calendar .= '</table>';
        
        return $calendar;

    }

    /**
     * month 文字列を返却する
     *
     * @return string
     */
    public function getMonth()
    {
        return Carbon::parse(self::getYm_firstday())->format('Y年n月');
    }

    /**
     * prev 文字列を返却する
     *
     * @return string
     */
    public function getPrev()
    {
        return Carbon::parse(self::getYm_firstday())->subMonthsNoOverflow()->format('Y-m');
    }

    /**
     * next 文字列を返却する
     *
     * @return string
     */
    public function getNext()
    {
        return Carbon::parse(self::getYm_firstday())->addMonthNoOverflow()->format('Y-m');
    }

    /**
     * GET から Y-m フォーマットを返却する
     *
     * @return string
     */
    private static function getYm()
    {
        if (isset($_GET['ym'])) {
            return $_GET['ym'];
        }
        return Carbon::now()->format('Y-m');
    }

    /**
     * 2019-09-01 のような月初めの文字列を返却する
     *
     * @return string
     */
    private static function getYm_firstday()
    {
        return self::getYm() . '-01';
    }
}