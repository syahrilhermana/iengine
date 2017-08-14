<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url("assets/img/favicon.png") ?>" />
    <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon.png") ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $this->template->title->default("IENGINE"); ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <meta name="keywords" content="iengine, cms, framework, codeigniter, php">
    <meta name="description" content="iEngine is CMS base from codeigniter">

    <?php
        echo  css('bootstrap.min.css', 'all', 'css');
        echo  css('material-dashboard.css', 'all', 'css');
        echo  css('demo.css', 'all', 'css');
        echo  css('font-awesome.min.css', 'all', 'css');
    ?>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

    <?php
    echo  js('jquery-3.1.1.min.js', 'js');
    echo  js('jquery-ui.min.js', 'js');
    echo  js('bootstrap.min.js', 'js');
    echo  js('material.min.js', 'js');
    echo  js('perfect-scrollbar.jquery.min.js', 'js');
    echo  js('jquery.validate.min.js', 'js');
    echo  js('moment.min.js', 'js');
    echo  js('chartist.min.js', 'js');
    echo  js('jquery.bootstrap-wizard.js', 'js');
    echo  js('bootstrap-notify.js', 'js');
    echo  js('jquery.sharrre.js', 'js');
    echo  js('bootstrap-datetimepicker.js', 'js');
    echo  js('jquery-jvectormap.js', 'js');
    echo  js('nouislider.min.js', 'js');
    echo  js('jquery.select-bootstrap.js', 'js');
    echo  js('jquery.datatables.js', 'js');
    echo  js('sweetalert2.js', 'js');
    echo  js('jasny-bootstrap.min.js', 'js');
    echo  js('fullcalendar.min.js', 'js');
    echo  js('jquery.tagsinput.js', 'js');
    echo  js('material-dashboard.js', 'js');
    echo  js('demo.js', 'js');
    ?>
    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            demo.initDashboardPageCharts();
            demo.initVectorMap();
        });
    </script>
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-active-color="red" data-background-color="black" data-image="<?php echo base_url("assets/img/sidebar-1.jpg") ?>">

        <div class="logo">
            <a href="http://www.creative-tim.com/" class="simple-text">
                iEngine
            </a>
        </div>
        <div class="logo logo-mini">
            <a href="http://www.creative-tim.com/" class="simple-text">
                IE
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <?php echo img('favicon.png', 'img')?>
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        Blue Fire
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#">My Profile</a>
                            </li>
                            <li>
                                <a href="#">Edit Profile</a>
                            </li>
                            <li>
                                <a href="#">Settings</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="<?php echo selected("/dashboard") ?>">
                    <a href="<?php echo site_url("/dashboard") ?>">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <?php echo $this->template->widget("navigation"); ?>

                <li class="<?php echo selected("/privileges") ?>">
                    <a data-toggle="collapse" href="#privileges">
                        <i class="material-icons">pan_tool</i>
                        <p>Privileges
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="privileges">
                        <ul class="nav">
                            <li>
                                <a href="<?php echo site_url("/privileges/user") ?>">Management User</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url("/privileges/role") ?>">Management Role</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="<?php echo selected("/packages") ?>">
                    <a href="<?php echo site_url("/packages") ?>">
                        <i class="material-icons">extension</i>
                        <p>Packages</p>
                    </a>
                </li>
                <li class="<?php echo selected("/settings") ?>">
                    <a data-toggle="collapse" href="#setting">
                        <i class="material-icons">settings</i>
                        <p>Settings
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="setting">
                        <ul class="nav">
                            <li>
                                <a href="<?php echo site_url("/settings/app") ?>">Application Setting</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url("/settings/email") ?>">Email Setting</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> Dashboard </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">dashboard</i>
                                <p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">notifications</i>
                                <span class="notification">5</span>
                                <p class="hidden-lg hidden-md">
                                    Notifications
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Mike John responded to your email</a>
                                </li>
                                <li>
                                    <a href="#">You have 5 new tasks</a>
                                </li>
                                <li>
                                    <a href="#">You're now friend with Andrew</a>
                                </li>
                                <li>
                                    <a href="#">Another Notification</a>
                                </li>
                                <li>
                                    <a href="#">Another One</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                <p class="hidden-lg hidden-md">Profile</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg hidden-md"></li>
                    </ul>
                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group form-search is-empty">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="material-input"></span>
                        </div>
                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                            <i class="material-icons">search</i>
                            <div class="ripple-container"></div>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">

                <?php echo $this->template->content; ?>

            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-left">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    iEngine
                </p>
                <p class="copyright pull-right">
                    Page rendered in <strong>{elapsed_time}</strong> seconds.
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
</html>