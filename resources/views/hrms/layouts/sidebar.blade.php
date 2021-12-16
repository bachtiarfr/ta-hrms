<!-- -------------- Sidebar - Author -------------- -->
<div class="sidebar-widget author-widget">
    <div class="media">
        <div class="media-body">
            <div class="media-author"><a href="/profile">{{Auth::user()->name}}</a></div>
        </div>
    </div>
</div>

<!-- -------------- Sidebar Menu  -------------- -->
<ul class="nav sidebar-menu scrollable">
    <li class="active">
        <a  href="{{route('dashboard')}}">
            <span class="fa fa-dashboard"></span>
            <span class="sidebar-title">Dashboard</span>
        </a>
    </li>
    @if(Auth::user()->isHR())
        <li>
            <a class="accordion-toggle" href="/dashboard">
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
                <li>
                    <a href="{{route('upload-emp')}}">
                        <span class="glyphicon glyphicon-tags"></span> Upload </a>
                </li>
            </ul>
        </li>

        @if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager())
            <li>
                <a class="accordion-toggle" href="/dashboard">
                    <span class="fa fa-user"></span>
                    <span class="sidebar-title">Clients</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{route('add-client')}}">
                            <span class="glyphicon glyphicon-tags"></span> Add Client </a>
                    </li>

                    <li>
                        <a href="{{route('list-client')}}">
                            <span class="glyphicon glyphicon-tags"></span> List Client </a>
                    </li>
                </ul>
            </li>
        @endif

        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Projects</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-project')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add Project </a>
                </li>

                <li>
                    <a href="{{route('list-project')}}">
                        <span class="glyphicon glyphicon-tags"></span> List Project</a>
                </li>

                <li>
                    <a href="{{route('assign-project')}}">
                        <span class="glyphicon glyphicon-tags"></span> Assign Project</a>
                </li>

                <li>
                    <a href="{{route('project-assignment-listing')}}">
                        <span class="glyphicon glyphicon-tags"></span> Project Assignment Listing</a>
                </li>
            </ul>
        </li>

        {{-- <li>

            <a href="/bank-account-details">
                <span class="fa fa-bank"></span>
                <span class="sidebar-title">Bank Account</span>

            </a>
        </li> --}}

        {{-- <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-group"></span>
                <span class="sidebar-title">Teams</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-team')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Team </a>
                </li>
                <li>
                    <a href="{{route('team-listing')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Team Listings </a>
                </li>
            </ul>
        </li> --}}

        <li>
            <a class="accordion-toggle" href="/dashboard">
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
        <a class="accordion-toggle" href="/dashboard">
            <span class="fa fa-envelope"></span>
            <span class="sidebar-title">Leaves</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="{{route('apply-leave')}}">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Apply Leave </a>
            </li>
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
            @endif
            @if(Auth::user()->isHR() || Auth::user()->isCoordinator())
                <li>
                    <a href="{{route('total-leave-list')}}">
                        <span class="fa fa-clipboard"></span> Total Leave Listings </a>
                </li>
            @endif
        </ul>
    </li>

    @if(Auth::user()->isHR())
        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-arrow-circle-o-up"></span>
                <span class="sidebar-title">Promotions</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/promotion">
                        <span class="glyphicon glyphicon-book"></span> Promote </a>
                </li>
                <li>
                    <a href="/show-promotion">
                        <span class="glyphicon glyphicon-modal-window"></span> Promotion Listings </a>
                </li>
            </ul>
        </li>

        {{-- <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa fa-trophy"></span>
                <span class="sidebar-title">Awards</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/add-award">
                        <span class="fa fa-adn"></span> Add Award </a>
                </li>
                <li>
                    <a href="/award-listing">
                        <span class="glyphicon glyphicon-calendar"></span> Award Listings </a>
                </li>
                <li>
                    <a href="/assign-award">
                        <span class="fa fa-desktop"></span> Awardees </a>
                </li>
                <li>
                    <a href="/awardees-listing">
                        <span class="fa fa-clipboard"></span> Awardees Listings </a>
                </li>
            </ul>
        </li> --}}
    @endif


    {{-- <li>
        <a class="accordion-toggle" href="#">
            <span class="fa fa fa-gavel"></span>
            <span class="sidebar-title">Trainings</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            @if(\Auth::user()->notAnalyst())
                <li>
                    <a href="/add-training-program">
                        <span class="fa fa-adn"></span> Add Training Program </a>
                </li>
            @endif
            <li>
                <a href="/show-training-program">
                    <span class="glyphicon glyphicon-calendar"></span> Program Listings </a>
            </li>
            @if(\Auth::user()->notAnalyst())
                <li>
                    <a href="/add-training-invite">
                        <span class="fa fa-desktop"></span> Training Invite </a>
                </li>
            @endif
            <li>
                <a href="/show-training-invite">
                    <span class="fa fa-clipboard"></span> Invitation Listings </a>
            </li>
        </ul>
    </li> --}}


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
                        <span class="glyphicon glyphicon-book"></span> Upload Sheets</a>
                </li>
                <li>
                    <a href="{{route('attendance-manager')}}">
                        <span class="glyphicon glyphicon-book"></span> Attendance Lists</a>
                </li>

            </ul>
        </li>

    @endif

    <li>
        <a href="/hr-policy">
            <span class="fa fa-gavel"></span>
            <span class="sidebar-title"> Company Policy </span>
        </a>
    </li>
    <p> &nbsp; </p>
</ul>
<!-- -------------- /Sidebar Menu  -------------- -->