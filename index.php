<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!doctype html>
    <html lang="en">
      <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      </head>
      <body>
      <form action="index.php" method="POST">
  <input type="text" name="myguest_firstname" placeholder="First Name">
  <input type="text" name="myguest_lastname" placeholder="Last Name">
  <input type="text" name="myguest_email" placeholder="Email">
  <input type="text" name="myguest_phone" placeholder="Phone">
  <button name="submit">Submit</button>
</form>

      <?php
$servername = "localhost";
$username = "jaxcodewarren";
$password = "Surfing33";
$dbname = "jaxcodewarren";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$myguest_id = filter_var($_POST['myguest_id'], FILTER_SANITIZE_STRING);
$myguest_firstname = filter_var($_POST['myguest_firstname'], FILTER_SANITIZE_STRING);
$myguest_lastname = filter_var($_POST['myguest_lastname'], FILTER_SANITIZE_STRING);
$myguest_email = filter_var($_POST['myguest_email'], FILTER_SANITIZE_STRING);
$myguest_phone = filter_var($_POST['myguest_phone'], FILTER_SANITIZE_STRING);


$sql = "INSERT INTO myguests (
   myguest_firstname,
   myguest_lastname,
   myguest_email,
   myguest_phone
)
VALUES  (
  '{$myguest_firstname}',
  '{$myguest_lastname}',
  '{$myguest_email}',
  '{$myguest_phone}'
)";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "SELECT * FROM myguests";
$result = mysqli_query($conn, $sql);
?>
<table class='table table-bordered table-striped table-hover'>
  <tr>
    <th>ID</th>
    <th>FirstName</th>
    <th>LastName</th> 
    <th>Email</th>
    <th>Phone</th>
  </tr>
  

<?
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      ?>
      <tr>
        <td><?=$row['myguest_id']?></td>
        <td><?=$row['myguest_firstname']?></td>
        <td><?=$row['myguest_lastname']?></td>
        <td><?=$row['myguest_email']?></td>
        <td><?=$row['myguest_phone']?></td>
      </tr>
      <?
            }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</table>


          
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
    </html>
</head>
<body>
    
</body>
</html>