<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'passport_series', 'passport_number', 'user_id', 'contract_id'];

    public function contract() {
        return $this->belongsTo(Contract::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
