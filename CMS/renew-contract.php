<?php
include('includes/dbcon.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['lvl']) || !isset($_SESSION['mail']) || $_SESSION['status'] !== 'valid') {
    header("Location: ../index.php");
    exit();
}

// Fetch contracts from the database
$query = "SELECT contract_id, client_name, due_date, renewal_status FROM contracts";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contracts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h3 class="mb-4">Contract Details</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Contract ID</th>
                    <th>Client Name</th>
                    <th>Expiration Date</th>
                    <th>Renewal Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $contractId = $row['contract_id'];
                    $clientName = $row['client_name'];
                    $dueDate = $row['due_date'];
                    $renewalStatus = $row['renewal_status'] ? 'Renewed' : 'Pending';

                    echo "
                    <tr>
                        <td>$contractId</td>
                        <td>$clientName</td>
                        <td>$dueDate</td>
                        <td>$renewalStatus</td>
                        <td>
                            <a href='#' class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#renewModal' data-id='$contractId' data-name='$clientName' data-date='$dueDate'>Renew</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Renewal Modal -->
<div class="modal fade" id="renewModal" tabindex="-1" aria-labelledby="renewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="renewModalLabel">Renew Contract</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Client Name:</strong> <span id="modalClientName"></span></p>
                <p><strong>Expiration Date:</strong> <span id="modalDueDate"></span></p>
                <p>To renew this contract, please follow these steps:</p>
                <ol>
                    <li>Review the contract details with the client.</li>
                    <li>Update the contract terms if necessary.</li>
                    <li>Confirm the renewal with the client.</li>
                    <li>Click the "Confirm Renewal" button below to finalize the process.</li>
                </ol>
            </div>
            <div class="modal-footer">
                <form action="process-renewal.php" method="POST">
                    <input type="hidden" name="contract_id" id="modalContractId">
                    <button type="submit" class="btn btn-success">Confirm Renewal</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Populate modal with contract details
    document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
        button.addEventListener('click', () => {
            const contractId = button.getAttribute('data-id');
            const clientName = button.getAttribute('data-name');
            const dueDate = button.getAttribute('data-date');

            document.getElementById('modalContractId').value = contractId;
            document.getElementById('modalClientName').textContent = clientName;
            document.getElementById('modalDueDate').textContent = dueDate;
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
