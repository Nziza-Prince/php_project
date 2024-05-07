<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['omrsuid']) == 0) {
    header('location:logout.php');
    exit;
} else {
    if (isset($_POST['submit'])) {
        $uid = $_SESSION['omrsuid'];
        $regnumber = mt_rand(100000000, 999999999);
        $dom = $_POST['dom'];
        $nofhusband = $_POST['nofhusband'];
        $hreligion = $_POST['hreligion'];
        $hdob = $_POST['hdob'];
        $hsbmarriage = $_POST['hsbmarriage'];
        $haddress = $_POST['haddress'];
        $hstate = $_POST['hstate'];
        $nofwife = $_POST['nofwife'];
        $wreligion = $_POST['wreligion'];
        $wdob = $_POST['wdob'];
        $wsbmarriage = $_POST['wsbmarriage'];
        $waddress = $_POST['waddress'];
        $wstate = $_POST['wstate'];
        $witnessnamef = $_POST['witnessnamef'];
        $waddressfirst = $_POST['witnessaddressfirst'];
        $witnessnames = $_POST['witnessnames'];
        $waddresssec = $_POST['witnessaddresssec'];
        $witnessnamet = $_POST['witnessnamet'];
        $waddressthird = $_POST['witnessaddressthird'];

        // Insert data into the database
        $sql = "INSERT INTO `tblregistration`(`RegistrationNumber`, `UserID`, `DateofMarriage`, `HusbandName`,`HusbandReligion`, `Husbanddob`, `HusbandSBM`, `HusbandAdd`, `HusbandState`, `WifeName`,`WifeReligion`, `Wifedob`, `WifeSBM`, `WifeAdd`, `WifeState`, `WitnessNamefirst`, `WitnessAddressFirst`, `WitnessNamesec`, `WitnessAddresssec`, `WitnessNamethird`, `WitnessAddressthird`) 
               VALUES (:regnumber, :uid, :dom, :nofhusband, :hreligion, :hdob, :hsbmarriage, :haddress, :hstate, :nofwife, :wreligion, :wdob, :wsbmarriage, :waddress, :wstate, :witnessnamef, :waddressfirst, :witnessnames, :waddresssec, :witnessnamet, :waddressthird)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':regnumber', $regnumber, PDO::PARAM_STR);
        $query->bindParam(':uid', $uid, PDO::PARAM_STR);
        $query->bindParam(':dom', $dom, PDO::PARAM_STR);
        $query->bindParam(':nofhusband', $nofhusband, PDO::PARAM_STR);
        $query->bindParam(':hreligion', $hreligion, PDO::PARAM_STR);
        $query->bindParam(':hdob', $hdob, PDO::PARAM_STR);
        $query->bindParam(':hsbmarriage', $hsbmarriage, PDO::PARAM_STR);
        $query->bindParam(':haddress', $haddress, PDO::PARAM_STR);
        $query->bindParam(':hstate', $hstate, PDO::PARAM_STR);
        $query->bindParam(':nofwife', $nofwife, PDO::PARAM_STR);
        $query->bindParam(':wreligion', $wreligion, PDO::PARAM_STR);
        $query->bindParam(':wdob', $wdob, PDO::PARAM_STR);
        $query->bindParam(':wsbmarriage', $wsbmarriage, PDO::PARAM_STR);
        $query->bindParam(':waddress', $waddress, PDO::PARAM_STR);
        $query->bindParam(':wstate', $wstate, PDO::PARAM_STR);
        $query->bindParam(':witnessnamef', $witnessnamef, PDO::PARAM_STR);
        $query->bindParam(':waddressfirst', $waddressfirst, PDO::PARAM_STR);
        $query->bindParam(':witnessnames', $witnessnames, PDO::PARAM_STR);
        $query->bindParam(':waddresssec', $waddresssec, PDO::PARAM_STR);
        $query->bindParam(':witnessnamet', $witnessnamet, PDO::PARAM_STR);
        $query->bindParam(':waddressthird', $waddressthird, PDO::PARAM_STR);

        if ($query->execute()) {
            $LastInsertId = $dbh->lastInsertId();
            if ($LastInsertId > 0) {
                echo "Registration form has been filled successfully.";
                header("location:dashboard.php");
                exit; // Add exit after header to prevent further execution
            } else {
                echo "Something Went Wrong. Please try again.";
            }
        } else {
            echo "An error occurred while processing the form. Please try again.";
        }
    } else {
        echo "Form submission failed. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="am-pagetitle">
      <h5 class="am-title">Registration Form</h5>

    </div><!-- am-pagetitle -->

    <div class="am-mainpanel">
      <div class="am-pagebody">

      

        <div class="row row-sm mg-t-20">
          <div class="col-xl-12">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
              <h3>Registration Form</h3>
               <form id="basic-form" method="post" enctype="multipart/form-data">
      
          

 <div class="row">
                <label class="col-sm-4 form-control-label">Date of Marriage: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <input type="text" class="form-control fc-datepicker" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" name="dom">
                </div>
              </div>


          <!-- wd-200 -->
              <h3  class="card-body-title" style="padding-top: 20px;color: red">1 Husband Details</h3>
              <hr />
              <div class="row">
                <label class="col-sm-4 form-control-label">Name of Husband: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="nofhusband" value="" class="form-control" required='true'>
                </div>
              </div>
          
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Religion: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="hreligion" value="" class="form-control" required='true'>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Date of Birth: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control fc-datepicker" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" id="hdob" name="hdob">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Marital Status Before Marriage: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select type="text" name="hsbmarriage" value="" class="form-control" required='true'>
                    <option value="">Select Status</option>
                    <option value="Bachelor">Bachelor</option>
                    <option value="Married">Married</option>
                    <option value="Divorsee">Divorsee</option>
                    <option value="Widower">Widower</option>
                  </select>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <textarea type="file" name="haddress" value="" required="true" class="form-control"></textarea>
                </div>
              </div>
             
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">State: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="hstate" value=""  class="form-control" required='true'>
                </div>
              </div>
             
               <h3  class="card-body-title" style="padding-top: 20px;color: red">2 Wife Details</h3>
              <hr />
               <div class="row">
                <label class="col-sm-4 form-control-label">Name of Wife: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="nofwife" value="" class="form-control" required='true'>
                </div>
              </div>
             
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Religion: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="wreligion" value="" class="form-control" required='true'>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Date of Birth: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                      <input type="text" class="form-control fc-datepicker" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" id="wdob" name="wdob">
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Marital Status Before Marriage: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <select type="text" name="wsbmarriage" value="" class="form-control" required='true'>
                    <option value="">Select Status</option>
                    <option value="Bachelor">Bachelor</option>
                    <option value="Married">Married</option>
                    <option value="Divorsee">Divorsee</option>
                    <option value="Widower">Widower</option>
                  </select>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <textarea type="text" name="waddress" value="" required="true" class="form-control"></textarea>
                </div>
              </div>
              
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">State: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="wstate" value=""  class="form-control" required='true'>
                </div>
              </div>
            
              </div>
              <h3  class="card-body-title" style="padding-top: 20px;color: red">3 Witness Details</h3>
              <hr />
               <div class="row">
                <label class="col-sm-4 form-control-label">Full Name of Witness: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="witnessnamef" value="" class="form-control" required='true'>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <textarea type="text" name="waddressfirst" value="" required="true" class="form-control"></textarea>
                </div>
              </div>
              <hr />
              <div class="row">
                <label class="col-sm-4 form-control-label">Full Name of Witness: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="witnessnames" value="" class="form-control" required='true'>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <textarea type="text" name="waddresssec" value="" required="true" class="form-control"></textarea>
                </div>
              </div>
              <hr />
              <div class="row">
                <label class="col-sm-4 form-control-label">Full Name of Witness: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" name="witnessnamet" value="" class="form-control" required='true'>
                </div>
              </div>
              <div class="row mg-t-20">
                <label class="col-sm-4 form-control-label">Address: <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                 <textarea type="text" name="waddressthird" value="" required="true" class="form-control"></textarea>
                </div>
              </div>
             <div class="form-layout-footer mg-t-30">
             <p style="text-align: center;"><button class="btn btn-info mg-r-5"  name="submit" id="submit">ADD</button></p>
                </form>
              </div><!-- form-layout-footer -->
            </div><!-- card -->
          </div><!-- col-6 -->
        
        </div><!-- row -->


      </div><!-- am-pagebody -->
     <?php include_once('includes/footer.php');?>
    </div><!-- am-mainpanel -->

    <script src="lib/jquery/jquery.js"></script>
   <script src="lib/jquery-ui/jquery-ui.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery-toggles/toggles.min.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>
        <script src="lib/spectrum/spectrum.js"></script>

    <script src="js/amanda.js"></script>
    <script>
      $(function(){
        'use strict';

        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
      })

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

$('#datepickerNoOfMonths').datepicker({
  showOtherMonths: true,
  selectOtherMonths: true,
  numberOfMonths: 2
})
$('.hdob').datepicker({
  multidate: true,
  format: 'yyyy-mm-dd'
});



    </script>
  
</body>
</html>
