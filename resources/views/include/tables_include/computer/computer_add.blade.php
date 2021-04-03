<div class="row">
    <div class="col-md-12">
        <table id="datatable-example" class="table table-sm table-striped font-rob">
            <thead>
            <tr>
                <th>Корпус</th>
                <th>Мат. плата</th>
                <th>Процессор</th>
                <th>Видеокарта</th>
                <th>ОЗУ</th>
                <th>Блок питания</th>
                <th>CD-ROM</th>
                <th>Описание или доп. оборудование</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th><a href="{{ route('tables.computer.edit', $item->id) }}">{{ $item->pc_case }}</a></th>
                    <th><a href="{{ route('tables.computer.edit', $item->id) }}">{{ $item->mboard }}</a></th>
                    <th><a href="{{ route('tables.computer.edit', $item->id) }}">{{ $item->cpu }}</a></th>
                    <th><a href="{{ route('tables.computer.edit', $item->id) }}">{{ $item->gpu }}</a></th>
                    <th><a href="{{ route('tables.computer.edit', $item->id) }}">{{ $item->ram }}</a></th>
                    <th><a href="{{ route('tables.computer.edit', $item->id) }}">{{ $item->power_supply }}</a></th>
                    <th><a href="{{ route('tables.computer.edit', $item->id) }}">{{ $item->cd_rom }}</a></th>
                    <th><a href="{{ route('tables.computer.edit', $item->id) }}">{{ $item->description }}</a></th>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="pc_case">Корпус <small class="text-info">(необязательно)</small> </label>
            <input type="text" class="form-control" placeholder="Введите название корпуса" id="pc_case" name="pc_case" value="{{ $item->pc_case }}">
        </div>
        <div class="form-group">
            <label for="mboard">Материнская плата <small class="text-info">(необязательно)</small> </label>
            <input type="text" class="form-control" placeholder="Введите название материнской платы" id="mboard" name="mboard" value="{{ $item->mboard }}">
        </div>
        <div class="form-group">
            <label for="cpu">Процессор <small class="text-info">(необязательно)</small> </label>
            <input type="text" class="form-control" placeholder="Введите название процессора" id="cpu" name="cpu" value="{{ $item->cpu }}">
        </div>
        <div class="form-group">
            <label for="gpu">Видеокарта <small class="text-info">(необязательно)</small> </label>
            <input type="text" class="form-control" placeholder="Введите название видеокарты" id="gpu" name="gpu" value="{{ $item->gpu }}">
        </div>
        <div class="form-group">
            <label for="ram">ОЗУ <small class="text-info">(необязательно)</small> </label>
            <input type="text" class="form-control" placeholder="Введите размер озу" id="ram" name="ram" value="{{ $item->ram }}">
        </div>
        <div class="form-group">
            <label for="power_supply">Блок питания <small class="text-info">(необязательно)</small> </label>
            <input type="text" class="form-control" placeholder="Введите название блока питания" id="power_supply" name="power_supply" value="{{ $item->power_supply }}">
        </div>
        <div class="form-group">
            <label for="cd_rom">CD-ROM <small class="text-info">(необязательно)</small> </label>
            <select name="cd_rom" id="cd_rom" class="form-control">
                <option value="Отсутствует" @if($item->cd_rom == 'Отсутствует') selected @endif >Отсутствует</option>
                <option value="Присутствует" @if($item->cd_rom == 'Присутствует') selected @endif>Присутствует</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Описание и доп. оборудование <small class="text-info">(необязательно)</small> </label>
            <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ $item->description }}</textarea>
        </div>
    </div>
</div>