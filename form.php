<?php include("assests/header.php") ?>
<a href='read_data.php' class="btn btn-primary">All Records</a>

<div class="container">
<div class="row">
    <div class="col-md-6" class="bg-info">

    <?php
 if(isset($_GET['error'])){
    $errors = $_GET['error'];

    // If only one error exists, ensure it's always an array
    if (!is_array($errors)) {
        $errors = array($errors);
    }

    // Display errors
    foreach ($errors as $error) {
        echo "<div class='alert alert-danger'>$error</div>";
    }
 }
?>

    <h1>Registration Form</h1>
<form action="process.php" method="POST">
        <label>First Name:</label>
        <input type="text" name="first_name" class="form-control" title="first name is required"><br><br>

        <label>Last Name:</label>
        <input type="text" name="last_name" class="form-control"><br><br>

        <label>Email:</label>
        <input type="text" name="email" class="form-control"><br><br>

        <label>Password:</label>
        <input type="password" name="password" class="form-control"><br><br>

        <input type="submit" value="Submit"  class="btn btn-success">
    </form>
</div>
</div>


</div>



<?php
include("assests/footer.php");
?>