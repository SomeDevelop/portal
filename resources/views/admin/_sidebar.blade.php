<ul class="sidebar-menu">
    <li class="header">Головна навігація</li>
    <li class="treeview">
        <a href="{{route('home')}}">
            <i class="fa fa-dashboard"></i> <span>На Сайт</span>
        </a>
    </li>
    <li><a href="{{ route('permissions.index') }}"><i class="fa fa-sticky-note-o"></i> <span>{{__('messages.permissions')}}</span></a></li>

    <li><a href="{{ route('roles.index') }}"><i class="fa fa-sticky-note-o"></i> <span>{{__('messages.roles')}}</span></a></li>

    <li><a href="{{ route('users.index') }}"><i class="fa fa fa-users"></i> <span>{{__('messages.users')}}</span></a></li>
    <li><a href="{{ route('courses.index') }}"><i class="fa fa-list-ul"></i> <span>Курси</span></a></li>

    <li><a href="{{ route('categories.index') }}"><i class="fa fa-list-ul"></i> <span>Категорії курсів</span></a></li>

    {{--<li><a href="#"><i class="fa fa-tags"></i> <span>Теги (Блог)</span></a></li>--}}
    {{--<li>--}}
        {{--<a href="#">--}}
            {{--<i class="fa fa-commenting"></i> <span>Комментарі</span>--}}
            {{--<span class="pull-right-container">--}}
              {{--<small class="label pull-right bg-green">5</small>--}}
            {{--</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    {{--<li><a href="#"><i class="fa fa-users"></i> <span>Юзери</span></a></li>--}}
    {{--<li><a href="#"><i class="fa fa-user-plus"></i> <span>Підписчики</span></a></li>--}}

</ul>