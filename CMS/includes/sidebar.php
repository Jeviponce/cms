<?php 
    include 'dbcon.php';

   $userlvl = $_SESSION['lvl'];

   $mail = $_SESSION['mail'];
?>
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Sidebar -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <i class="fas fa-solid fa-user-tie"></i>
                <div class="sidebar-brand-text mx-3">RDPS <sup>Dashboard</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-home fa0"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->

            <hr class="sidebar-divider">

            <!-- Heading -->
          

            <?php 
                
                if($userlvl==1){
                    echo '
                    <div class="sidebar-heading">
                        DASHBOARD
                    </div>


                    <li class="nav-item">
                        <a class="nav-link" href="manage-user.php">
                            <i class="fas fa-fw fa-user fa0"></i>
                            <span>Manage Account</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="customer.php">
                            <i class="fas fa-fw fa-user fa0"></i>
                            <span>Manage Customer</span>
                        </a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="manage-bookings.php">
                            <i class="fas fa-fw fa-clipboard fa0"></i>
                            <span>Manage Reservation</span>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="calendar.php">
                            <i class="fas fa-fw fa-calendar fa0"></i>
                            <span>Calendar Schedule</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">
                            <i class="fas fa-fw fa-image fa0"></i>
                            <span>Manage Gallery</span>
                        </a>
                    </li>


                    

                    <li class="nav-item">
                        <a class="nav-link" href="booking.php">
                            <i class="fa-solid fa-file-pen"></i>
                            <span>Reseve Grave Slot</span>
                        </a>
                    </li>


                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        OTHERS
                    </div>

                    <li class="nav-item">
                            <a class="nav-link" href="qrscan.php">
                                <i class="fa-solid fa-qrcode"></i>
                                <span>QR Code Scanner</span>
                            </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="cemetery-map.php">
                            <i class="fa-solid fa-route"></i>
                            <span>Cemetery Map</span>
                        </a>
                    </li>';

                }else if($userlvl==0){
                    echo '
                        <div class="sidebar-heading">
                            DASHBOARD
                        </div>

                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                                <i class="fas fa-fw fa-user fa0"></i>
                                <span>Profile</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="booking.php">
                                <i class="fas fa-fw fa-clipboard fa0"></i>
                                <span>Reservation</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="customer-gallery.php?id='.$mail.'">
                                <i class="fas fa-fw fa-image fa0"></i>
                                <span>Gallery</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cemetery-map.php">
                                <i class="fas fa-fw fa-image fa0"></i>
                                <span>Cemetery Map</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="qrscan.php">
                                <i class="fa-solid fa-qrcode"></i>
                                <span>QR Code Scanner</span>
                            </a>
                        </li>

                    ';
                }
            ?>
       
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

<!-- Modal -->
<!--Filter Modal-->
