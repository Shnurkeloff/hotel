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
                    <div class="card-header">Информация о договорах</div>

                    <div class="card-body">

                        <a href="{{ route('contract.create') }}"><button class="btn btn-success mb-3">Добавить</button></a>

                        <table id="datatable-example" class="table table-sm table-striped font-rob">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Дата заключения</th>
                                <th>Дата окончания</th>
                                <th>Описание</th>
                                <th>Категория</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <th><a href="{{ route('contract.edit', $item->id) }}">{{ $item->id }}</a></th>
                                    <th><a href="{{ route('contract.edit', $item->id) }}">{{ $item->date_conclusion }}</a></th>
                                    <th><a href="{{ route('contract.edit', $item->id) }}">{{ $item->date_completion }}</a></th>
                                    <th><a href="{{ route('contract.edit', $item->id) }}">{{ $item->description }}</a></th>
                                    <th><a href="{{ route('contract.edit', $item->id) }}">{{ $item->category->name }}</a></th>
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
