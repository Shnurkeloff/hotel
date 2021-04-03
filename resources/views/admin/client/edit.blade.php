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
                    <div class="card-header">Страница изменения клиента</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="datatable-example" class="table table-sm table-striped font-rob">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ФИО</th>
                                        <th>Серия паспорта</th>
                                        <th>Номер паспорта</th>
                                        <th>Логин пользователя</th>
                                        <th>Номер договора</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <th>{{ $item->name }}</th>
                                        <th>{{ $item->passport_series }}</th>
                                        <th>{{ $item->passport_number }}</th>
                                        <th>{{ $item->user->login }}</th>
                                        <th>{{ $item->contract->id }}</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('client.update', $item->id) }}" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">ФИО</label>
                                        <input type="text" placeholder="Введите ваше ФИО" value="{{ $item->name }}" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="passport_series">Серия паспорта</label>
                                        <input type="text" placeholder="Введите серию паспорта" value="{{ $item->passport_series }}" class="form-control" id="passport_series" name="passport_series">
                                    </div>
                                    <div class="form-group">
                                        <label for="passport_number">Номер паспорта</label>
                                        <input type="text" placeholder="Введите номер паспорта" value="{{ $item->passport_number }}" class="form-control" id="passport_number" name="passport_number">
                                    </div>
                                    <div class="form-group">
                                        <label for="user_id">Логин пользователя</label>
                                        <input type="text" placeholder="Введите логин пользователя" value="{{ $item->user->login }}" class="form-control" id="user_id" name="user_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="contract_id">Номер договора</label>
                                        <input type="text" placeholder="Введите номер договора" value="{{ $item->contract->id }}" class="form-control" id="contract_id" name="contract_id">
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

                        <form action="{{ route('client.destroy', $item->id) }}" method="POST">
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
