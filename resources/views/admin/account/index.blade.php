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
                    <div class="card-header">Информация о счетах</div>

                    <div class="card-body">

                        <a href="{{ route('account.create') }}"><button class="btn btn-success mb-3">Добавить</button></a>

                        <table id="datatable-example" class="table table-sm table-striped font-rob">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Услуга</th>
                                <th>Номер регистрации</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <th><a href="{{ route('account.edit', $item->id) }}">{{ $item->id }}</a></th>
                                    <th><a href="{{ route('account.edit', $item->id) }}">{{ $item->service->name }}</a></th>
                                    <th><a href="{{ route('account.edit', $item->id) }}">{{ $item->registration->id }}</a></th>
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