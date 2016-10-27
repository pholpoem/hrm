<html>
    <head>
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/bootstrap.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/font-awesome.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/style.css') }}"/>

        <script type="text/javascript" src="{{ URL::asset('assets/js/jquery-3.1.0.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('assets/js/script.js') }}"></script>
    </head>
    <body>
        
        <div class="navbar navbar-inverse set-radius-zero">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">

                        <img src="../assets/img/logo.png">
                    </a>

                </div>

                <div class="left-div">
                    <div class="user-settings-wrapper">
                        <ul class="nav">

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                    <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                                </a>
                                <div class="dropdown-menu dropdown-settings">
                                    <div class="media">
                                        <a class="media-left" href="#">
                                            <img src="assets/img/64-64.jpg" alt="" class="img-rounded">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Jhon Deo Alex </h4>
                                            <h5>Developer &amp; Designer</h5>

                                        </div>
                                    </div>
                                    <hr>
                                    <h5><strong>Personal Bio : </strong></h5>
                                    Anim pariatur cliche reprehen derit.
                                    <hr>
                                    <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="login.html" class="btn btn-danger btn-sm">Logout</a>

                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- LOGO HEADER END -->

        <section class="menu-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-collapse collapse nopadding">
                            <ul id="menu-top" class="nav navbar-nav navbar-left nopadding">
                                <li>
                                    <a @if(Request::path() == '/') class="menu-top-active" @endif href="/">หน้าหลัก</a>
                                </li>
                                <li>
                                    <a @if(strpos(Request::path(),'personnel') !== false) class="menu-top-active" @endif href="/personnel">การจัดการพนักงาน</a>
                                </li>
                                <li>
                                    <a @if(strpos(Request::path(),'department_position') !== false) class="menu-top-active" @endif href="/department_position">แผนก/ตำแหน่ง</a>
                                </li>
                                <li>
                                    <a @if(strpos(Request::path(),'calendar') !== false) class="menu-top-active" @endif href="/calendar">วันหยุดประจำปี</a>
                                </li>
                                <li>
                                    <a @if(strpos(Request::path(),'vacation') !== false) class="menu-top-active" @endif href="/vacation">วันลา/หยุดพนักงาน</a>
                                </li>
                                <li>
                                    <a @if(strpos(Request::path(),'overtime') !== false) class="menu-top-active" @endif href="/overtime">การทำงานล่วงเวลา</a>
                                </li>
                                <li>
                                    <a @if(strpos(Request::path(),'admin') !== false) class="menu-top-active" @endif href="/admin">การจัดการผู้ดูแลระบบ</a>
                                </li>
                                <li>
                                    <a @if(strpos(Request::path(),'activity') !== false) class="menu-top-active" @endif href="/activity">ตารางงาน/กิจกรรม(admin)</a>
                                </li>
                                <li>
                                    <a @if(strpos(Request::path(),'messages') !== false) class="menu-top-active" @endif href="/messages">ส่งข้อความ</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- MENU SECTION END -->

        <div class="content-wrapper">
            <div class="container">
            @yield('content')
            </div>
        </div>
        <!-- CONTENT-WRAPPER SECTION END -->

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        © 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
                    </div>

                </div>
            </div>
        </footer>
        <!-- FOOTER SECTION END -->
    </body>
</html>