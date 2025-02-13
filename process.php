<?php
include("../day-3/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = test_input($_POST["first_name"]);
    $last_name = test_input($_POST["last_name"]);
    $email = test_input($_POST["email"]);
    $password = password_hash(test_input($_POST['password']), PASSWORD_BCRYPT);

    $sql = "INSERT INTO student (firstname, lastname, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
      // echo "Record Added Successfully";
    header("Location: read_data.php?msg=record added successfully");
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