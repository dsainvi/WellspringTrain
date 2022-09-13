
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
            <input type="file" name="file" id="file" value="" />
          </td>
        </tr>
        <tr>
          <td>
            <button type="submit" name="submit">Submit</button>
          </td>
        </tr>
      </form>
    </table>
</body>
</html>

<?php
include_once 'db.php';
  if (isset($_POST['submit']) && (isset($_FILES["file"]))){
      // $csv= array();
      // $row = 0;
      $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
      $data = fgetcsv($csvFile, 100, ",");
      echo implode(", ", $data) . "<br/>";
      while (($data = fgetcsv($csvFile, 100, ",")) !== FALSE){
        $trainline  = $data[0];
        $routename  = $data[1];
        $runnumber  = $data[2];
        $operatorid = $data[3];
    
        echo implode(", ", $data) ." <button type='update' name ='update'> <a href='update.php'>Update</a> </button>  <button type='id' name ='id'><a href='index.php'>Delete</a> </button> <br/>";

        $query = "SELECT id FROM trains WHERE runnumber = '" . $data[2] . "'";
        $check = mysqli_query($conn, $query);
        if ($check->num_rows > 0){ mysqli_query( 
          $conn, "UPDATE `trains` SET `trainline`='$trainline', `routename`='$routename',`runnumber`='$runnumber', `operatorid` ='$operatorid' WHERE  `runnumber`='$runnumber'");
        }else{
          mysqli_query($conn, "INSERT INTO trains (trainline, routename, runnumber, operatorid)VALUES('" . $trainline . "', '" . $routename . "', '". $runnumber . "', '" . $operatorid . "')");
        }
      }
      fclose($csvFile);
  }else { 
    echo "Please select valid file";
  }    


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `trains` WHERE `id`='$id'";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record deleted successfully.";
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 
?>
