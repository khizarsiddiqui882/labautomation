<?php
session_start();

$con=mysqli_connect("localhost","root","","lab");
if(isset($_POST["update"]) && $_POST["update"] != ''){

    $id=$_POST["Id"];
    $Name=$_POST["ProductName"];
    $ManufacturingDate=$_POST["ManufacturingDate"];
    $SentForTesting=$_POST["SentForTesting"];

    $IsUpdate=mysqli_query($con, "update product set ProductName ='$Name', ManufacturingDate ='$ManufacturingDate', SentForTesting ='$SentForTesting'  where Id = '$id'");

if($IsUpdate)
{
    header('location:product.php');
}
else
{
    echo "not update";
}

}



?>