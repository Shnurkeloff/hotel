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
                    <div class="card-header">Страница изменения услуг</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="datatable-example" class="table table-sm table-striped font-rob">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Бронь</th>
                                        <th>Дата бронирования</th>
                                        <th>Название номера</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <th>{{ $item->status }}</th>
                                        <th>{{ $item->reservation_date }}</th>
                                        <th>{{ $item->bill->name }}</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('reservation.update', [$item->id, $item->bill_id]) }}" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-group">
                                        <label for="status">Бронь</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="Забронировано" selected>Забронировано</option>
                                            <option value="Свободно">Свободно</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="reservation_date">Дата бронирования</label>
                                        <input type="date" class="form-control" value="{{ $item->reservation_date }}" id="reservation_date" name="reservation_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="bill_id">Название номера</label>
                                        <select name="bill_id" id="bill_id" class="form-control">
                                            @foreach($free_rooms as $free_room)
                                                <option value="{{ $free_room->id }}">{{ $free_room->name }}</option>
                                            @endforeach
                                                <option value="{{ $item->bill->id }}" selected>{{ $item->bill->name }}</option>
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

                        <form action="{{ route('reservation.destroy', $item->id) }}" method="POST">
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
