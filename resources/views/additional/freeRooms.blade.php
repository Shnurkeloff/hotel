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
                    <div class="card-header">Информация о свободных номерах</div>

                    <div class="card-body">

                        <button id="btnExport" onclick="fnExcelReport();" class="btn btn-success"> EXPORT </button>
                        <table id="datatable-example" class="table table-sm table-striped font-rob">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Название номера</th>
                                <th>Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr @if($item->status == 'Свободно') style="background-color: greenyellow;" @endif>
                                    <th>{{ $item->id }}</th>
                                    <th>{{ $item->name }}</th>
                                    <th>{{ $item->status }}</th>
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
