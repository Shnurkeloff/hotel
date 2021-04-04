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
                    <div class="card-header">Информация о освобождающихся номерах</div>

                    <div class="card-body">

                        <button id="btnExport" onclick="fnExcelReport();" class="btn btn-success"> EXPORT </button>
                        <table id="datatable-example" class="table table-sm table-striped font-rob">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Номер договора</th>
                                <th>Дата выселения</th>
                                <th>Название номера</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($registrations as $registration)
                                <tr>
                                    <th>{{ $registration->id }}</th>
                                    <th>{{ $registration->contract->id }}</th>
                                    <th>{{ $registration->date_eviction }}</th>
                                    <th>{{ $registration->bill->name }}</th>
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
