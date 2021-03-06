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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Страница добавления клиента</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('client.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">ФИО</label>
                                        <input type="text" placeholder="Введите ваше ФИО" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="passport_series">Серия паспорта</label>
                                        <input type="text" placeholder="Введите серию паспорта" class="form-control" id="passport_series" name="passport_series">
                                    </div>
                                    <div class="form-group">
                                        <label for="passport_number">Номер паспорта</label>
                                        <input type="text" placeholder="Введите номер паспорта" class="form-control" id="passport_number" name="passport_number">
                                    </div>
                                    <div class="form-group">
                                        <label for="user_id">Логин пользователя</label>
                                        <select name="user_id" id="user_id" class="form-control">
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->login }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="contract_id">Номер договора</label>
                                        <select name="contract_id" id="contract_id" class="form-control">
                                            @foreach($contracts as $contract)
                                                <option value="{{ $contract->id }}">{{ $contract->id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success" class="form-control">Добавить</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
