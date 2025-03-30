<?php 
include ("includes/dbcon.php");
include ("genidnum.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> DENR AMS | REGISTRATION</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style_registration.css">
  <link rel="shortcut icon" type="x-icon" href="logo/denr_logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
</head>

<body>

  <div class="container">
 
    
    <div class="title"><i class="fa-solid fa-file-pen fa-xs"></i> DENR AMS | REGISTRATION</div>
    <div class="content">
      <form action="registration_query.php" method="POST" id="form" enctype="multipart/form-data" autocomplete="off">
        <div class="user-details">
        
            <input type="text" class="form-control" id="idnum" name="idnum" placeholder="" readonly  value="<?php echo(rand(10,100000));?>" hidden>
         
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Last Name, First Name Initial" required>
          </div>

          <div class="input-box">
            <span class="details">Nickname</span>
            <input type="text" class="form-control" id="nname" name="nname" placeholder="Enter your nickname" required>
          </div>

          <div class="input-box">
          <span class="details">Age</span>
          <select class="form-select" name="age" required aria-label="Default select example">
                  <option selected disabled value="">Select Options</option>
                  <option>30 and Below</option>
                  <option>31-45</option>
                  <option>46-59</option>
                  <option>60 and Above</option>
          </select >
          </div>
          
          <div class="input-box">
            <span class="details">Position/Designation</span>
            <input type="text" class="form-control" id="position" name="position" placeholder="Enter your position"
              required>
          </div>

          <div class="input-box">
            <span class="details">Office/Division</span>
            <input type="text" class="form-control" id="penro" name="penro" placeholder="Enter your PENRO" required>
          </div>

          <div class="input-box">
            <span class="details">Official Email</span>
            <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter your Official Email" required>
          </div>

          <div class="input-box">
            <span class="details">Personal Email</span>
            <input type="email" class="form-control" id="permail" name="permail" placeholder="Enter your Personal Email" required>
          </div>

          <div class="input-box">
            <span class="details">Contact Number</span>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your contact number"
            required data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup" required>
          </div>

          <div class="input-box">

            <label for="">Image</label><span style="font-size:12px;"> &nbsp;(ID Picture with white background)</span>
            <input type="file" class="form-control" name="img" placeholder="Select Image" autocomplete="off">
          </div>

          <div class="input-box">
            <span class="details">Gender</span>
            <select class="form-select" name="gender" aria-label="Default select example">
                  <option selected disabled value="">Select Options</option>
                  <option>Male</option>
                  <option>Female</option>
                  <option>LGBTQIA++</option>
                  <option>Prefer Not to Say</option>
            </select >
          </div>

          <div class="input-box">
            <label for="">Food Restriction</label><span style="font-size:11px;"> &nbsp;(Enter N.A if not applicable)</span>
            <input type="text" class="form-control" id="foodres" name="foodres" placeholder="Enter food restriction">
          </div>

        </div>

        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
</body>
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</html>