<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
    <div class="mobile-sidebar-header d-md-none">
        <div class="header-logo">
            <a href="../admin/dashboard.php"><img src="img/logo1.png" alt="logo"></a>
        </div>
    </div>
    <div class="sidebar-menu-content" style="min-height: 93vh;">
        <ul class="nav nav-sidebar-menu sidebar-toggle-view">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link"><i class="flaticon-script"></i><span>Dashboard</span></a>
            </li>
            <?php if ($_SESSION['SESS_USER_TYPE'] == 'admin') { ?>
                <li class="nav-item sidebar-nav-item">
                    <a href="#" class="nav-link"><i class="flaticon-script"></i><span>Learners</span></a>
                    <ul class="nav sub-group-menu">
                        <li class="nav-item">
                            <a href="learners.php?filter=2" class="nav-link"><i class="fas fa-angle-right"></i>Pending Requests</a>
                        </li>
                        <li class="nav-item">
                            <a href="learners.php?filter=1" class="nav-link"><i class="fas fa-angle-right"></i>Active</a>
                        </li>
                        <li class="nav-item">
                            <a href="learners.php?filter=0" class="nav-link"><i class="fas fa-angle-right"></i>Blocked</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item sidebar-nav-item">
                    <a href="#" class="nav-link"><i class="flaticon-script"></i><span>Courses</span></a>
                    <ul class="nav sub-group-menu">
                        <li class="nav-item">
                            <a href="course-create.php" class="nav-link"><i class="fas fa-angle-right"></i>Create New</a>
                        </li>
                        <li class="nav-item">
                            <a href="courses.php?filter=1" class="nav-link"><i class="fas fa-angle-right"></i>Published</a>
                        </li>
                        <li class="nav-item">
                            <a href="courses.php?filter=0" class="nav-link"><i class="fas fa-angle-right"></i>Not Published</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item sidebar-nav-item">
                    <a href="#" class="nav-link"><i class="flaticon-script"></i><span>Faculties</span></a>
                    <ul class="nav sub-group-menu">
                        <li class="nav-item">
                            <a href="faculty-create.php" class="nav-link"><i class="fas fa-angle-right"></i>Add New</a>
                        </li>
                        <li class="nav-item">
                            <a href="faculties.php?filter=1" class="nav-link"><i class="fas fa-angle-right"></i>Active</a>
                        </li>
                        <li class="nav-item">
                            <a href="faculties.php?filter=0" class="nav-link"><i class="fas fa-angle-right"></i>Blocked</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="feedback.php" class="nav-link"><i class="flaticon-script"></i><span>Feedback</span></a>
                </li>
            <?php } elseif ($_SESSION['SESS_USER_TYPE'] == 'faculty') { ?>
                <li class="nav-item">
                    <a href="courses-assigned.php" class="nav-link"><i class="flaticon-script"></i><span>Assigned Courses</span></a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a href="password.php" class="nav-link"><i class="flaticon-script"></i><span>Password</span></a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link"><i class="flaticon-script"></i><span>Logout</span></a>
            </li>
        </ul>
    </div>
</div>