
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CSV File with PHP</title>
</head>
<body>
  <table width="600">
      <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
        <tr>
          <td width="20%">Upload CSV File</td>
          <td width="80%">
            <input type="file" name="file" id="file" value=""></input>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="submit">Submit</input>
          </td>
        </tr>
      </form>
  </table>
</body>
</html>

<?php

include_once 'db.php';

$sql =  "SELECT id, trainline, routename, runnumber, operatorid FROM trains";
$result = mysqli_query($conn, $sql);
$csvarray = array();
$row = [];
$idnum = mysqli_insert_id($conn);
function myarray(){
  global $result, $csvarray, $row;
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      array_push($csvarray, $row["id"], $row["trainline"],$row["routename"],$row["runnumber"],$row["operatorid"]);
    }
    return $csvarray; 
    // return $row;
  } else {
    echo "0 results";
  }
}
myarray();

  
  if (isset($_POST['submit']) && (isset($_FILES["file"]))){
      // $csvarray = $GLOBALS['csvarray'];
      // $row = $GLOBALS['row'];
      // echo $row;
      $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
      $data = fgetcsv($csvFile, 100, ",");
      echo implode(", ", $data) . "<br/>";
      while (($data = fgetcsv($csvFile, 100, ",")) !== FALSE){
        $trainline  = $data[0];
        $routename  = $data[1];
        $runnumber  = $data[2];
        $operatorid = $data[3];


        echo implode(", ", $data) ." <button type='update' name ='update'> <a href='update.php'>Update</a> </button> 
        <button  type='submit' name ='delete'><a href='index.php'>Delete</a> </button> <br/>";

        $query =  "SELECT id, trainline, routename, runnumber, operatorid FROM trains";
        $result = mysqli_query($conn, $query);
        $idnum = mysqli_insert_id($conn);
        if (mysqli_num_rows($result)> 0){ 
          mysqli_query( $conn, "UPDATE trains SET trainline='$trainline', routename='$routename',runnumber='$runnumber', operatorid ='$operatorid' WHERE id = '$idnum'"); 
        }else{
          $qury ="INSERT INTO trains (trainline, routename, runnumber, operatorid)VALUES('". $trainline ."','".$routename ."','".$runnumber."', '" . $operatorid ."')";
          mysqli_query($conn, $qury);
          echo "new id" . mysqli_insert_id($conn); 
          mysqli_close($conn);
        }
      }
      fclose($csvFile);
  }else { 
    echo "Please select valid file";
  }    

function deleteById($id){  
  include "db.php";
  // global $csvarray, $row;

  // $csvFile = fopen($_FILES['file']['tmp_name'], 'w');
  // $data = fgetcsv($csvFile, 100, ",");


  $sql = "DELETE FROM trains WHERE id =$id";

  if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";

  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
  mysqli_close($conn);
} 
deleteById($idnum);
?>
