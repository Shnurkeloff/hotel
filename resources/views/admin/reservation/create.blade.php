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
                    <div class="card-header">Страница добавления бронирования</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('reservation.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="status">Бронь</label>
                                        <input type="text" class="form-control" value="Забронировано" id="status" name="status">
                                    </div>
                                    <div class="form-group">
                                        <label for="reservation_date">Дата бронирования</label>
                                        <input type="date" class="form-control" id="reservation_date" name="reservation_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="bill_id">Название номера</label>
                                        <select name="bill_id" id="bill_id" class="form-control">
                                            @foreach($free_rooms as $free_room)
                                                <option value="{{ $free_room->id }}">{{ $free_room->name }}</option>
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
