<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo "Read Data"; ?></title>
</head>
<body>
<h1>Student Data</h1>

<?php
include("../day-3/connection.php");

if(isset($_GET['msg'])){
    echo $_GET['msg'];
}

$sql = "select * from student ORDER BY firstname desc";


if ($result = mysqli_query($conn, $sql)) {
    
    echo "<a href='form.php'>Add New Record</a>";
    echo  "<table border='1' width='50%'";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Edit</th><th>Delete</t></tr>";
    // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {
      
       echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td><a href='edit_form.php?id=$row[0]'>Edit</a></td><td><a href='delete.php?id=$row[0]' onclick=\"return confirm('Are you sure?')\">Delete</a></td></tr>";
    }

    echo "</table>";

    mysqli_free_result($result);
  }

  
  
  mysqli_close($conn);

  ?>
</body>
</html>
