<?php
include "db.php";
?>
<html>
<head>
    <title>Matchmaking</title>
</head>
<body>

<h1>Matchmaking</h1>

<?php

$traineeId = 3232;

$query = "SELECT tags FROM trainee WHERE trainee_id = $traineeId";
$showQuery = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($showQuery)) {
    $traineeTags = $row['tags'];
} else {
    $traineeTags = "No tags found";
}
?>

<h2>Your Tags: <?php echo $traineeTags; ?></h2>

<!-- Add a form to initiate matchmaking -->
<form action="matchmaking_result.php" method="post">
    <input type="hidden" name="trainee_id" value="<?php echo $traineeId; ?>">
    <button type="submit">Find Trainer</button>
</form>
<p><a href="traineeMatch.php">Back to Trainee Dashboard</a></p>
</body>
</html>
