<div class="modal fade" id="viewModal<?=$row['id']?>" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Other Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form for editing the customer -->
                <form action="edit_customer_query.php" method="POST">

                    <input type="hidden" name="id" value="<?=$row['id']?>">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <label class="mb-1" for="inputUsername"><h3>REFERENCE NUMBER:  <a href="#" style="text-decoration: none;">#<?=htmlspecialchars($row['RefNum']); ?></a></h3></label>  
                    </div>
                     <div class="row gx-3 mb-3">
                        <!-- Form Group-->
                        <div class="col-md-6">
                            <label class="mb-1" for="inputFirstName"><b>Valid ID:</b></label>
                            <?php if (!empty($row['ValidId'])) { ?>
                                <a href="download.php?file=<?= urlencode($row['ValidId']); ?>"><?=htmlspecialchars($row['ValidId']); ?></a>
                            <?php } else { ?>
                                No Permit Available
                            <?php } ?>
                        </div>
                        <!-- Form Group-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName"><b>Burial Permit:</b></label>
                           <?php
                            if (!empty($row['BPermit'])) {
                                $file = 'uploads/' . $row['BPermit'];
                                if (file_exists($file)) {
                                    echo '<a href="download.php?file=' . urlencode($row['BPermit']) . '" target="_blank">' . htmlspecialchars($row['BPermit']) . '</a>';
                                } else {
                                    echo 'File not found';
                                }
                            } else {
                                echo 'No Permit Available';
                            }
                          ?>

                        </div>
                    </div>


                    <div class="row gx-3 mb-3">
                    <!-- Form Group-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName"><b>Re-Burial Permit:</b></label>
                            <?php if (!empty($row['RBPermit'])) { ?>
                                <a href="download.php?file=<?= urlencode($row['RBPermit']); ?>"><?=htmlspecialchars($row['RBPermit']); ?></a>
                            <?php } else { ?>
                                No Permit Available
                            <?php } ?>
                        </div>
                        <!-- Form Group-->
                        <div class="col-md-6">
                             <label class="small mb-1" for="inputLastName"><b>Death Certificate:</b>
                            <?php if (!empty($row['DoC'])) { ?>
                                <a href="download.php?file=<?= urlencode($row['DoC']); ?>"><?=htmlspecialchars($row['DoC']); ?></a>
                            <?php } else { ?>
                                No Permit Available
                            <?php } ?>

                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                           Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="approvedModal<?=$row['id']?>" tabindex="-1" aria-labelledby="approvedModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approvedModalLabel">Approve Reservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="approved_query.php" method="POST">
                    <input type="hidden" name="id" value="<?=$row['id'];?>">
                    <input type="hidden" name="status" value="<?=$row['status'];?>">

                    <?php 
                        if($row['status'] == '0') {
                            echo '<p>Are you sure you want to <b>APPROVE</b> reservation with Refrence Number of <b>#' . $row['RefNum'] . '</b></p>';
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
<!-- Filter Modal -->
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
                        <label class="small mb-1" for="ddlYears1">Select Year:</label>
                        <select id="ddlYears1" class="form-select" aria-label="Default select example" name="year">
                            <option value="" disabled selected>Please select option</option>
                            <optgroup label="Year"></optgroup>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">Confirm</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Report Filter Modal -->
<div class="modal fade" id="ReportfilterModal" tabindex="-1" aria-labelledby="ReportfilterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ReportfilterModalLabel">Filter Records</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="reservation-report.php" method="POST">
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
                        <label class="small mb-1" for="ddlYears2">Select Year:</label>
                        <select id="ddlYears2" class="form-select" aria-label="Default select example" name="year">
                            <option value="" disabled selected>Please select option</option>
                            <optgroup label="Year"></optgroup>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">Confirm</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.onload = function () {
        // Populate both year dropdowns when the page loads

        // Get the current year
        var currentYear = (new Date()).getFullYear();

        // Populate the first year dropdown (filterModal)
        var ddlYears1 = document.getElementById("ddlYears1");
        for (var i = currentYear; i >= 1950; i--) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            ddlYears1.appendChild(option);
        }

        // Populate the second year dropdown (ReportfilterModal)
        var ddlYears2 = document.getElementById("ddlYears2");
        for (var i = currentYear; i >= 1950; i--) {
            var option = document.createElement("OPTION");
            option.innerHTML = i;
            option.value = i;
            ddlYears2.appendChild(option);
        }
    };
</script>
