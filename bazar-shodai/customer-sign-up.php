<?php include("reusable-front/head.php"); ?>
<?php include('config/constants.php'); ?>

<style>
    form {
        margin-right: 20%;
        margin-left: 20%;
        padding: 30px;
        border-radius: 10px;
    }
    h3 {
        font-weight: bold;
        text-align: center;
    }
    #signup {
        margin-bottom:20px;
    }
</style>

<body>

    <div class="container" id="signup">

        <h3>SIGNUP</h3>
        
        <form action="" method="POST" class="text-center red lighten-5 z-depth-3">
                
            <div class="input-field">
                <i class="material-icons prefix">email</i>
                <input type="email" name="email" placeholder="Email" class="validate" required>
                <!-- <label for="name">Email</label> -->
            </div>
            <div class="input-field">
                <i class="material-icons prefix">phone</i>
                <input type="text" name="phone" placeholder="Phone" class="validate" required>
                <!-- <label for="phone">Phone</label> -->
            </div>
            <div class="input-field">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="name" placeholder="Name" class="validate" required>
                <!-- <label for="name">Name</label> -->
            </div>
            <div class="input-field">
                <i class="material-icons prefix">lock</i>
                <input type="password" name="pass" placeholder="Password" class="validate" required>
                <!-- <label for="pass">Password</label> -->
            </div>
            <div class="input-field">
                <i class="material-icons prefix">home</i>
                <input type="text" name="address" placeholder="Address" class="validate" required>
                <!-- <label for="address">Address</label> -->
            </div>
            <div class="input-field">
                <i class="material-icons prefix">featured_play_list</i>
                <input type="text" name="nid" placeholder="National ID" class="validate" required>
                <!-- <label for="nid">National ID</label> -->
            </div>
            <div class="input-field center-align">
                <input name="submit" class="btn red lighten-2 hoverable" type="submit" value="signup">
            </div>
            <div class="center-align">
                <a href="<?php echo SITEURL; ?>login.php">Already have an account? Login here</a>
            </div>
        </form>

    </div>


    
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>


<!-- PHP CODE -->
<?php 

    if(isset($_POST["email"])
        && isset($_POST["phone"])
        && isset($_POST["name"])
        && isset($_POST["pass"])
        && isset($_POST["address"])
        && isset($_POST["nid"]))
    {
        $pass = md5($_POST['pass']);

        $sql = "INSERT INTO Customer (email, phone, name, pass, address, nid) 
                VALUES ('$_POST[email]', '$_POST[phone]', '$_POST[name]', '$pass', '$_POST[address]', '$_POST[nid]')";

        // echo $sql;

        error_reporting(0);

        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        // echo "<script type='text/javascript'>alert('$res');</script>";

        if ($res)
        { 
            header('location:' . SITEURL . 'login.php');
        }
        else 
        { 
            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            // echo "Email is already in use!";
            // M.toast({html: 'Email is already in use!'});
            header("location:" . SITEURL . 'customer-sign-up.php');
        }
    }

?>