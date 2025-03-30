<?php require_once('includes/dbcon.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>

    <script src="./fullcalendar/lib/main.min.js"></script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-md-2" id="page-container">
    <div class="row">
        <div class="col-md-12 mb-5">
           
            <div id="calendar" style="width: 100%; height: 80vh;"></div>
        </div>
    </div>
</div>


    <!-- Schedule Form Modal -->
    <div class="modal fade" id="schedule-modal" tabindex="-1" aria-labelledby="schedule-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="schedule-modal-label">Add Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="save_schedule.php" method="post" id="schedule-form">
                        <input type="hidden" name="id" value="">
                        <div class="form-group mb-2">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="description" class="control-label">Description</label>
                            <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="start_datetime" class="control-label">Start</label>
                            <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                        </div>
                        <!--<div class="form-group mb-2">
                            <label for="end_datetime" class="control-label">End</label>
                            <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                        </div>-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                    <button class="btn btn-secondary btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

<?php 

// Query to fetch schedules
$schedules = mysqli_query($conn, "SELECT * FROM `schedule_list` WHERE status='1'");
$sched_res = [];

// Loop through the results and process them
while ($row = mysqli_fetch_assoc($schedules)) {
    $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}

if (isset($conn)) {
    mysqli_close($conn);
}
?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>');
</script>

<script src="./js/script.js"></script>

</body>
</html>
