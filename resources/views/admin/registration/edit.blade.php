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
                    <div class="card-header">Страница изменения регистрации</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
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
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <th>{{ $item->date_settlement }}</th>
                                        <th>{{ $item->date_eviction }}</th>
                                        <th>{{ $item->contract->id }}</th>
                                        <th>{{ $item->bill->name }}</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('registration.update', [$item->id, $item->bill_id]) }}" method="post">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-group">
                                        <label for="date_settlement">Дата заселения</label>
                                        <input type="date" class="form-control" value="{{ $item->date_settlement }}" id="date_settlement" name="date_settlement">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_eviction">Дата выселения</label>
                                        <input type="date" class="form-control" value="{{ $item->date_eviction }}" id="date_eviction" name="date_eviction">
                                    </div>
                                    <div class="form-group">
                                        <label for="contract_id">Номер договора</label>
                                        <select name="contract_id" id="contract_id" class="form-control">
                                            @foreach($contracts as $contract)
                                                <option value="{{ $contract->id }}" @if($contract->id == $item->contract_id) selected @endif >{{ $contract->id }}</option>
                                            @endforeach
                                                <option value="{{ $item->contract_id }}">{{ $item->contract_id }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bill_id">Номер</label>
                                        <select name="bill_id" id="bill_id" class="form-control">
                                            @foreach($bills as $bill)
                                                <option value="{{ $bill->id }}" @if($bill->id == $item->bill_id) selected @endif >{{ $bill->name }}</option>
                                            @endforeach
                                                <option value="{{ $item->id }}">{{ $item->bill->name }}</option>
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
                        <form action="{{ route('registration.destroy', $item->id) }}" method="POST">
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
