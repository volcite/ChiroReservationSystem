<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = ['reservation_date', 'time_id', 'course_id', 'name', 'age', 'gender', 'email', 'phone_number'];

    protected $dates = ['reservation_date'];

    public function time(): BelongsTo
    {
        return $this->belongsTo('App\Models\Time');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo('App\Models\Course');
    }
}
