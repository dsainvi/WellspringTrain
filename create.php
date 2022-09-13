<?php 

include "config.php";
  
  if (isset($_POST['submit'])) {
    $trainline = $_POST['trainline'];
    $route_name  = $_POST['routename '];
    $run_number  = $_POST['runnumber '];
    $operator_id   = $_POST['operatorid  '];

    $sql= "INSERT INTO `trains`(`trainline`, `routename`, `runnumber`, `operatorid`) VALUES('$train_line','$route_name','$run_number','$operator_id')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
      echo "New record created successfully.";
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    } 
    $conn->close(); 
  }
?>

<!DOCTYPE html>
<html>

<body>

<h2>Signup Form</h2>

<form action="" method="POST">
  <fieldset>

    <legend>Train Route info:</legend>
    train line:<br>
    <input type="text" name="trainline">
    <br>

    route_name :<br>
    <input type="text" name="routename ">
    <br>

    run_number :<br>
    <input type="text" name="runnumber ">
    <br>

    operator_id  :<br>
    <input type="text  " name="operator_id  ">
    <br><br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>



 <!-- stackoverflow upload form -> upload.php -->

  <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="csv" value="" />
    <input type="submit" name="submit" value="Save" /></form> -->
<?php
$csv = array();
 if (($handle = fopen($_FILES['file']['tmp_name'], 'r')) !== FALSE) {
          $row = 0;    
          $data = fgetcsv($handle);
          echo implode(", ", $data) . "<br/>";
          while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $col_count = count($data);
            $csv[$row]['col1'] = $data[0];
            $csv[$row]['col2'] = $data[1];
            $csv[$row]['col3'] = $data[2];
            $csv[$row]['col4'] = $data[3];

            echo $csv[$row]['col1'] = $data[0];
            echo $csv[$row]['col2'] = $data[1];
            echo $csv[$row]['col3'] = $data[2];
            echo $csv[$row]['col4'] = $data[3];
            $row++;
          
          }

          fclose($handle);
        } 
// check there are no errors
if($_FILES['file']['error'] == 0){
      echo "Upload: " . $_FILES["file"]["name"] . "<br />";
      echo "Type: " . $_FILES["file"]["type"] . "<br />";
      echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
      echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    $name = $_FILES['file']['name'];
    $ext = strtolower(end(explode('.', $_FILES['file']['name'])));
    $type = $_FILES['file']['type'];
    $tmpName = $_FILES['file']['tmp_name'];
    // check the file is a csv
    if($ext === 'file'){
        if(($handle = fopen($tmpName, 'r')) !== FALSE) {
            // necessary if a large csv file
            set_time_limit(0);
            $row = 0;
            while(($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                // number of fields in the csv
                $col_count = count($data);
                // get the values from the csv
                $csv[$row]['col1'] = $data[0];
                $csv[$row]['col2'] = $data[1];
                // inc the row
                $row++;
            }
            fclose($handle);
        }
    }
}
?>


<!-- Sessions save username from login -->
<!-- <?php
      // session_start(); 

      // if(isset($_POST['submit'])){
      //   $username= filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
      //   $password = $_POST['password'];

      //   if($username == 'dave' && $password == 'password') {
      //     $_SESSION['username'] = $username;
      //     header('Location: /firstphp/extras/dashboard.php');
      //   } else{
      //     echo 'Login Incorrect';
      //   }
      // }
    ?> -->
<!-- html Sessions login form -->
<!-- <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
  <div>
    <label for="username">Username: </label>
    <input type="text" name="username">
  </div> 
  <div>
    <label for="password">Password: </label>
    <input type="text" name="password">
  </div>
  <input type="submit" value="Submit" name="submit">
</form> -->

<!-- Post php -->
 <!-- <?php
      //POST can only be used for forms 
      // only use GET in a form to seach  
      // if(isset($_POST['submit'])){
      //   $name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
      //   $age = htmlspecialchars( $_POST['age']);
      //   // $name= filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
      //   echo $name;
      // }
      ?> -->


<!-- html Post form -->
<!-- <a href="<?php echo $_SERVER['PHP_SELF']; ?>?name=John&age=29">Click</a>  
<form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
  <div>
    <label for="name">Name: </label>
    <input type="text" name="name">
  </div> 
  <div>
    <label for="age">Age: </label>
    <input type="text" name="age">
  </div>
  <input type="submit" value="Submit" name="submit">
</form> -->

<!-- dashboard -->
<!--<?php
      // session_start();

      // if(isset($_SESSION['username'])) {
      //   echo '<h1> Welcome '. $_SESSION['username'] . '</h1>';
      //   echo '<a href="logout.php">Logout</a>';
      // } else {
      //   echo '<h1> Welcome Guset</h1>';
      //   echo '<a href="/firstphp/13_sessions.php">Home</a>';
      // }
    ?>
-->

<!-- <?php
      // session_start();

      // session_destroy();
      // header('Location: /firstphp/13_sessions.php');

      ?> -->

<!-- // $row++;
        // echo $csv[$row]['col1'] = $trainline ;
        // echo $csv[$row]['col2'] = $routename ;
        // echo $csv[$row]['col3'] = $runnumber ;
        // echo $csv[$row]['col4'] = $operatorid; -->