<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function index() {
        $items = Reservation::all();
        return view('admin.reservation.index', compact('items'));
    }

    public function create() {
        $free_rooms = Bill::where('status', 'Свободно')->get();
        return view('admin.reservation.create', compact('free_rooms'));
    }

    public function store(Request $request)
    {
        $data = $request->input();
        $result = Reservation::create($data);


        if (empty($result))
            return redirect()->route('reservation.index')->with('error', 'При создании брони произошла ошибка.');
        else {
            $room = Bill::find($data['bill_id']);
            $room->status = 'Забронировано';
            $room->save();
            return redirect()->route('reservation.index')->with('success', 'Бронь успешно создана.');
        }

    }

    public function edit($id)
    {
        $item = Reservation::find($id);
        $free_rooms = Bill::where('status', 'Свободно')->get();
        return view('admin.reservation.edit', compact('item', 'free_rooms'));
    }

    public function update(Request $request, $id, $old_bill_id)
    {
        $data = $request->input();
        $result = Reservation::find($id)->update($data);
        $new_reservation = Reservation::find($id);
        //dd($new_reservation->bill_id, $old_bill_id);
        if (empty($result))
            return redirect()->route('reservation.index')->with('error', 'При сохранении брони произошла ошибка.');
        else {
            if ($data['bill_id'] != $old_bill_id) {
                $old_bill = Bill::find($old_bill_id);
                $old_bill->status = 'Свободно';
                $old_bill->save();

                $new_bill = Bill::find($data['bill_id']);
                $new_bill->status = 'Забронировано';
                $new_bill->save();
            }
            return redirect()->route('reservation.index')->with('success', 'Бронь успешно сохранена.');
        }

    }

    public function destroy($id)
    {
        $item = Reservation::find($id);
        $item = Bill::find($item->bill_id);
        $item->status = 'Свободно';
        $item->save();
        $result = Reservation::find($id)->delete();

        if (empty($result))
            return redirect()->route('reservation.index')->with('error', 'При удалении брони произошла ошибка.');
        else
            return redirect()->route('reservation.index')->with('success', 'Бронь успешно удалена.');
    }
}
