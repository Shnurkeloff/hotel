<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use SoftDeletes;

    public function contract() {
        return $this->belongsTo(Contract::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function bills() {
        return $this->hasMany(Bill::class);
    }
}
