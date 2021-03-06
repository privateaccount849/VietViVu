<?php
include("./layout/header.php");
if(!in_array("Admin", $_SESSION["RoleName"])){
    echo "<script>window.open('NotFound.php','_self')</script>";
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tours Management</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="./Tours/createTour.php" class="btn btn-primary">Create</a>
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
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 139.075px;">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 97.4375px;">Images</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 40.3125px;">Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 91.6px;">Start Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 81.2875px;">End Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 81.2875px;">Rate</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 81.2875px;">Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    require_once './common/Paginator.class.php';

                                    require_once("../connect.php");

                                    $limit      = (isset($_GET['limit'])) ? $_GET['limit'] : 10;
                                    $page       = (isset($_GET['page'])) ? $_GET['page'] : 1;
                                    $links      = (isset($_GET['links'])) ? $_GET['links'] : 7;
                                    $query      = "SELECT * FROM `tours`";

                                    $Paginator  = new Paginator($con, $query);

                                    $results    = $Paginator->getData($limit, $page);
                                    function currency_format($number, $suffix = 'USD')
                                    {
                                        if (!empty($number)) {
                                            return number_format($number, 0, ',', '.') . "$";
                                        }
                                    }
                                    ?>


                                    <?php for ($i = 0; $i < count($results->data); $i++) : ?>
                                        <tr>
                                            <td><?php echo $results->data[$i]['Name']; ?></td>
                                            <td><img style="height: 80px; with: 80px;" src="./upload/<?php echo $results->data[$i]['Image']; ?>" alt=""></td>
                                            <td><?php echo currency_format($results->data[$i]['Price']); ?></td>
                                            <td><?php echo $results->data[$i]['StartDate']; ?></td>
                                            <td><?php echo $results->data[$i]['EndDate']; ?></td>
                                            <td><?php echo $results->data[$i]['Rate']; ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Menu
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="Tours/updateTour.php?id=<?php echo $results->data[$i]['Id']; ?>">Update</a>
                                                        <a class="dropdown-item" href="Tours/updateTourHotels.php?id=<?php echo $results->data[$i]['Id']; ?>">Update Hotels</a>
                                                        <a class="dropdown-item" href="index.php?delete=<?php echo $results->data[$i]['Id']; ?>">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php
                                            if (isset($_GET['delete'])) {
                                                $TourId = $_GET['delete'];
                                                $sql = "delete from tours where Id=$TourId"; //xoa tour theo id
                                                $result = mysqli_query($con, $sql);

                                                if ($result) {
                                                    echo "<script>alert('Tour has been deleted successful!')</script>";
                                                    echo "<script>window.open('index.php','_self')</script>";
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