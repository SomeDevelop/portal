<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Адмынова панелька | Blank Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <style>
        table.table form{
            display: inline-block;
        }
        button.delete
        {
            background: transparent;
            border: none;
            color: #337ab7;
            padding: 0;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->

        {{--<a href="../../index2.html" class="logo"></a>--}}
        {{--<a href="#" class="logo">--}}
            <!-- mini logo for sidebar mini 50x50 pixels -->

        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    {{--<li class="dropdown messages-menu">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-envelope-o"></i>--}}
                            {{--<span class="label label-success">4</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">У вас 4 повідомлення</li>--}}
                            {{--<li>--}}
                                {{--<!-- inner menu: contains the actual data -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- start message -->--}}
                                        {{--<a href="#">--}}
                                            {{--<div class="pull-left">--}}
                                                {{--<img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
                                            {{--</div>--}}
                                            {{--<h4>--}}
                                                {{--Парніша з аббіцією--}}
                                                {{--<small><i class="fa fa-clock-o"></i> 5 хв</small>--}}
                                            {{--</h4>--}}
                                            {{--<p>Купляй хостінг, поки є можливість!</p>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<!-- end message -->--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer"><a href="#">Переглянути всі повідомлення</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <!-- Notifications: style can be found in dropdown.less -->

                    <!-- Tasks: style can be found in dropdown.less -->
                    {{--<li class="dropdown tasks-menu">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-flag-o"></i>--}}
                            {{--<span class="label label-danger">9</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">У Вас 9 завдань</li>--}}
                            {{--<li>--}}
                                {{--<!-- inner menu: contains the actual data -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- Task item -->--}}
                                        {{--<a href="#">--}}
                                            {{--<h3>--}}
                                                {{--Поправити Flex адапнивність в галереях фото.--}}
                                                {{--<small class="pull-right">20%</small>--}}
                                            {{--</h3>--}}
                                            {{--<div class="progress xs">--}}
                                                {{--<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                                                    {{--<span class="sr-only">20% Виконано</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<!-- end task item -->--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer">--}}
                                {{--<a href="#">Проглянути всі таски</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <!-- User Account: style can be found in dropdown.less -->
                    <li>
                        <a href="{{ route('language.locale', ['locale' => 'ua']) }}">UA</a>

                    </li>
                    <li>
                        <a class="text-danger"href="{{ route('language.locale', ['locale' => 'en']) }}">EN</a>
                    </li>
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">


                                <br>

                                <div>
                                    <a style="color: white;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('messages.logout') }}
                                    </a>
                                </div>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>


                            </li>
                            <!-- Menu Body -->

                        </ul>
                    </li>

                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        {{--<img src="https://camo.githubusercontent.com/f2f5547663dd4286b279d319270607316d5af2cc/68747470733a2f2f63646e2e706272642e636f2f696d616765732f486477437574382e706e67" alt="" width="35" height="35">--}}

        <section class="sidebar">

            <!-- Sidebar user panel -->
            <div class="user-panel">

                <div class="pull-left image">
                    <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Віталій Бєльський</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>


            <!-- sidebar menu: : style can be found in sidebar.less -->
            @include('admin._sidebar')
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <br>
                    @include('flash::message')
                    @if ($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-danger">{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        @yield('content')
    </div>

    {{--<footer class="main-footer">--}}

        {{--<strong>Copyright &copy; 2018.</strong> All rights--}}
        {{--reserved.--}}
    {{--</footer>--}}

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Остання Активність</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">День Народження Мурзіка</h4>

                                <p>23 Квітня 12:00</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Фродо Беггінс змінив свій профайл</h4>

                                <p>Новий тел. +3(850)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">E-mail переписка з Білл Клінтон</h4>

                                <p>bill@example.com</p>
                            </div>
                        </a>
                    </li>

                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Завдання в роботі</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Flax адаптивнысть в галереях
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Обновити Резюме
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Інтеграціі
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Пошук нових заказів
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">
                Статистика</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">Загальні налаштування</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Використовувати панель звітів
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>

                            Інформація про загальніпараметри
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Дозволити перенаправлення пошти
                            <input type="checkbox" class="pull-right" checked>
                        </label>


                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Введіть ім'я автора в повідомленнях
                            <input type="checkbox" class="pull-right" checked>
                        </label>


                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Параметри чату</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Показатии коли онлайн
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Відключення повідомлень
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Видалити історію чату
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>

    <div class="control-sidebar-bg"></div>
</div>
<script src="{{ asset('js/admin.js') }}" defer></script>
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}" defer></script>
<script src="{{ asset('plugins/ckfinder/ckfinder.js') }}" defer></script>


<script>
    // $(document).ready(function(){
    //     var editor = CKEDITOR.replaceAll();
    //     CKFinder.setupCKEditor( editor );
    // })

</script>

</body>

</html>
