<?php
require_once ("Database.php");

//get value from form page, "routePlanner.php"
$account_id = filter_input(INPUT_POST, "account_id");
$email_Address = filter_input(INPUT_POST, "email");
$password = filter_input(INPUT_POST, "password");
$name = filter_input(INPUT_POST, "name");
$date = date('Y-m-d H:i', strtotime(filter_input(INPUT_POST, "date")));
$telephone = filter_input(INPUT_POST, "phone");
$start = filter_input(INPUT_POST, "start");
$end = filter_input(INPUT_POST, "end");

$insertQuery = "INSERT INTO destination(accountID, emailAddress, password, name, date, telephone , start, end) "
        . "values(:account_id, :email, :password, :name, :date, :telephone, :start, :end)";

$statement = $db->prepare($insertQuery);
$statement->bindValue(":account_id", $account_id);
$statement->bindValue(":email", $email_Address);
$statement->bindValue(":password", $password);
$statement->bindValue(":name", $name);
$statement->bindValue(":date", $date);
$statement->bindValue(":telephone", $telephone);
$statement->bindValue(":start", $start);
$statement->bindValue(":end", $end);
$statement->execute();
$statement->closeCursor();

 echo '<h3>You have Inserted '. $name .' and chosen locations </h3><a href ="viewAccount.php"> View Accounts</a>';

