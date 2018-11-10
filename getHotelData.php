<?php

include "Database.php";
try{
//$account_id = $_GET["account_id"];
$account_id = filter_input(INPUT_GET, 'account_id', FILTER_VALIDATE_INT);

$query = "SELECT * FROM destination WHERE accountID = :account_id";
$statement = $db->prepare($query);
$statement->bindValue(":account_id", $account_id);
$statement->execute();
$statement->closeCursor();
$statement->execute();
?>
<?php
while ($row = $statement->fetch()) {
    
    $account_id = $row["accountID"];
    $email_address = $row["emailAddress"];
    $password = $row["password"];
    $name = $row["name"];
    $date = $row["date"];
    $telephone = $row["telephone"];
    $start = $row["start"];
    $end = $row["end"];
}
} catch (PDOException $e) {
    echo $e->getMessage();
    exit($e->getMessage());
}

      echo '{ID: '. $row["hotelID"] . ', name: '. $row["hotelName"] .', price: '. $row["price"] .', address; '. $row["address"] .'}';





