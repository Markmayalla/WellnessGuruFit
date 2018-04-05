<header class="header">
<a href="index.html" class="logo">
    <!-- Add the class icon to your logo image or logo icon to add the margining -->
    Wellness Guru Fit
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>
<div class="navbar-right">
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-envelope"></i>
        <span class="label label-success"></span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have X messages</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul><li>Preserved for Msg Notificatoins</li></ul>
        </li>
        <li class="footer"><a href="#">See All Messages</a></li>
    </ul>
</li>
<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-warning"></i>
        <span class="label label-warning"></span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have X notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul><li>Preserved for other notifications</li></ul>
        </li>
        <li class="footer"><a href="#">View all</a></li>
    </ul>
</li>
<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-tasks"></i>
        <span class="label label-danger"></span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have X updates</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul><li>Preserved for Updates</li></ul>
        </li>
        <li class="footer">
            <a href="#">View all tasks</a>
        </li>
    </ul>
</li>
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-user"></i>
        <span><?PHP echo $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?> <i class="caret"></i></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header bg-light-blue">
            <img src="<?PHP
            if ($this->session->userdata('avatar') == '') {
                if ($this->session->userdata('gender') == 'male') {
                    echo base_url() . 'AdminLTE/img/avatar5.png';
                } else {
                    echo base_url() . 'AdminLTE/img/avatar3.png';
                }
            } else {
                echo $this->session->userdata('avatar');
            }
            ?>" class="img-circle" alt="User Image" />
            <p>
                <?PHP echo $this->session->userdata('first_name') . ' ' . $this->session->userdata('last_name'); ?> - PESDES Member

            </p>
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="<?PHP echo base_url(); ?>index.php/system/profile" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="<?PHP echo base_url(); ?>index.php/web/logout" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
</ul>
</div>
</nav>
</header>


<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?PHP
                    if ($this->session->userdata('avatar') == '') {
                        if ($this->session->userdata('gender') == 'male') {
                            echo base_url() . 'AdminLTE/img/avatar5.png';
                        } else {
                            echo base_url() . 'AdminLTE/img/avatar3.png';
                        }
                    } else {
                        echo $this->session->userdata('avatar');
                    }
                    ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>Hello, <?PHP echo $this->session->userdata('first_name'); ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <?PHP if ($this->session->userdata("user_type") == "user") { ?>
                <li class="active">
                    <a href="<?PHP echo base_url(); ?>index.php/cms/dashboard">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?PHP echo base_url(); ?>index.php/cms/trainers">
                        <i class="fa fa-user-md"></i>
                        <span>Trainers</span>
                    </a>

                </li>

                <li>
                    <a href="<?PHP echo base_url(); ?>index.php/cms/exercise_plans">
                        <i class="fa fa-gears"></i>
                        <span>Exersise Plans</span>
                    </a>
                </li>

                <li>
                    <a href="<?PHP echo base_url(); ?>index.php/cms/diet_plans">
                        <i class="fa fa-apple"></i>
                        <span>Diet Plans</span>
                    </a>
                </li>

                <li>
                    <a href="<?PHP echo base_url(); ?>index.php/cms/gym">
                        <i class="fa fa-location-arrow"></i>
                        <span>Find a GYM</span>
                    </a>
                </li>

                <li>
                    <a href="<?PHP echo base_url(); ?>index.php/cms/progress_report">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>Progress Report</span>
                    </a>
                </li>

                <li>
                    <a href="<?PHP echo base_url(); ?>index.php/cms/review">
                        <i class="fa fa-comments"></i>
                        <span>Rating & Review</span>
                    </a>
                </li>

                <?PHP
                }

                if ($this->session->userdata('user_type') == 'trainer') {

                ?>

                <li class="active">
                    <a href="<?PHP echo base_url(); ?>index.php/tms/dashboard">
                        <i class="fa fa-dashboard"></i> <span>Trainer Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?PHP echo base_url(); ?>index.php/tms/skills">
                        <i class="fa fa-comments"></i>
                        <span>Skills</span>
                    </a>
                </li>

                <li>
                    <a href="<?PHP echo base_url(); ?>index.php/tms/Activities">
                        <i class="fa fa-comments"></i>
                        <!-- Include scheduals, timetable etc -->
                        <span>Activities & Tasks</span>
                    </a>
                </li>





                <?PHP

                }
                if ($this->session->userdata('user_type') == 'admin') {

                    ?>

                    <li class="<?PHP echo (isset($menu_active) && $menu_active == 'dashboard' ? 'active' : ''); ?>">
                        <a href="<?PHP echo base_url(); ?>index.php/root/dashboard">
                            <i class="fa fa-dashboard"></i> <span>Admin Dashboard</span>
                        </a>
                    </li>

                    <li class="<?PHP echo (isset($menu_active) && $menu_active == 'fitness' ? 'active' : ''); ?>">
                        <a href="<?PHP echo base_url(); ?>index.php/root/fitness/exercises">
                            <i class="fa fa-comments"></i>
                            <!-- Include scheduals, timetable etc -->
                            <span>Fitness</span>
                        </a>
                    </li>

                    <li class="<?PHP echo (isset($menu_active) && $menu_active == 'diet' ? 'active' : ''); ?>">
                        <a href="<?PHP echo base_url(); ?>index.php/root/diet/meals_components">
                            <i class="fa fa-comments"></i>
                            <!-- Include scheduals, timetable etc -->
                            <span>Diet</span>
                        </a>
                    </li>


                <?PHP

                }
                if ($this->session->userdata('user_type') == 'gym') {

                    ?>

                    <li class="<?PHP echo (isset($menu_active) && $menu_active == 'dashboard' ? 'active' : ''); ?>">
                        <a href="<?PHP echo base_url(); ?>index.php/gym/dashboard">
                            <i class="fa fa-dashboard"></i> <span>GYM Dashboard</span>
                        </a>
                    </li>

                    <?PHP if (isset($gym) && count($gym) > 0) { ?>
                        <li class="<?PHP echo (isset($menu_active) && $menu_active == 'view_gym' ? 'active' : ''); ?>">
                            <a href="<?PHP echo base_url(); ?>index.php/gym/view_gym/<?PHP echo $gym->id; ?>">
                                <i class="fa fa-flash"></i> <span><?PHP echo strtoupper($gym->name); ?></span>
                            </a>
                        </li>
                        <li class="<?PHP echo (isset($menu_active) && $menu_active == 'about_gym' ? 'active' : ''); ?>">
                            <a href="<?PHP echo base_url(); ?>index.php/gym/about_gym/<?PHP echo $gym->id; ?>">
                                <i class="fa fa-question"></i> <span>About GYM</span>
                            </a>
                        </li>
                        <li class="<?PHP echo (isset($menu_active) && $menu_active == 'gym_photos' ? 'active' : ''); ?>">
                            <a href="<?PHP echo base_url(); ?>index.php/gym/gym_photos/<?PHP echo $gym->id; ?>">
                                <i class="fa fa-picture-o"></i> <span>Manage Photos</span>
                            </a>
                        </li>
                        <li class="<?PHP echo (isset($menu_active) && $menu_active == 'gym_address' ? 'active' : ''); ?>">
                            <a href="<?PHP echo base_url(); ?>index.php/gym/gym_address/<?PHP echo $gym->id; ?>">
                                <i class="fa fa-map-marker"></i> <span>Manage Address</span>
                            </a>

                        </li>

                        <li class="<?PHP echo (isset($menu_active) && $menu_active == 'gym_classes' ? 'active' : ''); ?>">
                            <a href="<?PHP echo base_url(); ?>index.php/gym/gym_classes/<?PHP echo $gym->id; ?>">
                                <i class="fa fa-calendar-o"></i> <span>Manage Classes</span>
                            </a>
                        </li>
                        
                        <li class="<?PHP echo (isset($menu_active) && $menu_active == 'gym_rates' ? 'active' : ''); ?>">
                            <a href="<?PHP echo base_url(); ?>index.php/gym/gym_rates/<?PHP echo $gym->id; ?>">
                                <i class="fa fa-money"></i> <span>Manage Rates</span>
                            </a>
                            
                        </li>
                    
                        <li class="<?PHP echo (isset($menu_active) && $menu_active == 'gym_working_hours' ? 'active' : ''); ?>">
                            <a href="<?PHP echo base_url(); ?>index.php/gym/gym_working_hours/<?PHP echo $gym->id; ?>">
                                <i class="fa fa-clock-o"></i> <span>Set Working Hours</span>
                            </a>
                        </li>
                        <li class="<?PHP echo (isset($menu_active) && $menu_active == 'gym_facilities' ? 'active' : ''); ?>">
                            <a href="<?PHP echo base_url(); ?>index.php/gym/gym_facilities/<?PHP echo $gym->id; ?>">
                                <i class="fa fa-tasks"></i> <span>Manage Facilities</span>
                            </a>
                        </li>
                        <li class="<?PHP echo (isset($menu_active) && $menu_active == 'gym_equipments' ? 'active' : ''); ?>">
                            <a href="<?PHP echo base_url(); ?>index.php/gym/gym_equipments/<?PHP echo $gym->id; ?>">
                                <i class="fa fa-chain"></i> <span>Manage Equipments</span>
                            </a>
                        </li>
                    <?PHP } ?>

                <?PHP

                }

                ?>





            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?PHP echo sentence_case($this->uri->segment(2)); ?>
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?PHP $uriElement1 = $this->uri->segment(2); echo $uriElement1; ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

