<?php
session_start();

// Data Connectivity

$con=mysqli_connect("localhost","root","","lab");
        ?>

        <?php

   // Edit Data In Database
        
        if(isset($_GET["EditId"])){
            $id=$_GET["EditId"];
            $res=mysqli_query($con, "select * from testing where Id = $id");
            $row=mysqli_fetch_array($res);
            
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
                                <h1 class="mt-4">Test</h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active"> Test</li>
                                    <li class="breadcrumb-item active"> Edit Test</li>
                                </ol>
                                
                        <form action="update_Test.php" method="post">
                        <input type="hidden" name="Id" value="<?php echo $row['Id']?>">
                        <div class="form-group">
                            <label for="ProductId">Product Id:</label>
                            <input type="text" class="form-control" placeholder="Enter Product Id" name="ProductId" value="<?php echo $row['ProductId']?>">
                        </div>
                        <div class="form-group">
                            <label for="ProductCode">Product Code:</label>
                            <input type="text" class="form-control" placeholder="Enter Product Code" name="ProductCode" value="<?php echo $row['ProductCode']?>">
                        </div>
                        <div class="form-group">
                            <label for="ProductType">Product Type:</label>
                            <input type="text" class="form-control" placeholder="Enter Product Type" name="ProductType" value="<?php echo $row['ProductType']?>">
                        </div>
                        <div class="form-group">
                            <label for="TheRevise">The Revise:</label>
                            <input type="text" class="form-control" placeholder="Enter The Revise" name="TheRevise" value="<?php echo $row['TheRevise']?>">
                        </div>
                        <div class="form-group">
                            <label for="TestingPerformed">Testing Performed:</label>
                            <input type="text" class="form-control" placeholder="Enter Testing Performed" name="TestingPerformed" value="<?php echo $row['TestingPerformed']?>">
                        </div>
                        <div class="form-group">
                            <label for="TestingRemarks">Testing Remarks:</label>
                            <input type="text" class="form-control" placeholder="Enter Testing Remarks" name="TestingRemarks" value="<?php echo $row['TestingRemarks']?>">
                        </div>
                        <div class="form-group">
                            <label for="Status">Status:</label>
                            <input type="text" class="form-control" placeholder="Enter Status" name="Status" value="<?php echo $row['Status']?>">
                        </div>
                        <div class="form-group">
                            <label for="ExpectedResult">Expected Result:</label>
                            <input type="text" class="form-control" placeholder="Enter Expected Result" name="ExpectedResult" value="<?php echo $row['ExpectedResult']?>">
                        </div>
                        <div class="form-group">
                            <label for="Result">Result:</label>
                            <input type="text" class="form-control" placeholder="Enter Result" name="Result" value="<?php echo $row['Result']?>">
                        </div>
                        <div class="form-group">
                            <label for="TestingPerformedBy">Tested By:</label>
                            <input type="text" class="form-control" placeholder="Enter Testing Performed By" name="TestingPerformedBy" value="<?php echo $row['TestingPerformedBy']?>">
                        </div>
                            <input type="submit" class="btn btn-default" name="update" value="update">
                        </form>

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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are You Sure You Want To Logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/chart-area-demo.js"></script>
  <script src="assets/js/demo/chart-pie-demo.js"></script>

    </body>
</html>