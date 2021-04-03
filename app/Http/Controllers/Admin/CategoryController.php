<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Category::all();
        return view('admin.category.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $data = $request->input();
        $result = Category::create($data);

        if (empty($result))
            return redirect()->route('category.index')->with('error', 'При добавлении категории произошла ошибка');
        else
            return redirect()->route('category.index')->with('success', 'Добавление категории произошло успешно');
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
        $item = Category::find($id);
        return view('admin.category.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->input();
        $result = Category::find($id)->update($data);

        if (empty($result))
            return redirect()->route('category.index')->with('error', 'При сохранении произошла ошибка.');
        else
            return redirect()->route('category.index')->with('success', 'Сохранение успешно завершено.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Category::find($id)->delete();

        if (empty($result))
            return redirect()->route('category.index')->with('error', 'При удалении произошла ошибка.');
        else
            return redirect()->route('category.index')->with('success', 'Удаление успешно завершено.');
    }
}
