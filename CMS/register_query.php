<?php 
   require_once("includes/dbcon.php");
   require_once 'phpqrcode/qrlib.php';
   require_once 'vendor/autoload.php';

   $barcode = 'barcode/'.time().".png";
   $barimage = time().".png";
   $color = [255,0,0];
   
   $path = 'qrcode/';
   $qrcode = $path.time().".png";
   $qrimage = time().".png";

      if(isset($_POST["submit"]))
      {
         $fname = $_POST['fname'];
         $age = $_POST['age'];
         $nname = $_POST['nname'];
         $permail = $_POST['permail'];
         $foodres = $_POST['foodres'];
         $qrtext = $_REQUEST['idnum'];
         $bartext = $_REQUEST['idnum'];
         $position = $_POST['position'];
         $penro = $_POST['penro'];
         $mail = $_POST['mail'];
         $contact = $_POST['contact'];
         $gender = $_POST['gender'];
         $reg_date = date("Y-m-d");
         $img = $_FILES['img']['name'];
        
         //Duplicate Error Validation
         $validation = "SELECT * FROM `attendeesdets_tbl` WHERE FName='$fname'";
         $query = mysqli_query($conn,$validation);
         
         if(mysqli_num_rows($query) > 0){
            echo '<script>
               alert("Youre Already Registered");
               window.history.go(-1);
            </script>';
         }
         else{
            //Add Record to DB
            $query = "INSERT INTO `attendeesdets_tbl`(`FName`, `Gender`, `age`, `nickname`, `permail`, `foodres`, `ContactNum`, `Mail`, `PENRO`, `Position`, `img`, `reg_date`, `qrtext`, `qrimage`,`bartext`,`barimg`) VALUES ('$fname','$gender','$age','$nname','$permail','$foodres','$contact','$mail','$penro','$position','$img','$reg_date','$qrtext','$qrimage','$bartext','$barimage')";
         
	        // $query = "insert into attendeesdets_tbl(qrtext,qrimage) VALUES ('$qrtext','$qrimage')";
           //$query ="insert into attendeesdets_tbl set bartext='$bartext', barimg='$barimage',qrtext='$qrtext',qrimage='$qrimage'";
            $result = mysqli_query($conn,$query); 

            if($result){
              
               move_uploaded_file($_FILES["img"]["tmp_name"], "img/".$_FILES["img"]["name"]);
               
               echo '<script>
                  window.location.href="verification.php";
               </script>';
               include ("sendmail.php");
         
            }else{
               echo '<script>
                  window.history.go(-1);
               </script>';
            }
         } 
      }
    
      $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
      file_put_contents($bartext, $generator->getBarcode($bartext, $generator::TYPE_CODE_128, 3, 50));
      QRcode :: png($qrtext, $qrcode, 'H',4 , 4);
      
      //echo "<img src='".$barcode."'>";
?>