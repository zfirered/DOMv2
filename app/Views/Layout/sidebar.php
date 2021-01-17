<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url() ?>/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">DOM Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link <?php if ($title == 'Dashboard') {
                                                    print 'active';
                                                } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/employe" class="nav-link <?php if ($title == 'Home | Data Employe') {
                                                            print 'active';
                                                        } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Employe</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/users" class="nav-link <?php if ($title == 'Home | Data Users') {
                                                            print 'active';
                                                        } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dataAttendance" class="nav-link <?php if ($title == 'Home | Data Attendance') {
                                                                    print 'active';
                                                                } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Attendance</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/time" class="nav-link <?php if ($title == 'Home | Master Time') {
                                                        print 'active';
                                                    } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Master Time</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/divisi" class="nav-link <?php if ($title == 'Home | Master Divisi') {
                                                            print 'active';
                                                        } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Master Divisi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/position" class="nav-link <?php if ($title == 'Home | Master Position') {
                                                            print 'active';
                                                        } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Master Position</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/employestatus" class="nav-link <?php if ($title == 'Home | Master Employe Status') {
                                                                    print 'active';
                                                                } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Master Employe Status</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/bankaccount" class="nav-link <?php if ($title == 'Home | Master Bank Account') {
                                                                print 'active';
                                                            } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Master Bank Account</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kalender" class="nav-link <?php if ($title == 'Home | Kalender') {
                                                            print 'active';
                                                        } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kalender</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if ($title == 'Home | About Us') {
                                                    print 'active';
                                                } ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>About Us</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

             <li class="nav-header">MENU</li>
                <li class="nav-item">
                    <a href="/login/logout" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>LOGOUT</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>