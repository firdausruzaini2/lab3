<?php

include_once("../dbconnect.php");
if (isset($_POST['submit'])) {
    if (!(isset($_POST["name"]) || isset($_POST["email"]) || isset($_POST["phone"]) || isset($_POST["passworda"]) || isset($_POST["passwordb"]))) {
        echo "<script>alert('Please fill in all required information')</script>";
        echo "<script>window.location.replace('../php/register.php')</script>";
    } else {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $passa = $_POST["passworda"];
            $passb = $_POST["passwordb"];
            $shapass = sha1($passa);
            $otp = rand(1000, 9999);
            $sqlregister = "INSERT INTO tbl_user1(name,email,phone,password,otp) VALUES ('$name','$email','$phone','$shapass','$otp')";
            try {
                $conn->exec($sqlregister);
                echo "<script>alert('Registration successful')</script>";
                echo "<script>window.location.replace('../php/login.php')</script>";
            } catch (PDOException $e) {
                echo "<script>alert('Registration failed')</script>";
                echo "<script>window.location.replace('../php/register.php')</script>";
            }
        } 
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/depositori.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="header">
        <h1>Niena Tornado Cake</h1>
		<p>Ordering System</p>
    </div>
    <div class="topnavbar">
        <a href="../php/login.php" class="right">Login</a>
        <a href="index.php" class="left">Home</a>
    </div>

    <div class="main">
        <center><img src="../images/pic5.jpg" class="imgresponsive">
            <div class="container">
            <form name="registerForm" action="../php/register.php" onsubmit="return validateRegForm()" method="post">
                    <center>
                        <div class="row">
                            <div class="col-25">
                                <label for="fname">Name</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="idname" name="name" placeholder="Your name..">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lname">Email</label>
                            </div>
                            <div class="col-75">
                                <input type="text" id="idemail" name="email" placeholder="Your email..">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lphone">Phone</label>
                            </div>
                            <div class="col-75">
                                <input type="tel" id="idphone" name="phone" placeholder="Your phone number..">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lpassword">Password</label>
                            </div>
                            <div class="col-75">
                                <input type="password" id="idpass" name="passworda" placeholder="Your password..">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-25">
                                <label for="lpassword">Password</label>
                            </div>
                            <div class="col-75">
                                <input type="password" id="idpassb" name="passwordb" placeholder="Re-enter password">
                            </div>
                        </div>
                        <div class="row">
                            <input type="submit" name="submit" value="Submit">
                        </div>
                    </center>
                </form>

            </div>
        </center>

    </div>


    <div class="bottomnavbar">
        <a href="index.php">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
    </div>

</body>

</html>