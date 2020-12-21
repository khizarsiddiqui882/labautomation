<?php

session_start();

// Data Connectivity

$con=mysqli_connect("localhost","root","","lab");
        ?>

        <?php

   // Edit Data In Database
        
        if(isset($_GET["EditId"])){
            $id=$_GET["EditId"];
            $res=mysqli_query($con, "select * from product where Id = $id");
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
                        <h1 class="mt-4">Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"> Product</li>
                            <li class="breadcrumb-item active"> Edit Product</li>
                        </ol>
                        
        <form action="update_product.php" method="post">
        <input type="hidden" name="Id" value="<?php echo $row['Id']?>">
        <div class="form-group">
        <label for="ProductName">Product Name:</label>
        <input type="text" class="form-control" placeholder="Enter Product Name" name="ProductName" value="<?php echo $row['ProductName']?>">
        </div>
        <div class="form-group">
        <label for="ManufacturingDate">Manufacturing Date:</label>
        <input type="date" class="form-control" placeholder="Enter Manufacturing Date" name="ManufacturingDate" value="<?php echo $row['ManufacturingDate']?>">
        </div>
        <div class="form-group">
        <label for="SentForTesting">Sent For Testing:</label>
        <input type="date" class="form-control" placeholder="Enter Sent For Testing" name="SentForTesting" value="<?php echo $row['SentForTesting']?>">
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
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>