<?php
include("../layout/header.php")
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class='card shadow mb-4'>
        <div class='card-header py-3'>
            <h6 class='m-0 font-weight-bold text-primary'>Hotels Management</h6>
        </div>
        <div class='card-body'>
            <form method='POST' enctype='multipart/form-data'>
                <div class='form-group'>
                    <label for='Name'>Hotel Name</label>
                    <input type='text' class='form-control' name='Name' id='Name' placeholder='Hotel Name'>
                </div>
                <div class='form-group'>
                    <label for='Image'>Image</label>
                    <input type='file' class='form-control' name='Image[]' id='Image' placeholder='Image'>
                </div>
                <div class='form-group'>
                    <label for='Description'>Description</label>
                    <textarea class='form-control' name='Description' id='Description' placeholder='Description'></textarea>
                </div>
                <div class='form-group'>
                    <label for='Address'>Address</label>
                    <input type='text' class='form-control' name='Address' id='Address' placeholder='Address'>
                </div>
                <div class='form-group'>
                    <label for='Price'>Price</label>
                    <input type='number' class='form-control' name='Price' id='Price' placeholder='Price'>
                </div>
                <div class='form-group'>
                    <label for='SortTitle'>SortTitle</label>
                    <input type='text' class='form-control' name='SortTitle' id='SortTitle' placeholder='SortTitle'>
                </div>
                <div class='form-group'>
                    <label for='Rate'>Rate</label>
                    <input type='number' min="0" max="5" class='form-control' name='Rate' id='Rate' placeholder='Rate'>
                </div>
                <div class='form-group'>
                    <select class='form-control form-control-sm' name='type'>
                        <option value="0">Single bed room</option>
                        <option value="1">Twin bed room</option>
                    </select>
                </div>
                <div class='form-group'>
                    <select class='form-control form-control-sm' name='Meal'>
                        <option value="0">Breakfast</option>
                        <option value="1">Lunch</option>
                        <option value="2">Dinner</option>
                    </select>
                </div>

                <button name='createHotel' type='submit' class='btn btn-primary'>Create</button>
            </form>
        </div>
    </div>

</div>


<?php

if (isset($_POST["createHotel"])) {
    require_once("../../connect.php");

    $Name = $_POST["Name"];
    $Description = $_POST["Description"];
    $Price = $_POST["Price"];
    $Address = $_POST["Address"];
    $type = $_POST["type"];
    $Rate = $_POST["Rate"];
    $Title = $_POST["SortTitle"];
    $Meal = $_POST["Meal"];

    $output_dir = "../upload/";/* Path for file upload */
    $RandomNum   = time();
    $ImageName      = str_replace(' ', '-', strtolower($_FILES['Image']['name'][0]));
    $ImageType      = $_FILES['Image']['type'][0];

    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt       = str_replace('.', '', $ImageExt);
    $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName = $ImageName . '-' . $RandomNum . '.' . $ImageExt;
    $ret[$NewImageName] = $output_dir . $NewImageName;

    /* Try to create the directory if it does not exist */
    if (!file_exists($output_dir)) {
        @mkdir($output_dir, 0777);
    }

    move_uploaded_file($_FILES["Image"]["tmp_name"][0], $output_dir . "/" . $NewImageName);
    if (isset($NewImageName)) {
        $sql = "INSERT INTO `hotels`(`HotelName`, `HotelDescription`, `HotelPrice`, `HotelImage`, `type`, `HotelRate`, `HotelSortTitle`, `HotelAddress`,`Meal`) 
        VALUES ('$Name','$Description','$Price','$NewImageName','$type', '$Rate', '$Title', '$Address','$Meal')";

        if ($con->query($sql) === TRUE) {
            echo "New Tour created successfully";
            echo "<script>window.open('../hotels.php','_self')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }


    $con->close();
}


?>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
include("../layout/footer.php")
?>

<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/decoupled-document/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#Description'))
        .catch(error => {
            console.error(error);
        });
</script>