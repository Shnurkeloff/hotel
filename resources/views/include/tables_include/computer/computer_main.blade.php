
<div class="row">
    <div class="col-md-12">
        <table id="datatable-example" class="table table-sm table-striped font-rob">
            <thead>
            <tr>
                <th>ID</th>
                <th>Цена компьютера</th>
                <th>Дата покупки</th>
                <th>Номер кабинета</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ $item->id }}</th>
                    <th>{{ $item->price }}</th>
                    <th>{{ $item->purchase_date }}</th>
                    <th>{{ $item->cabinet_id }}</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="price">Цена компьютера</label>
            <input type="text" class="form-control" placeholder="Введите цену компьютера" id="price" name="price" value="{{ $item->price }}" required>
        </div>
        <div class="form-group">
            <label for="purchase_date">Дата покупки компьютера</label>
            <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{ $item->purchase_date }}" required>
        </div>
        <div class="form-group">
            <label for="cabinet_id">Номер кабинета</label>
            <input type="text" class="form-control" placeholder="Введите номер кабинета" id="cabinet_id" name="cabinet_id" value="{{ $item->cabinet_id }}" required>
        </div>
    </div>
</div>