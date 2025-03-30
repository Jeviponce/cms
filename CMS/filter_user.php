<?php 
$year = $_POST['year'] ?? null;
$month = $_POST['month'] ?? null;

if (isset($_POST['submit'])) {
    if ($year && !$month) {
        $filter = "SELECT * FROM user_tbl WHERE YEAR(dte) = '$year' AND userlvl='1'";
        renderTableBody($conn, $filter);
    }
    else if($month && !$year) {
        $filter = "SELECT * FROM user_tbl WHERE MONTH(dte) = '$month' AND userlvl='1'";
        renderTableBody($conn, $filter);
    }
    else if($month && $year) {
        $filter = "SELECT * FROM user_tbl WHERE MONTH(dte) = '$month' AND YEAR(dte) = '$year' AND userlvl='1'";
        renderTableBody($conn, $filter);
    }else{
    	renderTableBody($conn);
    }
} else {
    renderTableBody($conn);
}
?>

<?php 
function renderTableBody($conn, $query = "SELECT * FROM user_tbl WHERE userlvl='1'") {
    // Execute the provided query (either filtered or default)
    $result = mysqli_query($conn, $query);
    $count = 1;

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><?= htmlspecialchars($row['FName']); ?></td>
                <td><?= htmlspecialchars($row['Mail']); ?></td>
                <td><?= htmlspecialchars($row['CNumber']); ?></td>
                <td><?= htmlspecialchars($row['Address']); ?></td>
                <td><?= htmlspecialchars($row['dte']); ?></td>
                <td>
                    <?php if ($row['status'] == 1): ?>
                        <p style="background-color:green; color:white; border-radius: 5px; padding: 2px;">Active</p>
                    <?php else: ?>
                        <p style="background-color:red; color:white; border-radius: 5px; padding: 2px;">Deactivated</p>
                    <?php endif; ?>
                </td>
                <td>
                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['Id']; ?>">
                        <i class="fas fa-fw fa-pen"></i>
                    </a>
                </td>
                <td>
                    <?php if ($row['status'] == 1): ?>
                        <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deactivateModal<?= $row['Id']; ?>">
                            <i class="fas fa-fw fa-user-xmark"></i>
                        </a>
                    <?php else: ?>
                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#deactivateModal<?= $row['Id']; ?>">
                            <i class="fas fa-fw fa-user-check"></i>
                        </a>
                    <?php endif; ?>
                </td>
            </tr>

            <!-- Include Modal Files -->
            <?php include 'user_modal.php'; ?>
            <?php
        }
    }
}
?>
