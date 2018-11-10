<?php
/* Include "configuration.php" file */
require_once "Database.php";


/* Connect to the database */

/* Perform query */
$query = "SELECT * FROM restaurant";
$statement = $db->prepare($query);       
$statement->execute();

/* Manipulate the query result */
$json = "[";
if ($statement->rowCount() > 0)
{
    /* Get field information for all fields */
    $isFirstRecord = true;
    $result = $statement->fetchAll(PDO::FETCH_OBJ);
    foreach ($result as $row)
    {
        if(!$isFirstRecord)
        {
            $json .= ",";
        }
        
        /* NOTE: json strings MUST have double quotes around the attribute names, as shown below */
        $json .= '{"restaurantID":"' . $row->restaurantID . '","restaurantName":"' . $row->restaurantName . '","type":"' . $row->type . '","cost":"' . $row->cost . '","address":"' . $row->address . '"}';
        
        $isFirstRecord = false;
    }  
}     
$json .= "]";

/* Send the $json string back to the webpage that sent the AJAX request */
echo $json;

