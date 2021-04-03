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
                    <div class="card-header">Страница добавления услуги</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('service.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Название услуги</label>
                                        <input type="text" placeholder="Введите название услуги" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Цена</label>
                                        <input type="text" placeholder="Введите цену услуги" class="form-control" id="price" name="price">
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
