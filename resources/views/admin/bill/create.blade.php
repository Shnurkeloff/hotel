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
                    <div class="card-header">Страница добавления номера</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('bill.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Название номера</label>
                                        <input type="text" class="form-control" placeholder="Введите название номера" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Название категории</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            @foreach($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
