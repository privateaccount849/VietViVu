<?php
include("../layout/header.php");
require_once("../../connect.php");

$result = $con->query("SELECT * FROM `hotels` left join tourhotels on hotels.IdHotel = tourhotels.HotelId left join tours on tourhotels.TourId = tours.Id");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tours Management</h6>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <?php 
                        while ($row = mysqli_fetch_array($result)) {
                            if($row['TourId']!==null){
                                echo "
                                <div class='form-check'>
                                <input class='form-check-input' name='HotelName[ ]' checked type='checkbox' value='$row[IdHotel]'>
                                <label class='form-check-label'>$row[HotelName] </label>
                              </div>
                              ";
                            }
                            else{
                                echo "
                                <div class='form-check'>
                                <input class='form-check-input' name='HotelName[ ]' type='checkbox' value='$row[IdHotel]'>
                                <label class='form-check-label'>$row[HotelName] </label>
                              </div>
                              ";
                            }
                        }
                        ?>
                </div>
                <button name="update" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST["update"])) {
    if(!empty($_POST['HotelName'])){
        echo $_POST['HotelName'];
        $checkbox1 = $_POST['HotelName'];  
        var_dump($checkbox1);
        $con->query("DELETE FROM `tourhotels` WHERE TourId=$_GET[id]");
        for ($i=0; $i<sizeof ($checkbox1);$i++) { 
            if(isset($checkbox1) != ""){
            $query="INSERT INTO `tourhotels`(`HotelId`, `TourId`) VALUES ('$checkbox1[$i]','$_GET[id]')";
            $con->query($query);
            }  
            
            }  
            echo "<script>alert('Tour has been Update successful!')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
    }
}

?>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php
include("../layout/footer.php")
?>

