<?php

  try{
        $id = $_SESSION['id'];
        $mail = $_SESSION['mail'];
        $query = "SELECT * FROM user_tbl WHERE Id='$id'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);
        }catch(Exception $e){
        echo $e;
      }

// Query to check for expired contracts
$expiredContractsQuery = "SELECT COUNT(*) as expired_count FROM schedule_list WHERE DATE_ADD(dte, INTERVAL 1 MINUTE) < NOW() AND mail = '$mail'";
$expiredContractsResult = mysqli_query($conn, $expiredContractsQuery);
$expiredContractsRow = mysqli_fetch_assoc($expiredContractsResult);
$expiredContractsCount = $expiredContractsRow['expired_count'] ?? 0;
?>




<style type="text/css">
    .custom-badge {
    width: 20px; /* Adjust size */
    height: 20px; /* Adjust size */
    border-radius: 50%; /* Make it circular */
    background-color: red; /* Ensure it is red */
    display: inline-block; /* Keep it inline */
    text-align: center; /* Align text in case you add content */
}

.custom-badge:empty {
    display: inline-block; /* Ensure it remains visible even if empty */
    background-color: red; /* Keep the red color for empty badge */
}

</style>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <div class="input-group-append">
                         <i class="fas fa-cross fa-lg"></i>
                    </div>
                    <h6>&nbsp;St. Joseph Catholic Cemetery</h6>
      
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                         <?php 
                            // Query to fetch data from the database
                            $select = "SELECT *, MONTH(DoCDte) as mnth, DAY(DoCDte) as dd, YEAR(DoCDte) as yr, DoCDte, description FROM schedule_list WHERE `mail`='$mail'";
                            $result = mysqli_query($conn, $select);

                            if (mysqli_num_rows($result) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result)) {

                                    $month = $row1['mnth'] ?? 'N/A';
                                    $dd = $row1['dd'] ?? 'N/A';
                                    $yr = $row1['yr'] ?? 'N/A';
                                    $DoCDte = $row1['DoCDte'] ?? '';
                                    $description = $row1['description'] ?? '';

                                    // Get the current date
                                    $currentMonth = date('m');  // Current month (numeric)
                                    $currentDay = date('d');    // Current day (numeric)
                                    $currentYear = date('Y');
                                    $anniv = $currentYear - $yr;
                                      $start_datetime = $row1['start_datetime'] ?? ''; 
                                  
            // Extract only the year from start_datetime
            $start_year = date('Y', strtotime($start_datetime)); 

            $start_time = strtotime($start_datetime); // Convert start_datetime to a timestamp
            $current_time = time(); // Get the current timestamp

            // Check if 2 minutes have passed since the start time
            if (($current_time - $start_time) >= 120) { // 120 seconds = 2 minutes
                echo '<span class="badge badge-danger badge-counter custom-badge" id="notificationBadge"></span>';
            }

                                    // Check if today is the anniversary (same month and day)
                                    if ($month == $currentMonth && $dd == $currentDay) {
                                        echo '
                               
                                          <span class="badge badge-danger badge-counter custom-badge" id="notificationBadge"></span>';
                                    }
                                }
                            }
                        ?>
                        
                        <?php if ($expiredContractsCount > 0): ?>
                            <span class="badge badge-danger badge-counter custom-badge" id="expiredBadge">
                                <?php echo $expiredContractsCount; ?>
                            </span>
                        <?php endif; ?>
                    </a>


                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                            Notifications
                        </h6>

                       <?php 
                        // Query to fetch data from the database
                        $select = "SELECT *, MONTH(DoCDte) as mnth, DAY(DoCDte) as dd, YEAR(DoCDte) as yr, DoCDte, description, bday FROM schedule_list WHERE `mail`='$mail'";
                        $result = mysqli_query($conn, $select);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row1 = mysqli_fetch_assoc($result)) 
                            {

                                    $month = $row1['mnth'] ?? 'N/A';
                                    $dd = $row1['dd'] ?? 'N/A';
                                    $yr = $row1['yr'] ?? 'N/A';
                                    $DoCDte = $row1['DoCDte'] ?? '';
                                    $description = $row1['description'] ?? '';
                                    $bday = $row1['bday'] ?? '';  // Birthday field
                                    $start_datetime = $row1['start_datetime'] ?? ''; 

                                    // Extract only the year from start_datetime
                                    $start_year = date('Y', strtotime($start_datetime)); 

                                    // Get the current date
                                    $currentMonth = date('m');  // Current month (numeric)
                                    $currentDay = date('d');    // Current day (numeric)
                                    $currentYear = date('Y');
                                    $anniv = $currentYear - $yr;
                                    
                                    // Check if today is the renewal date (2 minutes for testing)
                                    if (($current_time - $start_time) >= 120) { // 120 seconds = 2 minutes
                                        // Prepare the renewal notification message
                                        $renewalMessage = "$description's renewal is due. It's been 2 minutes since the start date.";

                                        // Display the renewal notification
                                        echo '<a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#notificationModal" data-message="' . htmlspecialchars($renewalMessage) . '">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-warning">
                                                        <i class="fas fa-refresh text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="small text-gray-500">Date Today: ' . date('F d, Y') . '</div>
                                                    <span class="font-weight-bold">' . htmlspecialchars($renewalMessage) . '</span>
                                                </div>
                                            </a>';
                                    }

                                    // Check if today is the anniversary (same month and day)
                                    if ($month == $currentMonth && $dd == $currentDay) {
                                        // Standard notification message for the anniversary
                                        $notificationMessage = "Today, $description's celebrating $anniv year(s) anniversary!";

                                        // Detailed message for the modal (death anniversary message)
                                        $deathAnniversaryMessage = "Death Anniversary Notification Reminder: Today marks the death anniversary of <strong>$description</strong>. May their soul rest in peace. Take a moment to offer a prayer or light a candle in their memory. 
                                        <i class='fas fa-praying-hands' style='color: #6c757d;'></i>";  // Added prayer icon

                                        // Display the notification as a clickable link
                                        echo '<a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#notificationModal" data-message="' . htmlspecialchars($deathAnniversaryMessage) . '">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-primary">
                                                        <i class="fas fa-file-alt text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="small text-gray-500">Date Today: ' . date('F d, Y') . '</div>
                                                    <span class="font-weight-bold">' . htmlspecialchars($notificationMessage) . '</span>
                                                </div>
                                            </a>';
                                    }

                                    // Check if today is the birthday (same month and day)
                                    if ($month == $currentMonth && $dd == $currentDay) {  // Assuming bday column is 1 if true
                                        // Birthday message for notification
                                        $birthdayMessage = "Today is $description's Birthday!";

                                        // Detailed birthday message for modal
                                        $birthdayDetailMessage = " Today is <strong>$description's</strong> birthday. Let us celebrate their life by cherishing the memories and offering a prayer in their honor.";



                                        // Display the birthday notification as a clickable link
                                        echo '<a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#notificationModal" data-message="' . htmlspecialchars($birthdayDetailMessage) . '">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-success">
                                                        <i class="fas fa-birthday-cake text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="small text-gray-500">Date Today: ' . date('F d, Y') . '</div>
                                                    <span class="font-weight-bold">' . htmlspecialchars($birthdayMessage) . '</span>
                                                </div>
                                            </a>';
                                    }
                                }
                            }
                        ?>

                        <?php if ($expiredContractsCount > 0): ?>
                            <a class="dropdown-item d-flex align-items-center" href="dashboard.php">
                                <div class="mr-3">
                                    <div class="icon-circle bg-danger">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">Date Today: <?php echo date('F d, Y'); ?></div>
                                    <span class="font-weight-bold">
                                        You have <?php echo $expiredContractsCount; ?> expired contract(s).
                                    </span>
                                </div>
                            </a>
                        <?php else: ?>
                            <a class="dropdown-item text-center small text-gray-500" href="#">No new notifications</a>
                        <?php endif; ?>

                    </div>
                </li>   

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['FName'];?></span>
                        

                        <?php 
                            if($row['img']=='')
                            {
                                 echo '<img class="img-profile rounded-circle"
                            src="img/profile_img.png">';
                                
                            }else{
                               echo '<img class="img-profile rounded-circle"
                            src="img/'. $row['img'].'?>">';
                            }
                        ?>
                        
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="profile.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            My Account
                        </a>


                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changePwd">
                            <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                            Change Password
                        </a>
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login-query/logout_query.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

      <!-- Deactivate Modal -->
<div class="modal fade" id="changePwd" tabindex="-1" aria-labelledby="changePwdLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changePwdLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="change_pwd_query.php" method="POST">
                   <div class="mb-3">
                        <input type="hidden" name="id" value="">
                        <label class="small mb-1" for="inputPassword">Enter New Password</label>
                        <input id="newPassword" class="form-control" name="password" type="password" placeholder="Enter your New Password" value="">
                    </div>

                    <div class="mb-3">
                        <input type="hidden" name="id" value="">
                        <label class="small mb-1" for="inputConfirmPassword">Confirm New Password</label>
                        <input id="confirmPassword" class="form-control" name="cpwd" type="password" placeholder="Confirm your New Password" value="">
                    </div>

                    <!-- Checkbox to toggle password visibility -->
                    <div class="mb-3">
                        <input type="checkbox" id="showPassword" onclick="togglePassword()"> Show Password
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                           Close
                        </button>
                        <button name="submit" type="submit" class="btn btn-success">
                           Confirm
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div class="modal fade" id="notificationModal" tabindex="-1" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Notification Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modal-message"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    // Listen for the click event on the notification links
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function() {
            // Get the message from the data-message attribute
            var message = this.getAttribute('data-message');
            
            // Set the modal's message and render it as HTML
            document.getElementById('modal-message').innerHTML = message;
        });
    });
</script>


<!-- JavaScript to toggle password visibility -->
<script>
    function togglePassword() {
        var newPassword = document.getElementById("newPassword");
        var confirmPassword = document.getElementById("confirmPassword");
        var showPasswordCheckbox = document.getElementById("showPassword");

        // Toggle password visibility based on checkbox
        if (showPasswordCheckbox.checked) {
            newPassword.type = "text";
            confirmPassword.type = "text";
        } else {
            newPassword.type = "password";
            confirmPassword.type = "password";
        }
    }
</script>