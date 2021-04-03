@extends('layouts.app')

@section('sidebar')
    @include('include.sidebar')
@endsection

@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                @include('include.messages')
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Страница изменения филиала</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="datatable-example" class="table table-sm table-striped font-rob">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Описание</th>
                                        <th>Дата заключения</th>
                                        <th>Дата оканчания</th>
                                        <th>Категория</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <th>{{ $item->description }}</th>
                                        <th>{{ $item->date_conclusion }}</th>
                                        <th>{{ $item->date_completion }}</th>
                                        <th>{{ $item->category->name }}</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('contract.update', $item->id) }}" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-group">
                                        <label for="description">Описание</label>
                                        <input type="text" class="form-control" value="{{ $item->description }}" placeholder="Введите описание" id="description" name="description">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_conclusion">Дата заключения</label>
                                        <input type="date" class="form-control" value="{{ $item->date_conclusion }}" id="date_conclusion" name="date_conclusion">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_completion">Дата оканчания</label>
                                        <input type="date" class="form-control" value="{{ $item->date_completion }}" id="date_completion" name="date_completion">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Категория</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" @if($item->category->id == $category->id) selected @endif >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Доп. информация</div>
                    <div class="card-body">
                        <h5>ID:{{ $item->id }}</h5>
                        <hr>

                        <div class="form-group">
                            <label for="created_at">Создано</label>
                            <input type="text" id="created_at" class="form-control" value="{{ $item->created_at }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="updated_at">Изменено</label>
                            <input type="text" id="updated_at" class="form-control" value="{{ $item->updated_at }}" disabled>
                        </div>

                        <div class="form-group">
                            <label for="deleted_at">Удалено</label>
                            <input type="text" id="deleted_at" class="form-control" value="{{ $item->deleted_at }}" disabled>
                        </div>

                        <form action="{{ route('contract.destroy', $item->id) }}" method="POST">
                            @method('DELETE')
                            @csrf

                            <div class="form-group">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Вы действительно хотите удалить?')">Удалить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
