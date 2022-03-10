<?php include("reusable-front/head.php"); ?>

<?php include("reusable-front/menu.php"); ?>

    <div class="main-content container">
        <h3 style="font-weight:bold" class="grey-text">UPDATE PROFILE</h3>

        <?php

            if(!isset($_SESSION['user'])) {

                header('location:'.SITEURL.'login.php');
                exit();

            }

            $email = $_SESSION['user']['email'];
            $name = $_SESSION['user']['name'];
            $phone = $_SESSION['user']['phone'];
            $address = $_SESSION['user']['address'];
            $nid = $_SESSION['user']['nid'];

        ?>

        <form action="" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>Email: </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $email ?>" placeholder="Enter email">
                        </td>
                    </tr>
                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $name ?>" placeholder="Enter name">
                        </td>
                    </tr>
                    <tr>
                        <td>Phone: </td>
                        <td>
                            <input type="text" name="phone" value="<?php echo $phone ?>" placeholder="Enter phone">
                        </td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td>
                            <input type="text" name="address" value="<?php echo $address ?>" placeholder="Enter Address">
                        </td>
                    </tr>
                    <tr>
                        <td>NID: </td>
                        <td>
                            <input type="text" name="nid" value="<?php echo $nid ?>" placeholder="Enter NID">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="Update Profile" class="btn green">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <br><br>
    </div>


<?php
    if(isset($_POST['submit'])) {
        $id = $_SESSION['user']['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $nid = $_POST['nid'];

        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['address'] = $address;
        $_SESSION['user']['nid'] = $nid;

        $sql = "UPDATE customer SET 
                name = '$name', 
                email = '$email',
                phone = '$phone',
                address = '$address',
                nid = '$nid'
                WHERE id = $id";

        $res = mysqli_query($conn, $sql);

        $url = SITEURL.'edit-profile.php';
        echo "<script>window.location.href='$url'</script>";
    }
?>


<!-- main content section ends     -->
<?php include("reusable-front/footer.php"); ?>
<!-- footer section starts     -->

