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
                                        <th>Название категории</th>
                                        <th>Количество мест</th>
                                        <th>Количество комнат</th>
                                        <th>Стоимость за сутки</th>
                                        <th>Доп. инфо</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>{{ $item->id }}</a></th>
                                        <th>{{ $item->name }}</a></th>
                                        <th>{{ $item->number_seats }}</a></th>
                                        <th>{{ $item->number_rooms }}</a></th>
                                        <th>{{ $item->price_day }}</a></th>
                                        <th>{{ $item->more_info }}</a></th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('category.update', $item->id) }}" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Название категории</label>
                                        <input type="text" class="form-control" value="{{ $item->name }}" placeholder="Введите название категории" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="number_seats">Количество мест</label>
                                        <input type="text" class="form-control" value="{{ $item->number_seats }}" placeholder="Введите количество мест" id="number_seats" name="number_seats">
                                    </div>
                                    <div class="form-group">
                                        <label for="number_rooms">Количество комнат</label>
                                        <input type="text" class="form-control" value="{{ $item->number_rooms }}" placeholder="Введите количество комнат" id="number_rooms" name="number_rooms">
                                    </div>
                                    <div class="form-group">
                                        <label for="price_day">Стоимость за сутки</label>
                                        <input type="text" class="form-control" value="{{ $item->price_day }}" placeholder="Введите стоимость за сутки" id="price_day" name="price_day">
                                    </div>
                                    <div class="form-group">
                                        <label for="more_info">Доп. информация</label> <br>
                                        <textarea name="more_info" id="more_info" cols="80" rows="5">{{ $item->more_info }}</textarea>
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

                        <form action="{{ route('category.destroy', $item->id) }}" method="POST">
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
