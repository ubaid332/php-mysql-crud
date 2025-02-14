<?php
include("connection.php");

// sql to delete a record
if(isset($_GET['id'])){
  
  $sql = "DELETE FROM student WHERE id=$_GET[id]";

  if (mysqli_query($conn, $sql)) {
    header("Location: read_data.php?msg=Record deleted successfully");
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  
  mysqli_close($conn);

}



?>