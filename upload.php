<?php
// include_once 'db.php';
//   if (isset($_POST['submit']) && (isset($_FILES["file"]))){
//     if (($csvFile = fopen($_FILES['file']['tmp_name'], 'r')) !== FALSE){
//       $csv= array();
//       $row = 0;
//       // if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes)){

//       // $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
//       // $data =fgetcsv($csvFile);
//       while (($data = fgetcsv($csvFile, 100, ",")) !== FALSE){
//           $trainline = $data[0];
//           $routename = $data[1];
//           $runnumber = $data[2];
//           $operatorid = $data[3];
//           $row++;
//           echo $csv[$row]['col1'] = $data[0];
//           echo $csv[$row]['col2'] = $data[1];
//           echo $csv[$row]['col3'] = $data[2];
//           echo $csv[$row]['col4'] = $data[3];

          
//           $query = "SELECT id FROM trains WHERE runnumber = '" . $data[2] . "'";
//           $check = mysqli_query($conn, $query);
//           if ($check->num_rows > 0){ mysqli_query( 
//             $conn, "UPDATE trains SET trainline = '" . $trainline . "', routename = '" . $routename . "', runnumber = '" . $runnumber ."', operatorid = '" . $operatorid . "' WHERE id = '" . $id. "'");echo implode(", ", $data) . "<br/>";
//           }
//           else{mysqli_query($conn, "INSERT INTO trains (trainline, routename, runnumber, operatorid)
//             VALUES('" . $trainline . "', '" . $routename . "', '". $runnumber . "', '" . $operatorid . "')");
//             echo implode(", ", $data) . "<br/>";
//           }
//       }
//       fclose($csvFile);
//       header("Location: index.php"); 
        //  die();
//       }
//   }else { echo "Please select valid file";}    
    