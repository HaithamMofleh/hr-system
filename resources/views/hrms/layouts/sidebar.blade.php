<!-- -------------- Sidebar - Author -------------- -->
<div class="sidebar-widget author-widget">
    <div class="media">
        <a href="#" class="media-left">
            <img src="{{ URL::asset('assets/img/avatars/profile_pic.png') }}" class="img-responsive">

        </a>

        <div class="media-body">
            <div class="media-author"><a href="#">{{Auth::user()->name}}</a></div>
        </div>
    </div>
</div>

<!-- -------------- Sidebar Menu  -------------- -->
<ul class="nav sidebar-menu scrollable">
    
    <li class="active">
        <a class="accordion-toggle menu-open" href="{{ route('dashboard') }}">
            <span class="fa fa-dashboard"></span>
            <span class="sidebar-title">Dashboard</span>
        </a>
    </li>
    @if(Auth::user()->isHR())
    <li>
        <a class="accordion-toggle" href="">
            <span class="fa fa-user"></span>
            <span class="sidebar-title">Employees</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="{{route('add-employee')}}">
                    <span class="glyphicon glyphicon-tags"></span> Add Employee </a>
            </li>
            <li>
                <a href="{{route('employee-manager')}}">
                    <span class="glyphicon glyphicon-tags"></span> Employee Listing </a>
            </li>
        </ul>
    </li>


    <li>
        <a class="accordion-toggle" href="#">
            <span class="fa fa-graduation-cap"></span>
            <span class="sidebar-title">Roles</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="{{route('add-role')}}">
                    <span class="glyphicon glyphicon-book"></span> Add Role </a>
            </li>
            <li>
                <a href="{{route('role-list')}}">
                    <span class="glyphicon glyphicon-modal-window"></span> Role Listings </a>
            </li>
        </ul>
    </li>
    @endif

    <li>
        <a class="accordion-toggle" href="#">
            <span class="fa fa-envelope"></span>
            <span class="sidebar-title">Leaves</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">

            <li>
                <a href="{{route('my-leave-list')}}">
                    <span class="glyphicon glyphicon-calendar"></span> My Leave List </a>
            </li>

            @if(\Auth::user()->isHR())
            <li>
                <a href="{{route('add-leave-type')}}">
                    <span class="fa fa-desktop"></span> Add Leave Type </a>
            </li>
            <li>
                <a href="{{route('leave-type-listing')}}">
                    <span class="fa fa-clipboard"></span> Leave Type Listings </a>
            </li>

            <li>
                <a href="{{route('total-leave-list')}}">
                    <span class="fa fa-clipboard"></span> Total Leave Listings </a>
            </li>
            @endif
        </ul>
    </li>

    @if(Auth::user()->isHR())
    <li>
        <a class="accordion-toggle" href="#">
            <span class="fa fa-clock-o"></span>
            <span class="sidebar-title"> Attendance </span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="{{route('attendance-upload')}}">
                    <span class="glyphicon glyphicon-book"></span> Add Attendance</a>
            </li>

        </ul>
    </li>

    @endif


</ul>
<!-- -------------- /Sidebar Menu  -------------- -->