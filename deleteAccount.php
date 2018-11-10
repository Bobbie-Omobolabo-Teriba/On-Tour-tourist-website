<?php
require_once ("Database.php");
//include("Database.php");
 
$account_id = filter_input(INPUT_POST, "account_id");

$query = "DELETE FROM destination WHERE accountID = :account_id";
$statement = $db->prepare($query);
$statement->bindValue(":account_id", $account_id);
$statement->execute();
$statement->closeCursor();

/* Provide feedback that the record has been deleted */
if ($statement->rowCount() > 0) {
    echo "<p>Record successfully deleted.</p>";
} else {
    echo "<p>RECORD NOT FOUND.</p>";
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <title>On Tour!</title>
        <link rel="icon" href="img/plane.png">
        <!-- Bootstrap Core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="css/stylish-portfolio.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <h2>Account deleted!</h2>
        <p><a  href="viewAccount.php"> View all accounts</a></p>

    </body>
</html>