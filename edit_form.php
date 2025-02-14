
<a href='read_data.php'>All Records</a>
<?php
include("connection.php"); 
$sql = "select * from student WHERE id=$_GET[id]";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

?>

<h1>Update Registration Form</h1>
<form action="update.php" method="POST">
        <label>First Name:</label>
        <input type="text" name="first_name" required value="<?php echo $row[1] ?>"><br><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" required value="<?php echo $row[2] ?>"><br><br>

        <label>Email:</label>
        <input type="email" name="email" required value="<?php echo $row[3] ?>"><br><br>

        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="hidden" name="sid" value="<?php echo $row[0] ?>">
        <input type="submit" value="Update Record">
    </form>