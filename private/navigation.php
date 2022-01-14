<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title><?php echo TITLE?></title>

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
                    <a href="logout.php">Log Out</a>
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
                            <a href="student-dashboard.php"><i class="fas fa-user-graduate"></i> <span> Dashboard</span></a>
                        </li>
                        <li>
                            <a href="application_form.php"><i class="fas fa-user-graduate"></i> <span> Apply Online</span></a>
                        </li>
                        <li>
                            <a href="student-profile.php"><i class="fas fa-user-graduate"></i> <span> Profile</span></a>
                        </li>
                        <li>
                            <a href="merit-list.php"><i class="fas fa-user-graduate"></i> <span> Merit List</span></a>
                        </li>
                        <li>
                            <a href="time-table.php"><i class="fas fa-calendar-alt"></i> <span> Time Table</span></a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
