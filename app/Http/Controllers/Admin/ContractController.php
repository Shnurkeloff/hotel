<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Contract::all();
        return view('admin.contract.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Category::all();
        return view('admin.contract.create', compact('items'));
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
        $result = Contract::create($data);

        if (empty($result))
            return redirect()->route('contract.index')->with('error', 'При добавлении договора произошла ошибка.');
        else
            return redirect()->route('contract.index')->with('success', 'Договор успешно добавлен.');
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
        $item = Contract::find($id);
        $categories = Category::select('id', 'name')->get();
        return view('admin.contract.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        $result = Contract::find($id)->update($data);

        if (empty($result))
            return redirect()->route('contract.index')->with('error', 'При сохранении договора произошла ошибка.');
        else
            return redirect()->route('contract.index')->with('success', 'Договор успешно сохранен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Contract::find($id)->delete();

        if (empty($result))
            return redirect()->route('contract.index')->with('error', 'При удалении договора произошла ошибка.');
        else
            return redirect()->route('contract.index')->with('success', 'Договор успешно удален.');
    }
}
