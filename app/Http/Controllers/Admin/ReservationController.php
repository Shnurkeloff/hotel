<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Reservation::all();
        return view('admin.reservation.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $free_rooms = Bill::where('status', 'Свободно')->get();
        return view('admin.reservation.create', compact('free_rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Reservation::find($id);
        $free_rooms = Bill::where('status', 'Свободно')->get();
        return view('admin.reservation.edit', compact('item', 'free_rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $array)
    {
        $data = $request->input();
        $result = Reservation::find($array[0])->update($data);

        if (empty($result))
            return redirect()->route('reservation.index')->with('error', 'При сохранении брони произошла ошибка.');
        else {
            if ($data['bill_id'] != $array[1]) {
                $old_bill = Bill::find($array[1]);
                $old_bill->status = 'Свободно';
                $old_bill->save();
            }
            return redirect()->route('reservation.index')->with('success', 'Бронь успешно сохранена.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Reservation::find($id)->delete();

        if (empty($result))
            return redirect()->route('reservation.index')->with('error', 'При удалении брони произошла ошибка.');
        else
            return redirect()->route('reservation.index')->with('success', 'Бронь успешно удалена.');
    }
}
