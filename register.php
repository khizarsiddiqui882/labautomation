<?php
    
    // Data Connectivity

    $con=mysqli_connect("localhost","root","","lab");
    
    if(isset($_POST["CreateAccount"]))
    {
        $Name = $_POST["Name"];
        $Email = $_POST["Email"];
        $Password = $_POST["Password"];
        $ConfirmPassword = $_POST["ConfirmPassword"];

        if($Password == $ConfirmPassword)
        {   
            
            $i = $_FILES['UserImage']['name'];
            $ext = pathinfo($i, PATHINFO_EXTENSION);
            $imgPath="uploads/userimages/".uniqid() . "." . $ext;
	        if(move_uploaded_file($_FILES["UserImage"]["tmp_name"], $imgPath))
            {
                //insert data in database
                $IsInsert=mysqli_query($con,"INSERT INTO users (Name, Email, Password, UserImage, UserType)
                values('$Name','$Email','$Password','$imgPath','User')") or die(mysqli_error($con));

                header('Location: login.php');
                exit();
            }
            else
            {
                echo "Image not uploaded.....";
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
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="register.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="small mb-1" for="Name">Name</label>
                                                <input class="form-control py-4" id="Name" type="text" name="Name" placeholder="Enter Your Name" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="Email">Email</label>
                                                <input class="form-control py-4" name="Email" id="Email" type="email" aria-describedby="emailHelp" placeholder="Enter Your Email" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="Password">Password</label>
                                                        <input class="form-control py-4" name="Password" id="Password" type="password" placeholder="Enter Your Password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="ConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" name="ConfirmPassword" id="ConfirmPassword" type="password" placeholder="Confirm Your Password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="UserImage">User Image</label>
                                                <input type="file" class="form-control-file" name="UserImage" id="UserImage">
                                                <img src="" id="img" width="80" style="float: right;margin-top:-55px;">
                                            </div>
                                            <div class="form-group mt-4 mb-0"><input type="submit" class="btn btn-primary btn-block" value="CreateAccount" name="CreateAccount"></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
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
        <script>
            document.getElementById('UserImage').onchange = function (evt) {
                var tgt = evt.target || window.event.srcElement,
                    files = tgt.files;

                // FileReader support
                if (FileReader && files && files.length) {
                    var fr = new FileReader();
                    fr.onload = function () {
                        document.getElementById('img').src = fr.result;
                    }
                    fr.readAsDataURL(files[0]);
                }

                // Not supported
                else {
                    // fallback -- perhaps submit the input to an iframe and temporarily store
                    // them on the server until the user's session ends.
                }
            }
        </script>
    </body>
</html>
