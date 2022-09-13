<?php
include "db.php";
if (isset($_POST['update'])) {

    $trainline = $_POST['trainline'];
    $routename = $_POST['routename'];
    $runnumber = $_POST['runnumber'];
    $operatorid = $_POST['operatorid'];
    $id = $_POST['id'];
  

    $sql = "UPDATE `trains` SET `trainline`='$trainline', `routename`='$routename',`runnumber`='$runnumber', `operatorid` ='$operatorid' WHERE `id`='$id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record updated successfully.";
        
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM `trains` WHERE `id`='$id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $trainline = $row['trainline'];
            $routename = $row['routename'];
            $runnumber = $row['runnumber'];
            $operatorid  = $row['operatorid'];
            $id = $row['id'];
            echo $id;
        }
    } else {
        // echo 'error update';
        header('Location: index.php');
        die();
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV File with PHP</title>
</head>

<body>
    <h2> Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Train Route info:</legend>
            train line:<br>
            <input type="text" name="trainline" value="">
            <input type="hidden" name="id" value="">
            <br>
            routename :<br>
            <input type="text" name="routename" value="">
            <br>
            runnumber :<br>
            <input type="text" name="runnumber" value="">
            <br>
            operatorid:<br>
            <input type="text  " name="operatorid" value="">
            <br>
            <input type="submit" value="Update" name="update">
        </fieldset>
    </form>
</body>

</html>