<?php 
$year = $_POST['year'] ?? null;
$month = $_POST['month'] ?? null;

if (isset($_POST['submit'])) {
    if ($year && !$month) {
        $filter = "SELECT * FROM schedule_list WHERE YEAR(dte) = '$year' AND status='0'";
        renderTableBody($conn, $filter);
    }
    else if($month && !$year) {
        $filter = "SELECT * FROM schedule_list WHERE MONTH(dte) = '$month' AND status='0'";
        renderTableBody($conn, $filter);
    }
    else if($month && $year) {
        $filter = "SELECT * FROM schedule_list WHERE MONTH(dte) = '$month' AND YEAR(dte) = '$year' AND status='0'";
        renderTableBody($conn, $filter);
    }else{
    	renderTableBody($conn);
    }
} else {
    renderTableBody($conn);
}
?>

<?php 
function renderTableBody($conn, $query = "SELECT * FROM schedule_list WHERE status='0'") {
    // Execute the provided query (either filtered or default)
    $result = mysqli_query($conn, $query);
    $count = 1;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= htmlspecialchars($row['RefNum']); ?></td>
                <td><?= htmlspecialchars($row['FName']); ?></td>
                <td><?= htmlspecialchars($row['title']); ?></td>
                <td><?= htmlspecialchars($row['description']); ?></td>
                <td><?= htmlspecialchars($row['graveNum']); ?></td>
                <td><?= htmlspecialchars($row['Lots']); ?></td>
                <td><?= htmlspecialchars($row['Size']); ?></td>
               
                <td><?= htmlspecialchars($row['start_datetime']); ?></td>
                <td><?= htmlspecialchars($row['dte']); ?></td>
            </tr>

            <!-- Include Modal Files -->
            <?php include 'resevation_modal.php'; ?>
            <?php
        }
    } 
}
?>
