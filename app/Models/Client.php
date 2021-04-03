<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'passport_series', 'passport_number', 'user_id', 'contract_id'];

    public function contract() {
        return $this->belongsTo(Contract::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
