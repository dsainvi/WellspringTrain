<!-- turns csv into text file easier to manage but isnt conneted to a db -->
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>Chicago Train Data</title>
  </head>
  <header>
    <h1>Chicago Train Routes</h1>
  </header>
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
  $storagename = "uploaded_file.txt";
  if (isset($_POST["submit"]) && (isset($_FILES["file"]))) {
      //if there was no error uploading the file
        if($_FILES['file']['error'] > 0){
          echo $_FILES["file"]["name"] . " error uploading file. ";
        } else {
          $uploadedFile = move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $storagename);
          $uphandler =fopen("upload/". $storagename, 'r');
          $updata = fgets($uphandler);
          echo nl2br(file_get_contents("upload/". $storagename));
        }
  }
?>