<?php
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $error = array();
    if(!is_required($_POST["first_name"])){
      $error['first_name'] = "First name is required"; 
    }else{
      $first_name = test_input($_POST["first_name"]);
    }
    
    if(!is_required($_POST["last_name"])){
      $error['last_name'] = "Last name is required"; 
    }else{
      $last_name = test_input($_POST["last_name"]);
    }

    if(!is_required($_POST["email"])){
      $error['email'] = "Email is required";
    }else{
      $email = test_input($_POST["email"]);
    }
    
    if(!is_required($_POST["password"])){
      $error['password'] = "Password is required";
    }else{
      $password = password_hash(test_input($_POST['password']), PASSWORD_BCRYPT);
    }

    if(count($error)>=1){
      // Convert the array to a URL-encoded query string
      $queryString = http_build_query(array("error" => $error));
      header("Location: form.php?error=".$queryString);
      die();
    }
    

    $sql = "INSERT INTO student (firstname, lastname, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
      // echo "Record Added Successfully";
    header("Location: read_data.php?msg=record added successfully");
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}


function is_required($data){
    if($data == ""){
      return false;
    }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>