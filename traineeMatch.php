<?php include"db.php"?>
<html>
	<head>
		<title>Matching</title>
	</head>
	<body>
	
	
	<!-- Add a "Quick Match" button -->
	<button id="quickMatchButton">Start QuickMatch</button>

	<script>
    // JavaScript function to handle the "Quick Match" button click
    document.getElementById("quickMatchButton").addEventListener("click", function () {
        // You can add logic here to perform a quick match or redirect to the matchmaking page.
        // For example, you can redirect to a matchmaking.php page.
        window.location.href = "matchmaking.php";
    });
	</script>
	</body>
	
</html>





