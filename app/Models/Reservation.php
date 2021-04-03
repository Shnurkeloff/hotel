<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['status', 'reservation_date', 'bill_id'];

    public function bill() {
        return $this->belongsTo(Bill::class);
    }
}
