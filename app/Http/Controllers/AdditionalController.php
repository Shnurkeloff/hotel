<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Client;
use App\Models\Contract;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdditionalController extends Controller
{
    public function rooms() {
        $items = Bill::where('status', 'Свободно')->get();
        return view('additional.freeRooms', compact('items'));
    }

    public function guest() {
        //$guests = Contract::where('date_completion', '<', Carbon::now())->get();
        $guests = Client::
                            join('contracts', 'clients.contract_id', '=', 'contracts.id')
                            ->where('date_completion', '<=', Carbon::now())
                            ->get();
        return view('additional.guests', compact('guests'));
    }

    public function soon_free() {
        $registrations = Registration::where('date_eviction', '<=', Carbon::now()->addDays(3))->get();
        return view('additional.soon', compact('registrations'));
    }
}
