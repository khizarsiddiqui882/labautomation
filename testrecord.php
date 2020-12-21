<?php
$con=mysqli_connect("localhost","root","","lab");


if(isset($_GET["str"]))
{
    $str=$_GET['str'];
    $query=mysqli_query($con,"select * from testing where ProductId like '%$str%' or ProductCode like '%$str%' or ProductType like '%$str%' or TestingPerformed like '%$str%' or TestingRemarks like '%$str%' or TheRevise like '%$str%' or TestingPerformedBy like '%$str%' or Result like '%$str%'");

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
                <td>
                <a href="test.php?DeleteId=<?php echo $row["Id"]?>">
                <i class="fas fa-trash-alt" style="font-size:25px;color:black;"></i>
                </a>
                </td>
                <td>
                <a href="EditTest.php?EditId=<?php echo $row["Id"]?>">
                <i class="fas fa-edit" style="font-size:25px;color:black;"></i>
                </td>
            </tr>
            <?php
        }

}


?>