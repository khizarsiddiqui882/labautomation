<?php
    session_start();
    
    // Data Connectivity

    $con=mysqli_connect("localhost","root","","lab");
    
    if(isset($_POST["logout"]))
    {
        unset($_SESSION["email"]);
        setcookie("Email","",time() - 3600);
        setcookie("Password","",time() - 3600);
        unset($_SESSION["Email"]);
        unset($_SESSION["Password"]);
    }

    if(isset($_SESSION["email"]))
    {
        header("Location:index.php");
    }
    
    if(isset($_POST["login"]))
    {
    
        $email = $_POST["email"];
        $password = $_POST["password"];
        $query=mysqli_query($con,"select * from users where Email='$email' && Password='$password'");

        if($row=mysqli_fetch_array($query))
        {
            $name = $row["Name"];
            $img = $row["UserImage"];
            $UserType = $row["UserType"];
            $_SESSION["email"] = $email;
            $_SESSION["Name"] = $name;
            $_SESSION["UserImage"] = $img;
            $_SESSION["UserType"] = $UserType;

            if(isset($_POST["remember-me"]))
            {
                setcookie("Email","",time()+3600);
			    setcookie("Password","",time()+3600);
            }
            else
            {
                setcookie("Email","",time());
			    setcookie("Password","",time());
            }
            header("Location:index.php");
        }
        else
        {
            $msg = "Incorrect Email Or Password";
        }
    }

    if(isset($_COOKIE["Email"]) && isset($_COOKIE["Password"]))
    {
        if($_COOKIE["Email"] != null)
        {
            $email = $_COOKIE["email"];
            $password = $_COOKIE["password"];
            $query=mysqli_query($con,"select * from users where Email='$email' && Password='$password'");

            if($row=mysqli_fetch_array($query))
            {
                $name = $row["Name"];
                $_COOKIE["email"] = $email;
                $_COOKIE["password"] = $password;

                    setcookie("Email","",time()+3600);
                    setcookie("Password","",time()+3600);

                header("Location:index.php");
            }
            else
            {
                $msg = "Incorrect Email Or Password";
            }
        }
    }
    include 'headtags.php';
?>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="login.php" method="post">
                                        <center><p style="color:red"><?php echo @$msg; ?></p></center>
                                            <div class="form-group">
                                                <label class="small mb-1" for="email">Email</label>
                                                <input class="form-control py-4" id="email" type="email" placeholder="Enter Email" name="email"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Password</label>
                                                <input class="form-control py-4" id="password" type="password" placeholder="Enter Password" name="password"/>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" name="remember-me" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="#">Forgot Password?</a>
                                                <button class="btn btn-primary" type="submit" name="login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <!-- Footer -->
            <?php include 'footer.php';?>
            <!-- End of Footer -->
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
