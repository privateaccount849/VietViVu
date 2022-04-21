<?php
include("../layout/header.php");
require_once("../../connect.php");

if (isset($_GET["id"])) {
    $result = $con->query("SELECT * FROM `hotels` WHERE IdHotel = $_GET[id]");
    while ($row = mysqli_fetch_array($result)) {
        if ($row['type'] == 0) {
            $typee = '<option selected value=0>Single bed room</option><option value=1>Twin bed room</option>';
        } else {
            $typee = '<option value=0>Single bed room</option><option selected value=1>Twin bed room</option>';
        }
        echo "
       <div class='container-fluid'>
       
           <div class='card shadow mb-4'>
               <div class='card-header py-3'>
                   <h6 class='m-0 font-weight-bold text-primary'>Hotels Management</h6>
               </div>
               <div class='card-body'>
                   <form method='POST' enctype='multipart/form-data'>
                       <div class='form-group'>
                           <label for='Name'>Hotel Name</label>
                           <input value=' $row[HotelName]' type='text' class='form-control' name='Name' id='Name' placeholder='Hotel Name'>
                       </div>
                       <div class='form-group'>
                           <label for='Image'>Image</label>
                           <input type='file' class='form-control' name='Image[]' id='Image' placeholder='Image'>
                           <img style= 'height:80px' src='../upload/$row[HotelImage]' />
                       </div>
                       <div class='form-group'>
                           <label for='Description'>Description</label>
                           <textarea class='form-control' name='Description' id='Description' placeholder='Description'>$row[HotelDescription]</textarea>
                       </div>
                       <div class='form-group'>
                           <label for='Price'>Price</label>
                           <input value='$row[HotelPrice]' type='number' class='form-control' name='Price' id='Price' placeholder='Price'>
                       </div>
                       

                       <div class='form-group'>
                       <label for='Rate'>Rate</label>
                       <input value=' $row[HotelRate]' type='number' class='form-control' name='Rate' id='Rate' placeholder='Hotel Rate'>
                   </div>
                   <div class='form-group'>
                       <label for='Address'>Address</label>
                       <input value=' $row[HotelAddress]' type='text' class='form-control' name='Address' id='Address' placeholder='Hotel Address'>
                   </div>
                   <div class='form-group'>
                           <label for='SortTile'>Title</label>
                           <input value=' $row[HotelSortTitle]' type='text' class='form-control' name='SortTile' id='SortTile' placeholder='Hotel Tile'>
                       </div>
                       
                       <div class='form-group'>
                       <label for='SortTile'>Type Room</label>
                       <select class='form-control form-control-sm' name='type' >
                       $typee
                       </select>
                       </div>
                       <button name='updateTour' type='submit' class='btn btn-primary'>Update</button>
                   </form>
               </div>
           </div>
       
       </div>
       ";
    }
}
?>

<?php

if (isset($_POST["updateTour"])) {

    $Name = $_POST["Name"];
    $Description = $_POST["Description"];
    $Price = $_POST["Price"];
    $type = $_POST["type"];

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
    echo $_FILES['Image']['type'][0];
    move_uploaded_file($_FILES["Image"]["tmp_name"][0], $output_dir . "/" . $NewImageName);
    if (!empty($_FILES['Image']['type'][0])) {
        $sql = "UPDATE `hotels` SET `HotelName`='$Name',`HotelDescription`='$Description',
        `HotelImage`='$NewImageName',`HotelPrice`='$Price',
        `type`='$type' WHERE Id = $_GET[id]";
        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Tour has been Update successful!')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    } else {
        $sql = "UPDATE `hotels` SET `HotelName`='$Name',`HotelDescription`='$Description',
        `HotelPrice`='$Price',`type`='$type'
        WHERE IdHotel = $_GET[id]";
        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Hotel has been Update successful!')</script>";
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