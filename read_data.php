<?php include("assests/header.php") ?>
<h1>Student Data</h1>

<?php
include("connection.php");

if(isset($_GET['msg'])){
    echo $_GET['msg'];
}

$sql = "select * from student ORDER BY firstname desc";


if ($result = mysqli_query($conn, $sql)) {
    
    echo "<a href='form.php' class='btn btn-primary mb-2'>Add New Record</a>";
    echo  "<table border='1' width='50%' class='table table-bordered'>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Edit</th><th>Delete</t></tr>";
    // Fetch one and one row
    while ($row = mysqli_fetch_row($result)) {
      
       echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td><a href='edit_form.php?id=$row[0]' class='btn btn-info'>Edit</a></td><td><a href='delete.php?id=$row[0]' onclick=\"return confirm('Are you sure?')\" class='btn btn-danger'>Delete</a></td></tr>";
    }

    echo "</table>";

    mysqli_free_result($result);
  }

  
  
  mysqli_close($conn);

  include("assests/footer.php");
  ?>

