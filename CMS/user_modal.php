<div class="modal fade" id="editModal<?=$row['Id']?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for editing the customer -->
                <form action="edit_customer_query.php" method="POST">

                    <input type="hidden" name="id" value="<?=$row['Id']?>">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?php echo $row['Id'];?>">
                        <label class="small mb-1" for="inputUsername">Full Name</label>
                        <input class="form-control" name="fname" type="text" placeholder="Enter your Full Name" value="<?php echo $row['FName'];?>">
                    </div>
                     <div class="row gx-3 mb-3">
                        <!-- Form Group-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">Email Address</label>
                            <input class="form-control" name="mail" type="text" placeholder="Enter your E-Mail" value="<?php echo $row['Mail'];?>">
                        </div>
                        <!-- Form Group-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Contact Number</label>
                            <input class="form-control" name="cnum" type="text" placeholder="Enter your Contact Number" value="<?php echo $row['CNumber'];?>">
                        </div>
                    </div>


                    <div class="row gx-3 mb-3">
                    <!-- Form Group-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputOrgName">Address</label>
                            <input class="form-control" name="address" type="text" placeholder="Enter your Address" value="<?php echo $row['Address'];?>">
                        </div>
                        <!-- Form Group-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLocation">Date Registered</label>
                            <input class="form-control" type="text" placeholder="" value="<?php echo $row['dte'];?>" readonly>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                           Close
                        </button>
                        <button name="submit" type="submit" class="btn btn-success">
                            Save Channges
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Deactivate Modal -->
<div class="modal fade" id="deactivateModal<?=$row['Id']?>" tabindex="-1" aria-labelledby="deactivateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deactivateModalLabel">Deactivate Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="deactivate_query.php" method="POST">
                    <input type="hidden" name="id" value="<?=$row['Id'];?>">
                    <input type="hidden" name="status" value="<?=$row['status'];?>">

                    <?php 
                        if($row['status'] == '1') {
                            echo '<p>Are you sure you want to <b>DEACTIVATE</b> the account of <b>' . $row['FName'] . '</b></p>';
                        } else {
                            echo '<p>Are you sure you want to <b>ACTIVATE</b> the account of <b>' . $row['FName'] . '</b></p>';
                        }
                    ?>
                    <div class="modal-footer">
                         <button name="submit" type="submit" class="btn btn-warning">
                           Confirm
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Filter Modal-->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterModalLabel">Filter Records</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    
                    <div class="col-md-12 mb-4">
                        <label class="small mb-1" for="month">Select Month: </label>
                        <select id="month" class="form-select" aria-label="Default select example" name="month">
                            <option value="" disabled selected>Please select option</option>
                                <optgroup label="Month">
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </optgroup>
                        </select>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label class="small mb-1" for="ddlYears">Select Year:</label>
                        <select id="ddlYears" class="form-select" aria-label="Default select example" name="year">
                            <option value="" disabled selected>Please select option</option>
                            <optgroup label="Year"></optgroup>
                        </select>
                    </div>


                    <div class="modal-footer">
                         <button name="submit" type="submit" class="btn btn-primary">
                           Confirm
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.onload = function () {
        // Reference the DropDownList.
        var ddlYears = document.getElementById("ddlYears");
 
        // Determine the Current Year.
        var currentYear = (new Date()).getFullYear();
 
        // Loop and add the Year values to DropDownList in descending order.
        for (var i = currentYear; i >= 1950; i--) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            ddlYears.appendChild(option);
        }
    };
</script>