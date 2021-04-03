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
                    <div class="card-header">Страница добавления регистрации</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('registration.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="date_settlement">Дата заселения</label>
                                        <input type="date" class="form-control" id="date_settlement" name="date_settlement">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_eviction">Дата выселения</label>
                                        <input type="date" class="form-control" id="date_eviction" name="date_eviction">
                                    </div>
                                    <div class="form-group">
                                        <label for="contract_id">Номер договора</label>
                                        <select name="contract_id" id="contract_id" class="form-control">
                                            @foreach($contracts as $contract)
                                                <option value="{{ $contract->id }}">{{ $contract->id }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bill_id">Номер</label>
                                        <select name="bill_id" id="bill_id" class="form-control">
                                            @foreach($bills as $bill)
                                                <option value="{{ $bill->id }}">{{ $bill->name }}</option>
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
