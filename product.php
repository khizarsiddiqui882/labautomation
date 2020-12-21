<?php
session_start();
if(isset($_SESSION["email"]))
{

}
else
{
  header("Location:login.php");
}

// Data Connectivity

$con=mysqli_connect("localhost","root","","lab");



if(isset($_POST["submit"]) && $_POST["submit"] != '')
{
    //Get  Data
    $Name = $_POST ["ProductName"];
    $ProductCode = $_POST ["ProductCode"];
    $ProductType = $_POST ["ProductType"];
    $ManufacturingDate = $_POST ["ManufacturingDate"];
    $SentForTesting = $_POST ["SentForTesting"];

    // Insert Data In DataBase

    $IsInsert=mysqli_query($con,"insert into product(ProductName,ProductCode,ProductType,ManufacturingDate,SentForTesting)
    values('$Name','$ProductCode','$ProductType','$ManufacturingDate','$SentForTesting')") or die(mysqli_error($con));
    if($IsInsert){
        
        header('Location: product.php');
        exit;
        
        ?>


        <?php
        
    }else{
        
        ?>
        
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Data Is Not Inserted </strong> Your data has not been inserted into database
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php
    }

}

    // delete data from database

    if(isset($_GET["DeleteId"]))
    {

        $id=$_GET["DeleteId"];
        $IsDelete=mysqli_query($con, "DELETE FROM `product` WHERE Id='$id'");
        if($IsDelete){

            header('Location: product.php');

            ?>
        <?php

        }else{

            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Data Deleted Successfully</strong> Your data has been deleted from database successfully
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <?php

        }
    }

    include 'headtags.php';
    // echo $_SESSION["UserType"];
    ?>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include 'sidebar.php';?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include 'topbar.php';?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <h1 class="mt-4">Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                <?php if($_SESSION["UserType"] == "Admin" || $_SESSION["UserType"] == "Manager" || $_SESSION["UserType"] == "Tester" || $_SESSION["UserType"] == "User"){?>
                                  List Of Products  <i class="fas fa-plus" style="float: right;margin-top: 5px;" data-toggle="modal" data-target="#myModal"></i>       
                                <?php }?>
                            </div>

                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
  
                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title" style="float: left;">Add Product</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="product.php" method="POST">
                                    <div class="form-group">
                                      <label for="ProductName">Product Name:</label>
                                      <input type="text" class="form-control" placeholder="Enter Product Name" name="ProductName">
                                    </div>
                                    <div class="form-group">
                                      <label for="ProductCode">Product Code:</label>
                                      <input type="text" class="form-control" placeholder="Enter Product Code" name="ProductCode">
                                    </div>
                                    <div class="form-group">
                                      <label for="ProductType">Product Type:</label>
                                      <input type="text" class="form-control" placeholder="Enter Product Type" name="ProductType">
                                    </div>
                                    <div class="form-group">
                                      <label for="ManufacturingDate">Manufacturing Date:</label>
                                      <input type="date" class="form-control" placeholder="Enter Manufacturing Date" name="ManufacturingDate">
                                    </div>
                                    <div class="form-group">
                                      <label for="SentForTesting">Sent For Testing:</label>
                                      <input type="date" class="form-control" placeholder="Enter Sent For Testing" name="SentForTesting">
                                    </div>
                                    <div class="form-group">
                                    <input type="submit" class="btn btn-default" name="submit" value="submit">
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Product Name</th>
                                                <th>Product Code</th>
                                                <th>Product Type</th>
                                                <th>Manufacturing Date</th>
                                                <th>Sent For Testing</th>
                                                <?php if($_SESSION["UserType"] == "Admin" || $_SESSION["UserType"] == "Manager" || $_SESSION["UserType"] == "Tester"){?>
                                                <th colspan="2">Actions</th>
                                                <?php }?>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        
                                        // Fetch Data From Database
                                        $query=mysqli_query($con,"select * from product");
                                        while($row=mysqli_fetch_array($query)){
                                        
                                        ?>
                                            <tr>
                                                <td><?php echo $row["Id"]?></td>
                                                <td><?php echo $row["ProductName"]?></td>
                                                <td><?php echo $row["ProductCode"]?></td>
                                                <td><?php echo $row["ProductType"]?></td>
                                                <td><?php echo $row["ManufacturingDate"]?></td>
                                                <td><?php echo $row["SentForTesting"]?></td>
                                                <?php if($_SESSION["UserType"] == "Admin"){?>
                                                <td>
                                                <a href="product.php?DeleteId=<?php echo $row["Id"]?>">
                                                <i class="fas fa-trash-alt" style="font-size:25px;color:black;"></i>
                                                </a>
                                                </td>
                                                <td>
                                                <a href="Edit.php?EditId=<?php echo $row["Id"]?>">
                                                <i class="fas fa-edit" style="font-size:25px;color:black;"></i>
                                                </td>
                                                <?php } else if($_SESSION["UserType"] == "Manager" || $_SESSION["UserType"] == "Tester"){?>
                                                <td>
                                                <a href="Edit.php?EditId=<?php echo $row["Id"]?>">
                                                <i class="fas fa-edit" style="font-size:25px;color:black;"></i>
                                                </td>
                                                <?php }?>
                                            </tr>
                                            
                                            <?php if($_SESSION["UserType"] == "User"){?>
                                              <tr>
                                                <td><?php echo $row["Id"]?></td>
                                                <td><?php echo $row["ProductName"]?></td>
                                                <td><?php echo $row["ProductCode"]?></td>
                                                <td><?php echo $row["ProductType"]?></td>
                                                <td><?php echo $row["ManufacturingDate"]?></td>
                                                <td><?php echo $row["SentForTesting"]?></td>
                                                </tr>
                                                <?php }?>
                                            <?php
                                        }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include 'footer.php';?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are You Sure You Want To Logout?</div>
        <div class="modal-footer">
          <div>
            <form action="login.php" class="dropdown-item" method="post">
              <input type="hidden" name="logout" value="logout">
              <input type="submit" value="logout" class="btn btn-primary" name="logout" href="login.php">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>