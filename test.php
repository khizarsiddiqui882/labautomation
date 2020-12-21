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
    // print_r($_POST);
    // exit();
    //Get  Data
    $Productid = $_POST ["productid"];
    $ProductCode = $_POST ["ProductCode"];
    $ProductType = $_POST ["ProductType"];
    $TheRevise = $_POST ["TheRevise"];
    $testingperformed = $_POST ["testingperformed"];
    $testingremarks = $_POST ["testingremarks"];
    $status = $_POST ["status"];
    $ExpectedResult = $_POST ["ExpectedResult"];
    $result = $_POST ["result"];
    $TestingPerformedBy = $_POST ["TestingPerformedBy"];

    // Insert Data In DataBase	

    $IsInsert=mysqli_query($con,"insert into testing(ProductId, ProductCode, ProductType, TheRevise, TestingPerformed, TestingRemarks, Status, ExpectedResult, Result, TestingPerformedBy)
    values('$Productid', '$ProductCode', '$ProductType', '$TheRevise', '$testingperformed', '$testingremarks', '$status', '$ExpectedResult', '$result', '$TestingPerformedBy')") or die(mysqli_error($con));
    
    if($IsInsert){
        
        header('Location: test.php');
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
        $IsDelete=mysqli_query($con, "DELETE FROM `testing` WHERE Id='$id'");
        if($IsDelete){

            header('Location: test.php');

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
        <h1 class="mt-4">Product Testing</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Product Testing</li>
                        </ol>
          <?php
          
          ?>
          <!-- search starts -->
          <div class="card mb-2">
            <div class="card-header" style="background-color:#4e73df;color:#fff;font-size:20px;">Search</div>
            <div class="card-body" style="background-color:#fff;">
              <div class="container">
                <div class="row">
                  
                      <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="search Here" oninput="search_record(this)">
                      </div>
                      
                    
                </div>
              </div>
            </div>
          </div>
        <!-- Search ends -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                List Of Product Testings  <i class="fas fa-plus" style="float: right;margin-top: 5px;" data-toggle="modal" data-target="#myModal"></i>
                            </div>

                            <!-- Modal -->
                            <div id="myModal" class="modal fade  bd-example-modal-lg" role="dialog">
                            <div class="modal-dialog modal-lg">
  
                            <!-- Modal content-->
                            <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title" style="float: left;">Add Testing Details</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="test.php" method="POST">
                                  <div class="row">
                                    <!-- col 1 -->
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="productid">Product Id:</label>
                                        <select class="form-control" onchange="myFunction()" tabindex="1" id="mySelect" name="productid">
                                          <option value="">Select One</option>
                                          <?php
                                          
                                          // Fetch Data From Database
                                          $qry=mysqli_query($con,"select * from product");
                                          while($opt=mysqli_fetch_array($qry)){
                                          ?>
                                          <option value="<?php echo $opt["Id"]?>"><?php echo $opt["Id"] . "-" . $opt["ProductName"];?></option>
                                          <?php
                                          }
                                          ?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="ProductType">Product Type:</label>
                                        <select class="form-control" onchange="myFunction()" tabindex="3" id="mySelect" name="ProductType">
                                          <option value="">Select One</option>
                                          <?php
                                          
                                          // Fetch Data From Database
                                          $qry=mysqli_query($con,"select * from product");
                                          while($opt=mysqli_fetch_array($qry)){
                                          ?>
                                          <option value="<?php echo $opt["ProductType"]?>"><?php echo $opt["ProductName"] . "-" . $opt["ProductType"];?></option>
                                          <?php
                                          }
                                          ?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="testingperformed">Testing Performed:</label>
                                        <input type="text" class="form-control" tabindex="5" placeholder="Enter Testing Perfomed" name="testingperformed">
                                      </div>
                                      <div class="form-group">
                                        <label for="status">Status:</label>
                                        <input type="text" class="form-control" tabindex="7" placeholder="Enter Status" name="status">
                                      </div>
                                      <div class="form-group">
                                        <label for="result">Result:</label>
                                        <input type="text" class="form-control" tabindex="9" placeholder="Enter Result" name="result">
                                      </div>
                                    </div>  
                                    <!-- col 2 -->
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <label for="ProductCode">Product Code:</label>
                                        <select class="form-control" onchange="myFunction()" tabindex="2" id="mySelect" name="ProductCode">
                                          <option value="">Select One</option>
                                          <?php
                                          
                                          // Fetch Data From Database
                                          $qry=mysqli_query($con,"select * from product");
                                          while($opt=mysqli_fetch_array($qry)){
                                          ?>
                                          <option value="<?php echo $opt["Id"]?>"><?php echo $opt["ProductName"] . "-" . $opt["ProductCode"];?></option>
                                          <?php
                                          }
                                          ?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="TheRevise">The Revise:</label>
                                        <input type="date" class="form-control" tabindex="4" placeholder="Enter The Revise" name="TheRevise">
                                      </div>
                                      <div class="form-group">
                                        <label for="testingremarks">Testing Remarks:</label>
                                        <input type="text" class="form-control" tabindex="6" placeholder="Enter Testing Remarks" name="testingremarks">
                                      </div>
                                      <div class="form-group">
                                        <label for="ExpectedResult">Expected Result:</label>
                                        <input type="text" class="form-control" tabindex="8" placeholder="Enter Expected Result" name="ExpectedResult">
                                      </div>
                                      <div class="form-group">
                                        <label for="TestingPerformedBy">Testing Performed By:</label>
                                        <input type="text" class="form-control" tabindex="10" placeholder="Enter Testing Performed By" name="TestingPerformedBy">
                                      </div>
                                    </div>  
                                    <div class="form-group">
                                    <input type="submit" class="btn btn-outline-dark" style="margin-left:225px;width:350px;" name="submit" value="submit">
                                  </div>
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
                                                <th>Product Id</th>
                                                <th>Product Code</th>
                                                <th>Product Type</th>
                                                <th>The Revise</th>
                                                <th>Testing Performed</th>
                                                <th>Testing Remarks</th>
                                                <th>Status</th>
                                                <th>Expected Result</th>
                                                <th>Result</th>
                                                <th>Tested By</th>
                                                <?php if($_SESSION["UserType"] == "Admin" || $_SESSION["UserType"] == "Manager" || $_SESSION["UserType"] == "Tester"){?>
                                                <th colspan="2">Actions</th>
                                                <?php }?>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">

                                        <?php
                                        
                                        // Fetch Data From Database
                                        $query=mysqli_query($con,"select * from testing");
                                        while($row=mysqli_fetch_array($query)){
                                        
                                        ?>
                                            <tr>
                                                <td><?php echo $row["Id"]?></td>
                                                <td><?php echo $row["ProductId"]?></td>
                                                <td><?php echo $row["ProductCode"]?></td>
                                                <td><?php echo $row["ProductType"]?></td>
                                                <td><?php echo $row["TheRevise"]?></td>
                                                <td><?php echo $row["TestingPerformed"]?></td>
                                                <td><?php echo $row["TestingRemarks"]?></td>
                                                <td><?php echo $row["Status"]?></td>
                                                <td><?php echo $row["ExpectedResult"]?></td>
                                                <td><?php echo $row["Result"]?></td>
                                                <td><?php echo $row["TestingPerformedBy"]?></td>
                                            <?php if($_SESSION["UserType"] == "Admin"){?>
                                                <td>
                                                <a href="test.php?DeleteId=<?php echo $row["Id"]?>">
                                                <i class="fas fa-trash-alt" style="font-size:25px;color:black;"></i>
                                                </a>
                                                </td>
                                                <td>
                                                <a href="EditTest.php?EditId=<?php echo $row["Id"]?>">
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
                                                <td><?php echo $row["ProductId"]?></td>
                                                <td><?php echo $row["ProductCode"]?></td>
                                                <td><?php echo $row["ProductType"]?></td>
                                                <td><?php echo $row["TheRevise"]?></td>
                                                <td><?php echo $row["TestingPerformed"]?></td>
                                                <td><?php echo $row["TestingRemarks"]?></td>
                                                <td><?php echo $row["Status"]?></td>
                                                <td><?php echo $row["ExpectedResult"]?></td>
                                                <td><?php echo $row["Result"]?></td>
                                                <td><?php echo $row["TestingPerformedBy"]?></td>
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
  
  <script>
    // At start, set focus on the first div
    document.getElementsByTagName('div')[0].focus();
  </script>
  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>
  
</body>

</html>


<script>
function search_record(txt)
{
  var str=txt.value;
 $.ajax({
   url:"testrecord.php?str="+str,
   success:function(res)
   {
     document.getElementById('tbody').innerHTML=res;

   }
 });
}



</script>