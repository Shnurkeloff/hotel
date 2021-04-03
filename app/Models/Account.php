<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $fillable = ['service_id', 'registration_id'];

    public function service() {
        return $this->belongsTo(Service::class);
    }

    public function registration() {
        return $this->belongsTo(Registration::class);
    }
}
