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
                    <div class="card-header">Информация о клиентах</div>

                    <div class="card-body">

                        <a href="{{ route('client.create') }}"><button class="btn btn-success mb-3">Добавить</button></a>

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
                            @foreach($items as $item)
                                <tr>
                                    <th><a href="{{ route('client.edit', $item->id) }}">{{ $item->id }}</a></th>
                                    <th><a href="{{ route('client.edit', $item->id) }}">{{ $item->name }}</a></th>
                                    <th><a href="{{ route('client.edit', $item->id) }}">{{ $item->passport_series }}</a></th>
                                    <th><a href="{{ route('client.edit', $item->id) }}">{{ $item->passport_number }}</a></th>
                                    <th><a href="{{ route('client.edit', $item->id) }}">{{ $item->user->login }}</a></th>
                                    <th><a href="{{ route('client.edit', $item->id) }}">{{ $item->contract->id }}</a></th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
