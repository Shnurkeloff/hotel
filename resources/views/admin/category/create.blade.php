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
                    <div class="card-header">Страница добавления категории</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('category.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Название категории</label>
                                        <input type="text" class="form-control" placeholder="Введите название категории" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="number_seats">Количество мест</label>
                                        <input type="text" class="form-control" placeholder="Введите количество мест" id="number_seats" name="number_seats">
                                    </div>
                                    <div class="form-group">
                                        <label for="number_rooms">Количество комнат</label>
                                        <input type="text" class="form-control" placeholder="Введите количество комнат" id="number_rooms" name="number_rooms">
                                    </div>
                                    <div class="form-group">
                                        <label for="price_day">Стоимость за сутки</label>
                                        <input type="text" class="form-control" placeholder="Введите стоимость за сутки" id="price_day" name="price_day">
                                    </div>
                                    <div class="form-group">
                                        <label for="more_info">Доп. информация</label> <br>
                                        <textarea name="more_info" id="more_info" cols="80" rows="5"></textarea>
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
