<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\Contract;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Client::all();
        return view('admin.client.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $contracts = Contract::all();
        return view('admin.client.create', compact('users', 'contracts'));
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
        $result = Client::create($data);

        if (empty($result))
            return redirect()->route('client.index')->with('error', 'При создании клиента произошла ошибка');
        else
            return redirect()->route('client.index')->with('success', 'Клиент успешно создан.');

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
        $item = Client::find($id);
        return view('admin.client.edit', compact('item'));
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

        $user_id = User::where('login', $data['user_id'])->value('id');
        $contract_id = Contract::where('id', $data['contract_id'])->value('id');

        if (empty($user_id))
            return redirect()->route('client.create')->with('error', 'Такого пользователя не существует');

        if (empty($contract_id))
            return redirect()->route('client.create')->with('error', 'Такого договора не существует');

        $data['user_id'] = $user_id;
        $data['contract_id'] = $contract_id;

        $result = Client::find($id)->update($data);

        if (empty($result))
            return redirect()->route('client.index')->with('error', 'При сохранении клиента произошла ошибка');
        else
            return redirect()->route('client.index')->with('success', 'Клиент успешно сохранен.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Client::find($id)->delete();

        if (empty($result))
            return redirect()->route('client.index')->with('error', 'При удалении клиента произошла ошибка');
        else
            return redirect()->route('client.index')->with('success', 'Клиент успешно удален.');
    }
}
