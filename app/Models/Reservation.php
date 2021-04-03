<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    protected $fillable = ['status', 'reservation_date', 'bill_id'];

    public function bill() {
        return $this->belongsTo(Bill::class);
    }
}
