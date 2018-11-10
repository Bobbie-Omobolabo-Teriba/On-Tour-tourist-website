<?php
include "Database.php";

//get value from form page, "routePlanner.php"
$account_id = filter_input(INPUT_POST, "account_id");
$email_Address = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
$name = filter_input(INPUT_POST, "name");
$date = date('Y-m-d H:i', strtotime(filter_input(INPUT_POST, "date")));
$telephone = filter_input(INPUT_POST, "phone");
$start = filter_input(INPUT_POST, "start");
$end = filter_input(INPUT_POST, "end");

$query = "UPDATE destination SET emailAddress=:email_address, password=:password, name=:name, date=:date, "
        . "telephone=:telephone,start=:start, end=:end  WHERE accountID=:account_id";

$statement = $db->prepare($query);
$statement->bindValue(":account_id", $account_id);
$statement->bindValue(":email_address", $email_Address);
$statement->bindValue(":password", $password);
$statement->bindValue(":name", $name);
$statement->bindValue(":date", $date);
$statement->bindValue(":telephone", $telephone);
$statement->bindValue(":start", $start);
$statement->bindValue(":end", $end);
$statement->execute();
$statement->closeCursor();

echo'<h3>You have Updated ' . $name . ' Profile</h3><a href ="viewAccount.php">View Accounts</a>';
 
