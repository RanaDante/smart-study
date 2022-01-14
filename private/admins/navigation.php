<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?php echo TITLE;?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
    <link rel="stylesheet" href="<?php echo PUBLICPATH?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo PUBLICPATH?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo PUBLICPATH?>assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="<?php echo PUBLICPATH?>assets/css/dashboardstyle.css">
    
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.html" class="logo">
                    <img src="<?php echo PUBLICPATH?>assets/images/logo.png" alt="Logo">
                </a>
                <a href="index.html" class="logo logo-small">
                    <img src="<?php echo PUBLICPATH?>assets/images/logo-small.png" alt="Logo" width="30" height="30">
                </a>
            </div>

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-align-left"></i>
            </a>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search" style="color:#3488BF;"></i></button>
                </form>
            </div>


            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>


            <ul class="nav user-menu">
                <li class="nav-item">
                    <a href="<?php echo PRIVATEPATH?>admins/admin_logout.php">Log Out</a>
                </li>
            </ul>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        <li >
                            <a href="<?php echo PRIVATEPATH;?>admins/admin-dashboard.php"><i class="fas fa-user-alt"></i> <span> Dashboard</span></a>
                        </li>
                        <li>
                            <a href="<?php echo PRIVATEPATH;?>admins/applications/applications.php"><i class="fas fa-file"></i></i> <span>Applications</span></a>
                        </li>
                        <li>
                            <a href="<?php echo PRIVATEPATH;?>admins/applications/pending-applications.php"><i class="fas fa-file"></i></i> <span>Pending Applications</span></a>
                        </li>
                        <li>
                        <a href="<?php echo PRIVATEPATH;?>admins/programs/programs.php"><i class="fas fa-book-open"></i> <span> Programs</span> </a>
                        </li>
                        <li>
                        <a href="<?php echo PRIVATEPATH;?>admins/programs/add-programs.php"><i class="fas fa-book-open"></i> <span>Add Programs</span> </a>
                        </li>
                        <li>
                        <a href="<?php echo PRIVATEPATH;?>admins/admins/admins.php"><i class="fas fa-user-alt"></i> <span>Admins</span> </a>
                        </li>
                        <li>
                        <a href="<?php echo PRIVATEPATH;?>admins/admins/add-admins.php"><i class="fas fa-user-plus"></i> <span>Add Admins</span> </a>
                        </li>
                        <li>
                        <a href="<?php echo PRIVATEPATH;?>admins/admins/admin-profile.php"><i class="fas fa-user-cog"></i> <span>Profile</span> </a>
                        </li>
                        <li class="submenu">
                            <!-- <ul> -->
                                <!-- <li><a href="<?php #echo PRIVATEPATH;?>admins/programs/add-programs.php">Add Programs</a></li> -->
                                <!-- <li><a href="expenses.html">Expenses</a></li>
                                <li><a href="salary.html">Salary</a></li>
                                <li><a href="add-fees-collection.html">Add Fees</a></li>
                                <li><a href="add-expenses.html">Add Expenses</a></li>
                                <li><a href="add-salary.html">Add Salary</a></li> -->
                            <!-- </ul> -->
                        </li>
                        <!-- <li>
                            <a href="holiday.html"><i class="fas fa-holly-berry"></i> <span>Holiday</span></a>
                        </li>
                        <li>
                            <a href="fees.html"><i class="fas fa-comment-dollar"></i> <span>Fees</span></a>
                        </li>
                        <li>
                            <a href="exam.html"><i class="fas fa-clipboard-list"></i> <span>Exam list</span></a>
                        </li>
                        <li>
                            <a href="event.html"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
                        </li>
                        <li>
                            <a href="time-table.html"><i class="fas fa-table"></i> <span>Time Table</span></a>
                        </li>
                        <li>
                            <a href="library.html"><i class="fas fa-book"></i> <span>Library</span></a>
                        </li>
                        <li class="menu-title">
                            <span>Pages</span>
                        </li> -->
                        <!-- <li class="submenu">
                            <a href="#"><i class="fas fa-shield-alt"></i> <span> Authentication </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="register.html">Register</a></li>
                                <li><a href="forgot-password.html">Forgot Password</a></li>
                                <li><a href="error-404.html">Error Page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="blank-page.html"><i class="fas fa-file"></i> <span>Blank Page</span></a>
                        </li>
                        <li class="menu-title">
                            <span>Others</span>
                        </li>
                        <li>
                            <a href="sports.html"><i class="fas fa-baseball-ball"></i> <span>Sports</span></a>
                        </li>
                        <li>
                            <a href="hostel.html"><i class="fas fa-hotel"></i> <span>Hostel</span></a>
                        </li>
                        <li>
                            <a href="transport.html"><i class="fas fa-bus"></i> <span>Transport</span></a>
                        </li>
                        <li class="menu-title">
                            <span>UI Interface</span>
                        </li>
                        <li>
                            <a href="components.html"><i class="fas fa-vector-square"></i> <span>Components</span></a>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-columns"></i> <span> Forms </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                                <li><a href="form-input-groups.html">Input Groups </a></li>
                                <li><a href="form-horizontal.html">Horizontal Form </a></li>
                                <li><a href="form-vertical.html"> Vertical Form </a></li>
                                <li><a href="form-mask.html"> Form Mask </a></li>
                                <li><a href="form-validation.html"> Form Validation </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fas fa-table"></i> <span> Tables </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="tables-basic.html">Basic Tables </a></li>
                                <li><a href="data-tables.html">Data Table </a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:void(0);"><i class="fas fa-code"></i> <span>Multi Level</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span>Level 1</span> <span
                                            class="menu-arrow"></span></a>
                                    <ul>
                                        <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                        <li class="submenu">
                                            <a href="javascript:void(0);"> <span> Level 2</span> <span
                                                    class="menu-arrow"></span></a>
                                            <ul>
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                                <li><a href="javascript:void(0);">Level 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"> <span>Level 1</span></a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
