<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['reservation_date', 'time_id', 'course_id', 'name', 'age', 'gender', 'email', 'phone_number'];
    protected $dates = ['reservation_date'];

}
