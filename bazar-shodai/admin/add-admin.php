<?php include("reusable/head.php"); ?>

<?php include("reusable/menu.php"); ?>

    <div class="main-content container">
        <h3 style="font-weight:bold">ADD ADMIN</h3>

        <?php
            if(isset($_SESSION['add'])) {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter name">
                        </td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter username">
                        </td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="password" placeholder="Enter password">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Add Admin" class="btn green">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        
    </div>

<!-- main content section ends     -->
<?php include("reusable/footer.php"); ?>
<!-- footer section starts     -->


<?php

    // process value from form and insert in database

    // check if the button is clicked or not

    if(isset($_POST['submit'])) {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO tbl_admin (full_name,username,password)
                VALUES ('$full_name','$username','$password')";
        // echo $sql;

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        if($res == true) {
            // echo "data insertion successfull";
            // create session variable to display message
            $_SESSION['add'] = "Admin added successfully!";
            // redirect page
            header("location:" . SITEURL . "admin/manage-admin.php");
        }
        else {
            // echo "data insertion failed";
            // create session variable to display message
            $_SESSION['add'] = "Failed to add admin!";
            // redirect page
            header("location:" . SITEURL . "admin/add-admin.php");
        }

    }

?>

