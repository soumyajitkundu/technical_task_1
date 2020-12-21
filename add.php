<?php require_once('includes/header.php'); ?>
<?php require_once('lib/cleanOperations.php'); ?>
<?php require_once('lib/dbOperations.php'); ?>

<fieldset>
    <legend align="center">Add New Category Details</legend>

    <form action="add.php" method="post" class="login">

        <table width="100%">
            <tr>
                <td>Name : </td>
                <td><input type="text" name="name" value="" /></td>
            </tr>
            <tr>
                <td>Description : </td>
                <td><input type="text" name="desc1" value="" /></td>
            </tr>
            <tr>
                <td>Status (Active/Inactive) : </td>
                <td><input type="text" name="status" value="" /></td>
            </tr>
            <tr>
                <td>Updated (T&D) : </td>
                <td><input type="date" name="updated" value="" /></td>
            </tr>
            <tr>
                <td> &nbsp;</td>
                <td><input type="submit" name="sub" value=" Insert " /></td>
            </tr>
            <tr>
                <td></br></br></br></br></td>
                <td><a href="categories.php">Go Back to Categories Page</a></td>
            </tr>
        </table>
    </form>
</fieldset>


<?php

if (isset($_POST['sub'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc1'];
    $status = $_POST['status'];
    $updated = $_POST['updated'];



    @$sql = "INSERT INTO category(`name`,`desc1`,`status`,`updated`) VALUES ('$name','$desc1','$status','$updated')";
    $run = mysqli_query($con, $sql);
    if ($run == true) {
?>
<script>
alert('New Category Inserted');
</script>
<?php
    } else {
        echo ("error:" . mysqli_error($con));
    }
}
?>
