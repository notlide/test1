<?php
include "db.php";

$trainerId = 1116;


$requestsQuery = "SELECT requests.*, trainee.trainee_fname, trainee.trainee_lname
                  FROM requests
                  INNER JOIN trainee ON requests.trainee_id = trainee.trainee_id
                  WHERE requests.trainer_id = '$trainerId' AND requests.status = 'pending'
                  ORDER BY requests.request_date DESC";

$requestsResult = mysqli_query($connection, $requestsQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Trainer Dashboard</title>
</head>
<body>

<h1>Trainer Dashboard</h1>

<?php
if (mysqli_num_rows($requestsResult) > 0) {
    echo "<h2>Pending Requests from Trainees:</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Trainee Name</th><th>Request Date</th><th>Action</th></tr>";

    while ($row = mysqli_fetch_assoc($requestsResult)) {
        echo "<tr>";
        echo "<td>" . $row['trainee_fname'] . " " . $row['trainee_lname'] . "</td>";
        echo "<td>" . $row['request_date'] . "</td>";
        echo "<td><a href='accept_request.php?request_id=" . $row['request_id'] . "'>Accept</a> | <a href='reject_request.php?request_id=" . $row['request_id'] . "'>Reject</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No pending requests from trainees found.</p>";
}
?>

<p><a href="logout.php">Logout</a></p>

</body>
</html>
