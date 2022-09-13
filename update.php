
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV and PHP</title>
</head>

<body>
    <h2> Update Train Routes</h2>
    <table width="600">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php $id ?>">
                trainline :<br> 
                <input type="text" name="trainline" value="">
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
                <input type="submit" name="submit" value="Update">
        </form>
    </table>
</body>
</html>

<?php
include "db.php";
$carray = array();
$idnum = mysqli_insert_id($conn);
    if (isset($_POST['submit'])) {  
        $sq = "SELECT id, trainline, routename, runnumber, operatorid FROM trains WHERE id= $idnum";
        $result = mysqli_query($conn, $sq); 
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $trainline = $row['trainline'];
            $routename = $row['routename'];
            $runnumber = $row['runnumber'];
            $operatorid = $row['operatorid'];
            array_push($carray, $id,$trainline, $routename, $runnumber, $operatorid);
        
           
            // $idnum = mysqli_insert_id($conn);
            if (mysqli_num_rows($result)> 0){ 
            mysqli_query( $conn, "UPDATE trains SET trainline='$trainline', routename='$routename',runnumber='$runnumber', operatorid ='$operatorid' WHERE id = '$idnum'"); 
            }
        } $carray;
    
    // echo "update completed <br>";
    } else {
        // echo "error updating";
    }

$sq = "SELECT id, trainline, routename, runnumber, operatorid FROM trains WHERE id= $idnum";
$result = mysqli_query($conn, $sq);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $trainline = $row['trainline'];
        $routename = $row['routename'];
        $runnumber = $row['runnumber'];
        $operatorid  = $row['operatorid'];
    }
    // echo $id;
} else {
    // echo " no results";
}
?>