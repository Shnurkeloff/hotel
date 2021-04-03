@section('sidebar')
    <div class="vertical-menu">

        <div data-simplebar class="h-100">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Страницы</li>

                    <li>
                        <a href="{{ route('adminPanel') }}" class="waves-effect">
                            <span>Главная</span>
                        </a>
                    </li>
                    <li class="menu-title">Данные</li>

                    <li>
                        <a href="{{ route('category.index') }}" class="waves-effect">
                            <span>Категории</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bill.index') }}" class="waves-effect">
                            <span>Номера</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contract.index') }}" class="waves-effect">
                            <span>Договора</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('client.index') }}" class="waves-effect">
                            <span>Клиенты</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('service.index') }}" class="waves-effect">
                            <span>Услуги</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('reservation.index') }}" class="waves-effect">
                            <span>Бронирования</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('registration.index') }}" class="waves-effect">
                            <span>Регистрация</span>
                        </a>
                    </li>
                    <li class="menu-title">Дополнительная информация</li>
                    <li>
                        <a href="" class="waves-effect">
                            <span>Устаревшие компьютеры</span>
                        </a>
                    </li>
                    <li>
                        <a href="" class="waves-effect">
                            <span>Перемещение компьютеров</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
