<?php include("reusable/head.php"); ?>

    <!-- menu section starts     -->
    <?php include("reusable/menu.php"); ?>
    <!-- menu section ends     -->


    <!-- main content section starts     -->

    <section class="main-content container">
        <h3 style="font-weight:bold">MANAGE ADMIN</h3>

        <?php
            if(isset($_SESSION['add'])) {
                echo "<p class='green-text'>" . $_SESSION['add'] . "</p>";
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['delete'])) {
                echo "<p class='green-text'>" . $_SESSION['delete'] . "</p>";
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['update'])) {
                echo "<p class='green-text'>" . $_SESSION['update'] . "</p>";
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['change-pwd'])) {
                echo "<p class='green-text'>" . $_SESSION['change-pwd'] . "</p>";
                unset($_SESSION['change-pwd']);
            }

            if(isset($_SESSION['pwd-not-match'])) {
                echo "<p class='red-text'>" . $_SESSION['pwd-not-match'] . "</p>";
                unset($_SESSION['pwd-not-match']);
            }

            if(isset($_SESSION['user-not-found'])) {
                echo "<p class='red-text'>" . $_SESSION['user-not-found'] . "</p>";
                unset($_SESSION['user-not-found']);
            }
        ?>
        <br>

        <a href="add-admin.php" class="btn blue">ADD ADMIN</a><br><br>

        <table>
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    $sql = "SELECT * FROM tbl_admin";
                    $result = mysqli_query($conn, $sql);

                    if($result == TRUE) {
                        $rows = mysqli_num_rows($result);

                        $sl = 0;

                        if($rows>0) {
                            while($rows = mysqli_fetch_assoc($result)) {
                                $id = $rows['id'];
                                $full_name = $rows['full_name'];
                                $username = $rows['username'];
                                $sl++;
                                ?>

                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn brown"><i class="material-icons">key</i></a>
                                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn green"><i class="material-icons">edit</i></a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn red"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                    }
                ?>

            </tbody>
        </table>

    </section>

    <!-- main content section ends     -->


<!-- main content section ends     -->
<?php include("reusable/footer.php"); ?>
<!-- footer section starts     -->