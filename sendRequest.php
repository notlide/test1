<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["trainer_id"])) {
        $trainerId = $_POST["trainer_id"];
             
        $traineeIdQuery = "SELECT trainee_id FROM trainee LIMIT 1"; 
        $traineeIdResult = mysqli_query($connection, $traineeIdQuery);

        if ($traineeIdResult && mysqli_num_rows($traineeIdResult) > 0) {
            $traineeRow = mysqli_fetch_assoc($traineeIdResult);
            $traineeId = $traineeRow["trainee_id"];

            $requestDate = date("Y-m-d H:i:s"); 
            $insertQuery = "INSERT INTO requests (trainee_id, trainer_id, request_date) VALUES ('$traineeId', '$trainerId', '$requestDate')";
            
            if (mysqli_query($connection, $insertQuery)) {
                echo "Request sent successfully.";
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        } else {
            echo "Trainee ID not found in the database.";
        }
    } else {
        echo "Trainer ID not provided.";
    }
} else {
    echo "Invalid request.";
}
?>