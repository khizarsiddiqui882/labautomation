<?php
$con=mysqli_connect("localhost","root","","lab");
if(isset($_POST["update"]) && $_POST["update"] != ''){
    print_r($_POST);

    $id = $_POST ["Id"];
    $ProductId = $_POST ["ProductId"];
    $ProductCode = $_POST ["ProductCode"];
    $TestingPerformed = $_POST ["TestingPerformed"];
    $TestingRemarks = $_POST ["TestingRemarks"];
    $Status = $_POST ["Status"];
    $Result = $_POST ["Result"];

    $IsUpdate=mysqli_query($con, "update testing set ProductId ='$ProductId', ProductCode ='$ProductCode', TestingPerformed ='$TestingPerformed' , TestingRemarks ='$TestingRemarks', Status ='$Status', Result ='$Result'  where Id = '$id'");

if($IsUpdate)
{
    header('location:Test.php');
}
else
{
    echo "not update";
}

}



?>