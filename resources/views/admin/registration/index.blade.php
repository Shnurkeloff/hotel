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
                    <div class="card-header">Информация о регистрациях</div>

                    <div class="card-body">

                        <a href="{{ route('registration.create') }}"><button class="btn btn-success mb-3">Добавить</button></a>

                        <table id="datatable-example" class="table table-sm table-striped font-rob">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Дата заселения</th>
                                <th>Дата выселения</th>
                                <th>Номер договора</th>
                                <th>Номер</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <th><a href="{{ route('registration.edit', $item->id) }}">{{ $item->id }}</a></th>
                                    <th><a href="{{ route('registration.edit', $item->id) }}">{{ $item->date_settlement }}</a></th>
                                    <th><a href="{{ route('registration.edit', $item->id) }}">{{ $item->date_eviction }}</a></th>
                                    <th><a href="{{ route('registration.edit', $item->id) }}">{{ $item->contract->id }}</a></th>
                                    <th><a href="{{ route('registration.edit', $item->id) }}">{{ $item->bill->name }}</a></th>
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
