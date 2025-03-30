<?php 

$year = $_POST['year'] ?? null;
$month = $_POST['month'] ?? null;
$mail = $_SESSION['mail'];

if (isset($_POST['submit'])) {
    if ($year && !$month) {
        $filter = "SELECT * FROM schedule_list WHERE YEAR(dte) = '$year' AND status='0' AND UserMail='$mail'";
        renderTableBody($conn, $filter);
    }
    else if ($month && !$year) {
        $filter = "SELECT * FROM schedule_list WHERE MONTH(dte) = '$month' AND status='0' AND UserMail='$mail'";
        renderTableBody($conn, $filter);
    }
    else if ($month && $year) {
        $filter = "SELECT * FROM schedule_list WHERE MONTH(dte) = '$month' AND YEAR(dte) = '$year' AND status='0' AND UserMail='$mail'";
        renderTableBody($conn, $filter);
    } else {
        renderTableBody($conn, "SELECT * FROM schedule_list WHERE UserMail='$mail'");
    }
} else {
    renderTableBody($conn, "SELECT * FROM schedule_list WHERE UserMail='$mail'");
}

?>

<?php 
function renderTableBody($conn, $query) {
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
                <td>
                    <?php if ($row['status'] == 1): ?>
                        <p style="background-color:green; color:white; border-radius: 5px; padding: 2px;">Approved</p>
                    <?php else: ?>
                        <p style="background-color:red; color:white; border-radius: 5px; padding: 2px;">For Approval</p>
                    <?php endif; ?>
                </td>
                <td>
                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewModal<?= $row['id']; ?>" style="color: white;">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
                
            </tr>

            <!-- Include Modal Files -->
            <?php include 'customer_booking_modal.php'; ?>
            <?php
        }
    } 
}
?>
