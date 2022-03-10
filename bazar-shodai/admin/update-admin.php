<?php include("reusable/head.php"); ?>

<?php include("reusable/menu.php"); ?>

    <div class="main-content container">
        <h3 style="font-weight:bold">UPDATE ADMIN</h3>

        <?php

            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_admin WHERE id = $id";
            $res = mysqli_query($conn, $sql);

            if($res == true) {
                $count = mysqli_num_rows($res);
                if($count == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else {
                    header('location:' . SITEURL . 'admin/manage-admin.php');
                }
            }

        ?>

        <form action="" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name ?>" placeholder="Enter name">
                        </td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username ?>" placeholder="Enter username">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Update Admin" class="btn green">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <br><br>
    </div>


<?php
    if(isset($_POST['submit'])) {
        $id = $_GET['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        $sql = "UPDATE tbl_admin SET 
                full_name = '$full_name', 
                username = '$username'
                WHERE id = $id";

        $res = mysqli_query($conn, $sql);

        if($res == true) {
            $_SESSION['update'] = "Admin updated successfully!";
            header('location:' . SITEURL . 'admin/manage-admin.php');
        }
        else {
            $_SESSION['update'] = "Failed to update admin!";
            header('location:' . SITEURL . 'admin/manage-admin.php');
        }
    }
?>


<!-- main content section ends     -->
<?php include("reusable/footer.php"); ?>
<!-- footer section starts     -->

