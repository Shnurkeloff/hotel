<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Models\Bill;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Bill::all();
        return view('admin.bill.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Category::select('id', 'name')->get();
        return view('admin.bill.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBillRequest $request)
    {
        $data = $request->input();
        $result = Bill::create($data);

        if (empty($result))
            return redirect()->route('bill.index')->with('error', 'При добавлении номера произошла ошибка');
        else
            return redirect()->route('bill.index')->with('success', 'Номер успешно добавлен.');
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
        $item = Bill::find($id);
        $categories = Category::select('id', 'name')->get();
        return view('admin.bill.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillRequest $request, $id)
    {
        $data = $request->input();
        $result = Bill::find($id)->update($data);

        if (empty($result))
            return redirect()->route('bill.index')->with('error', 'При сохранении номера произошла ошибка');
        else
            return redirect()->route('bill.index')->with('success', 'Номер успешно сохранен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Bill::find($id)->delete();

        if (empty($result))
            return redirect()->route('bill.index')->with('error', 'При удалении номера произошла ошибка');
        else
            return redirect()->route('bill.index')->with('success', 'Номер успешно удален.');
    }
}
