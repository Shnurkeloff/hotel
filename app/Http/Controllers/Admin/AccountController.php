<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use App\Models\Registration;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Account::all();
        return view('admin.account.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $registrations = Registration::all();

        return view('admin.account.create', compact('services', 'registrations'));
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
        $result = Account::create($data);

        if (empty($result))
            return redirect()->route('account.index')->with('error', 'При создании счета произошла ошибка.');
        else {
            return redirect()->route('account.index')->with('success', 'Счет успешно создан.');
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
        $item = Account::find($id);
        $services = Service::all();
        $registrations = Registration::all();

        return view('admin.account.edit', compact('item', 'services', 'registrations'));
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
        $result = Account::find($id)->update($data);

        if (empty($result))
            return redirect()->route('account.index')->with('error', 'При сохранении счета произошла ошибка.');
        else {
            return redirect()->route('account.index')->with('success', 'Счет успешно сохранен.');
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
        $result = Account::find($id)->delete();

        if (empty($result))
            return redirect()->route('account.index')->with('error', 'При сохранении счета произошла ошибка.');
        else {
            return redirect()->route('account.index')->with('success', 'Счет успешно сохранен.');
        }
    }
}
