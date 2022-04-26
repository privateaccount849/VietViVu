<?php
include("../layout/header.php")
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tours Management</h6>
        </div>
        <div class="card-body">
            <form method="POST"  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Name">Tour Name</label>
                    <input required type="text" class="form-control" name="Name" id="Name" placeholder="TourName">
                </div>
                <div class="form-group">
                    <label for="Image">Image</label>
                    <input type="file" class="form-control" name="Image[]" id="Image" placeholder="Image">
                </div>
                <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control" name="Description" id="Description" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <label for="Price">Price</label>
                    <input required type="number" class="form-control" name="Price" id="Price" placeholder="Price">
                </div>

                <div class="form-group">
                    <label for="Address">Address</label>
                    <input required type="text" class="form-control" name="Address" id="Address" placeholder="Enter your Address of Tour">
                </div>
                <div class="form-group">
                    <label for="SortTitle">SortTitle</label>
                    <input required type="text" class="form-control" name="SortTitle" id="SortTitle" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="StartDate">Start Date</label>
                    <input required type="Date" class="form-control" name="StartDate" id="StartDate">
                </div>
                <div class="form-group">
                    <label for="EndDate">End Date</label>
                    <input required type="Date" class="form-control" name="EndDate" id="EndDate">
                </div>
                <div class="form-group">
                    <label for="Rate">Rate</label>
                    <input type="number" min="0" max="5" class="form-control" name="Rate" id="Rate">
                </div>
                <button name="createTour" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>


<?php
if (isset($_POST["createTour"])) {
    require_once("../../connect.php");

    $Name = $_POST["Name"];
    $Description = $_POST["Description"];
    $Price = $_POST["Price"];
    $Address = $_POST["Address"];
    $SortTitle = $_POST["SortTitle"];
    $StartDate = $_POST["StartDate"];
    $EndDate = $_POST["EndDate"];
    $Rate = $_POST["Rate"];


    $output_dir = "../upload/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['Image']['name'][0]));
	$ImageType      = $_FILES['Image']['type'][0];
 
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt       = str_replace('.','',$ImageExt);
	$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;
	
	/* Try to create the directory if it does not exist */
	if (!file_exists($output_dir))
	{
		@mkdir($output_dir, 0777);
	}               

    move_uploaded_file($_FILES["Image"]["tmp_name"][0],$output_dir."/".$NewImageName );
    if(isset($NewImageName)){
        $sql = "INSERT INTO `tours`( `Name`, `Description`, `Image`, `Price`, `StartDate`, `EndDate`, `Address`, `SortTitle`,`Rate`) 
        VALUES ('$Name','$Description','$NewImageName','$Price','$StartDate','$EndDate', '$Address', '$SortTitle','$Rate')";
       
        if ($con->query($sql) === TRUE) {
            echo "New Tour created successfully";
            echo "<script>window.open('../index.php','_self')</script>";
            
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