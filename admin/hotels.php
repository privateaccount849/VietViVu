<?php
include("./layout/header.php")
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Hotels Management</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="./Hotels/createHotel.php" class="btn btn-primary">Create</a>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 245px;">Hotel Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 81.2875px;"><center>Price</center></th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 81.2875px;"><center>Image</center></th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 97.4375px;"><center>Type Room</center></th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 81.2875px;"><center>Address</center></th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 97.4375px;"><center>Menu</center></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    require_once './common/Paginator.class.php';

                                    require_once("../connect.php");

                                    $limit      = (isset($_GET['limit'])) ? $_GET['limit'] : 10;
                                    $page       = (isset($_GET['page'])) ? $_GET['page'] : 1;
                                    $links      = (isset($_GET['links'])) ? $_GET['links'] : 7;
                                    $query      = "SELECT * FROM `hotels`";

                                    $Paginator  = new Paginator($con, $query);

                                    $results    = $Paginator->getData($limit, $page);

                                    ?>
                                    <?php for ($i = 0; $i < count($results->data); $i++) : ?>
                                        <tr>
                                            <td><?php echo $results->data[$i]['HotelName']; ?></td>
                                            <td><?php echo $results->data[$i]['HotelPrice']; ?></td>
                                            <td><center><img style="height: 80px; width: 120px;" src="upload/<?php echo $results->data[$i]['HotelImage']; ?>" /></center></td>
                                            <td>
                                                <?php 
                                                if($results->data[$i]['type']==0){
                                                    echo "Single bed room";
                                                }
                                                else{
                                                    echo"Twin bed room";
                                                }
                                            ?>
                                            </td>
                                            
                                            <td><?php echo $results->data[$i]['HotelAddress']; ?></td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Menu
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="Hotels/updateHotel.php?id=<?php echo $results->data[$i]['IdHotel']; ?>">Update</a>
                                                        <a class="dropdown-item" href="hotels.php?delete=<?php echo $results->data[$i]['IdHotel']; ?>">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php
                                            if (isset($_GET['delete'])) {
                                                $HotelId = $_GET['delete'];
                                                $sql = "delete from hotels where Id=$HotelId";
                                                $result = mysqli_query($con, $sql);

                                                if ($result) {
                                                    echo "<script>alert('Hotel has been deleted successful!')</script>";
                                                    echo "<script>window.open('hotels.php','_self')</script>";
                                                } else {
                                                    echo "<script>alert('Error')</script>";
                                                }
                                            }
                                            ?>
                                        </tr>

                                    <?php endfor; ?>
                                </tbody>

                            </table>
                            <nav aria-label="Page navigation example">
                                <?php echo $Paginator->createLinks($links, 'pagination pagination-sm'); ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include("./layout/footer.php")
?>