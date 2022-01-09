<style>

.navbar-fixed-top {
    background: white !important;
    box-shadow: 0 1px 4px 0 rgb(0 21 41 / 8%) !important;
    color: #636b6f;
    font-weight: 500;
    font-size: 14px;
}

</style>

<header class="navbar navbar-fixed-top" style="display: flex; justify-content: space-between; height: 50px">
    <div class="navbar-logo-wrapper dark" style="width: 105px; height: 50px">
        <a class="navbar-logo-text" href="welcome">
            <b> HRMS</b>
        </a>

        <span id="sidebar_left_toggle" class="ad ad-lines"></span>
    </div>
    <ul class="nav sidebar-menu scrollable">
        <li class="active">
            <a  href="{{route('dashboard')}}">
                <span class="sidebar-title">Dashboard</span>
            </a>
        </li>
        @if(Auth::user()->isHR())
            <li>
                <a class="accordion-toggle" href="/dashboard">
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
    
            <li>
                <a class="accordion-toggle" href="/dashboard">
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

        @if(!Auth::user()->isHR())
        <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="sidebar-title">Projects</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('list-project')}}">
                        <span class="glyphicon glyphicon-tags"></span> List Project</a>
                </li>

                <li>
                    <a href="{{route('project-assignment-listing')}}">
                        <span class="glyphicon glyphicon-tags"></span> Project Assignment Listing</a>
                </li>
            </ul>
        </li>
        @endif

        {{-- <li>
            <a class="accordion-toggle" href="/dashboard">
                <span class="fa fa-envelope"></span>
                <span class="sidebar-title">Holiday</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/holiday-listing">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Holiday Listing </a>
                </li>
                <li>
                    <a href="/add-holidays">
                        <span class="glyphicon glyphicon-calendar"></span> Add Holiday </a>
                </li>
            </ul>
        </li> --}}
    
        @if(Auth::user()->isHR())
            <li>
                <a class="accordion-toggle" href="/dashboard">
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
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown dropdown-fuse">
            <div class="navbar-btn btn-group">
        <li class="dropdown dropdown-fuse">
            <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown" style="margin-left: 0; width: 200px">
                <span class="hidden-xs"><name>{{\Auth::user()->name}}</name> </span>
                <span class="fa fa-caret-down hidden-xs mr15"></span>
            </a>
            </a>
                <ul class="dropdown-menu list-group keep-dropdown w250" role="menu">
                    {{-- @if(\Route::getFacadeRoot()->current()->uri() != 'change-password')
                    <li class="dropdown-footer text-center">
                        <a href="/change-password" class="btn btn-primary btn-sm btn-bordered">
                            <span class="fa fa-lock pr5"></span> Change Password </a>
                    </li>
                    @endif --}}
                    <li class="dropdown-footer text-center">
                        <a href="/logout" class="btn btn-primary btn-sm btn-bordered">
                            <span class="fa fa-power-off pr5"></span> Logout </a>
                    </li>
                </ul>
        </li>
    </ul>
</header>