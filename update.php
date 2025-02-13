<?php
include("../day-3/connection.php"); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  print_r($_POST);
  $first_name = test_input($_POST["first_name"]);
  $last_name = test_input($_POST["last_name"]);
  $email = test_input($_POST["email"]);
  $password = password_hash(test_input($_POST['password']), PASSWORD_BCRYPT);

  $sql = "UPDATE student SET firstname='$first_name',lastname='$last_name',email='$email', password='$password' WHERE id=$_POST[sid]";
  if (mysqli_query($conn, $sql)) {
    // echo "Record Added Successfully";
  header("Location: read_data.php?msg=record updated successfully");
  } else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>