<?php require_once('includes/header.php'); ?>
<?php require_once('lib/cleanOperations.php'); ?>
<?php require_once('lib/dbOperations.php'); ?>

<fieldset>
    <legend>Add Category</legend>

    <form action="add.php" method="post" class="login">

        <table width="100%">
            <tr>
                <td> Name : </td>
                <td><input type="text" name="name" value="" /></td>
            </tr>
            <tr>
                <td> Desc : </td>
                <td><input type="text" name="desc1" value="" /></td>
            </tr>
            <tr>
                <td> Status : </td>
                <td><input type="text" name="status" value="" /></td>
            </tr>
            <tr>
                <td> Updated : </td>
                <td><input type="date" name="updated" value="" /></td>
            </tr>
            <tr>

            </tr>
            <tr>
                <td> &nbsp;</td>
                <td><input type="submit" name="sub" value=" Insert " /></td>
            </tr>
            <tr>

                <td><a href="categories.php">Back</a></td>

            </tr>
        </table>
    </form>
</fieldset>


<?php

if (isset($_POST['sub'])) {
    $name = $_POST['name'];
    $desc = $_POST['desc1'];
    $status = $_POST['status'];
    $created = $_POST['created'];
    $updated = $_POST['updated'];



    $sql = "INSERT INTO category(`name`,`desc1`,`status`,`created`,`updated`) VALUES ('$name','$desc1','$status','$created','$updated')";
    $run = mysqli_query($con, $sql);
    if ($run == true) {
?>
<script>
alert('Data Inserted Successfully.');
</script>
<?php
    } else {
        echo ("error:" . mysqli_error($con));
    }
}
?>