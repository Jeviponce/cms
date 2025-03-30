<?php
        session_start();
        include('includes/header.php');
        include('includes/sidebar.php');
        include('includes/navbar.php');
        include('includes/dbcon.php');


        try{
                $id = $_SESSION['id'];
                $query = "SELECT * FROM user_tbl WHERE Id='$id'";
                $result = mysqli_query($conn,$query);
                $row = mysqli_fetch_array($result);
        }catch(Exception $e){
        echo $e;
      }
?>

<link rel="stylesheet" type="text/css" href="css/profile-style.css">
<link rel="stylesheet" href="css/style_tbl_bc.css">
<!-- Begin Page Content -->
    <div class="container-fluid">
        <h3 class="mt-4" style="text-transform:uppercase;">Your Profile</h3>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active" style="text-transform: uppercase;">You're Here&nbsp;| HOME/<span style="color:#004AD6">PROFILE</span></li>
            </ol>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            
        </div>
            <div class="row">
                <!--Profile Form-->
             
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <div class="card mb-4 mb-xl-0">

                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">
                        <form method="POST" action="profile_update_query.php" enctype="multipart/form-data" autocomplete="off">
                                    <!-- Profile picture image-->

                                    <?php 
                                        if($row['img']!='')
                                        {
                                            echo '<img src="img/'.$row['img'].'" alt="image" id="cimg" class="img-fluid img-thumbnail">';
                                        }else{
                                            echo '<img src="img/no-image-available.png" alt="image" id="cimg" class="img-fluid img-thumbnail">';
                                        }
                                    ?>
                                    
                                    <!-- Profile picture help block-->
                                    <div class="small font-italic text-muted mb-4 my-2">JPG or PNG no larger than 5 MB</div>
                                    <!-- Profile picture upload button-->
                                    <input type="file" id="image" class="form-control" name="img" placeholder="Select Image" autocomplete="off"  value="<?php echo $row['img'];?>" onchange="readURL(this);" >
                                    <input type="hidden" class="form-control" name="old_img" value="<?php echo $row['img']; ?>" placeholder="Select Image" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                        <!-- Form Group (username)-->
                                        <input type="hidden" name="id" value="<?php echo $row['Id'];?>">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputUsername">Full Name</label>
                                            <input class="form-control" id="inputUsername" name="fname" type="text" placeholder="Enter your username" value="<?php echo $row['FName'];?>">
                                        </div>
                                        <!-- Form Row-->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputFirstName">Email Address</label>
                                                <input class="form-control" id="inputFirstName" name="mail" type="text" placeholder="Enter your first name" value="<?php echo $row['Mail'];?>">
                                            </div>
                                            <!-- Form Group-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Contact Number</label>
                                                <input class="form-control" id="inputLastName" name="cnum" type="text" placeholder="Enter your last name" value="<?php echo $row['CNumber'];?>">
                                            </div>
                                            
                                        </div>
                                        <!-- Form Row        -->
                                        <div class="row gx-3 mb-3">
                                            <!-- Form Group-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Address</label>
                                                <input class="form-control" id="inputOrgName" name="address" type="text" placeholder="Enter your Address" value="<?php echo $row['Address'];?>">
                                            </div>
                                            <!-- Form Group-->
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLocation">User Type</label>
                                                <input class="form-control" id="inputLocation" type="text" readonly placeholder="Enter your location" value="<?php 
                                                        if($row['userlvl']==0){
                                                                echo 'Client';
                                                        }else if($row['userlvl']==1){
                                                                echo 'Administrator';
                                                        }

                                                        ?>">
                                            </div>

                                            
                                           
                                        </div>

                                        <!-- Save changes button-->
                                        <input class="btn btn-success float-right" type="submit" name="submit" value="Confirm Changes">

                                    </form>
                                </div>
                            </div>
                        </div>
                    
                <!--End Profile Form-->
        </div>
    </div>
</div>
<!-- End of Main Content -->

<?php
        include('includes/footer.php');
        include('includes/scripts.php');
?>

<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#cimg').attr('src', e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
<!--Sweetalert link and script-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.4/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.4/dist/sweetalert2.all.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!---->

<!--Notification-->
<?php 
if (isset($_SESSION['msg']) && $_SESSION['msg'] !='' && $_SESSION['icon'])
{
    ?>
    <script>
        swal({
            title: '<?php echo $_SESSION['msg']; ?>',
            text: '<?php echo $_SESSION['msg_txt'];?>',
            icon: '<?php echo $_SESSION['icon'];?>',
            confirmButtonText: 'Okay',
              customClass: {
            title: 'swal-title',  // Custom class for title
            content: 'swal-content'  // Custom class for content
        },
        html: true
        });
    </script>
    <?php 
      unset($_SESSION['msg']);
      unset($_SESSION['msg_txt']);
      unset($_SESSION['icon']);
}
?>