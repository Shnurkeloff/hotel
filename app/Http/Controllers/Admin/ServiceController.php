<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Service::all();
        return view('admin.service.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
        $result = Service::create($data);

        if (empty($result))
            return redirect()->route('service.index')->with('error', 'При добавлении услуги произошла ошибка');
        else
            return redirect()->route('service.index')->with('success', 'Услуга успешно добавлена');
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
        $item = Service::find($id);
        return view('admin.service.edit', compact('item'));
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
        $result = Service::find($id)->update($data);

        if (empty($result))
            return redirect()->route('service.index')->with('error', 'При сохранении услуги произошла ошибка');
        else
            return redirect()->route('service.index')->with('success', 'Услуга успешно сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Service::find($id)->delete();

        if (empty($result))
            return redirect()->route('service.index')->with('error', 'При удалении услуги произошла ошибка');
        else
            return redirect()->route('service.index')->with('success', 'Услуга успешно удалена');
    }
}
