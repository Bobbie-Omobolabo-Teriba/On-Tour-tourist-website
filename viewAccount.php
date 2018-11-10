<?php
include 'Database.php';

try {

    $query = $db->prepare("SELECT * FROM destination ");

    if (!isset($account_id)) {
        $account_id = filter_input(INPUT_GET, 'account_id', FILTER_VALIDATE_INT);
        if ($account_id == NULL || $account_id == FALSE) {
            $account_id = 1;
        }
    }
    $selectQuery = "Select accountID FROM destination";
    $statement2 = $db->prepare($selectQuery);
 //   $statement2->bindValue(":account_id", $account_id);
    $statement2->execute();
    $account_array = $statement2->fetchAll();
    $statement2->closeCursor();
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

            <title>Account List</title>
            <link rel="icon" href="img/plane.png">
            <!-- Bootstrap Core CSS -->
            <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

            <!-- Custom Fonts -->
            <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

            <!-- Custom CSS -->
            <link href="css/stylish-portfolio.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <style>
                body{
                    margin-left: 10px;
                }
            </style>
        </head>
        <body>
            <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle">
            <i class="fa fa-bars"></i>
        </a>
        <nav id="sidebar-wrapper"> 
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle">
                <i class="fa fa-times"></i>
            </a>
            <ul class="sidebar-nav">

                <li class="sidebar-brand">
                    <a class="js-scroll-trigger" href="#top">Menu</a>
                </li>
                <li>
                    <a class="js-scroll-trigger" href="index.html">Home</a>
                </li>
                <li>
                    <a class="js-scroll-trigger" href="http://www.planetware.com/tourist-attractions/ireland-irl.htm" target="blank">Ireland's Top Attractions</a>
                </li>
                <li>
                    <a class="js-scroll-trigger" href="locations.php">Locations</a>
                </li>
            </ul>
        </nav>
            <div id = "container">

                <header class = "storeHead">
                    <h1>Account List</h1></header>

                <table>
                    <tr>
                        <th>Account ID</th>
                        <th>Email Address</th>
                        <th>Password</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Telephone</th>
                        <th>Start</th>
                        <th>End</th>

                        <th>&nbsp;</th>
                    </tr>

                    <?php
                    $query->execute();
                    while ($row = $query->fetch()) {
                        echo "<tr>";
                        echo "<td>" . $row["accountID"] . "</td>";
                        echo "<td>" . $row["emailAddress"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["date"] . "</td>";
                        echo "<td>" . $row["telephone"] . "</td>";
                        echo "<td>" . $row["start"] . "</td>";
                        echo "<td>" . $row["end"] . "</td>";

                        echo "<td><a href ='updateAccountForm.php?account_id=" . $row["accountID"] . "'>Update</a>";
                        //     echo "<td><a href ='deleteAccount.php?account_id " . $row["accountID"] . "'>Delete</a>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    exit($e->getMessage());
                }
                ?>

            </table>
            <br>
            
            <h4 class = "addform"><a class = "addform" href ='routePlanner.php'>Add an account and choose a destination</a></h4>
            <br>
            <br>
            <form action ="deleteAccount.php" method ="POST">
                <fieldset>
                    <legend>Delete Account</legend>
                    <label for ="account_id"> Account ID</label>
                    <select name ="account_id">
                        <?php foreach ($account_array as $account_row) : ?>
                            <option value ="<?php echo $account_row["accountID"]; ?>">
                                <?php echo $account_row["accountID"]; ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                    <input type ="submit" name="submit" value="Delete" >
                </fieldset>


            </form>
            <br>
            <!--                <h4 class = "addform"><a class = "addform" href ='routePlanner.php'>Add an account and choose a destination</a></h4>-->

        </div>
    </body>
    <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/stylish-portfolio.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPAotLGeLeb0fY6ZBxpcr7jmmN9vTQPgQ"></script>
</html>


