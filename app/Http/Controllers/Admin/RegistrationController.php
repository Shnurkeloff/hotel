<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use App\Models\Contract;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function index() {
        $items = Registration::all();
        return view('admin.registration.index', compact('items'));
    }

    public function create() {
        $contracts = Contract::all();
        $bills = Bill::where('status', 'Свободно')->get();

        return view('admin.registration.create', compact('contracts', 'bills'));
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $result = Registration::create($data);

        if (empty($result))
            return redicrect()->route('registration.index')->with('error', 'При создании регистрации произошла ошибка.');
        else {
            $bill = Bill::find($data['bill_id']);
            $bill->status = 'Занято';
            $bill->save();

            return redirect()->route('registration.index')->with('success', 'Создание регистрации прошла успешно.');
        }
    }

    public function edit($id)
    {
        $item = Registration::find($id);

        $price_day = $item->bill->category->price_day;
        $first_day = new Carbon($item->date_settlement);
        $last_day = new Carbon($item->date_eviction);
        $difference_days = $last_day->diff($first_day)->days;
        $payout = $difference_days * $price_day;

        $contracts = Contract::all();
        $bills = Bill::where('status', 'Свободно')->get();

        return view('admin.registration.edit', compact('item', 'contracts', 'bills', 'payout'));
    }

    public function update(Request $request, $id, $old_bill_id)
    {
        $data = $request->input();
        $result = Registration::find($id)->update($data);

        if (empty($result))
            return redirect()->route('registration.index')->with('error', 'При сохранении регистрации произошла ошибка.');
        else {
            if ($data['bill_id'] != $old_bill_id) {
                $old_bill = Bill::find($old_bill_id);
                $old_bill->status = 'Свободно';
                $old_bill->save();

                $new_bill = Bill::find($data['bill_id']);
                $new_bill->status = 'Занято';
                $new_bill->save();
            }
            return redirect()->route('registration.index')->with('success', 'Регистрация успешно сохранена.');
        }
    }

    public function destroy($id)
    {
        $result = Registration::find($id)->delete();

        if (empty($result))
            return redirect()->route('registration.index')->with('error', 'При удалении регистрации произошла ошибка.');
        else
            return redirect()->route('registration.index')->with('success', 'Регистрация успешно удалена.');
    }
}
