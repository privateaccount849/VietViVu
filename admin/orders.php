<?php
include("./layout/header.php")
?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Orders Management</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                       
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Full Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Address</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Phone Number</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Note</th>  
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Time</th>  
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Total bill</th>  
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Status</th>  
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" >Action</th>  

                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    require_once './common/Paginator.class.php';

                                    require_once("../connect.php");

                                    $limit      = (isset($_GET['limit'])) ? $_GET['limit'] : 10;
                                    $page       = (isset($_GET['page'])) ? $_GET['page'] : 1;
                                    $links      = (isset($_GET['links'])) ? $_GET['links'] : 7;
                                    $query      = "SELECT * FROM `orders` ORDER BY createAt DESC";

                                    $Paginator  = new Paginator($con, $query);

                                    $results    = $Paginator->getData($limit, $page);
                                    function currency_format($number, $suffix = 'USD')
                                    {
                                        if (!empty($number)) {
                                            return number_format($number, 0, ',', '.') . "{$suffix}";
                                        }
                                    }
                                    ?>


                                    <?php for ($i = 0; $i < count($results->data); $i++) : ?>
                                        <tr>
                                            <td><?php echo $results->data[$i]['FirstName'] .' '. $results->data[$i]['LastName']; ?></td>
                                            <td><?php echo $results->data[$i]['Address']; ?></td>
                                            <td><?php echo $results->data[$i]['PhoneNumber']; ?></td>
                                            <td><?php echo $results->data[$i]['Email']; ?></td>
                                            <td><?php echo $results->data[$i]['Note']; ?></td>
                                            <td><?php echo $results->data[$i]['createAt']; ?></td>
                                            <td><?php echo round( $results->data[$i]['Total']/2300000); ?>$</td>
                                            <td>
                                                <?php 
                                                if($results->data[$i]['Status']==1){
                                                    echo "Completly Payment";
                                                }
                                                else{
                                                    echo "Unpaid";
                                                }
                                            ?>
                                            </td>
                                            <td>
                                            <a class="btn btn-primary" href="orders.php?delete=<?php echo $results->data[$i]['Id']; ?>">Delete</a>
                                            </td>
                                            <?php
                                            if (isset($_GET['delete'])) {
                                                $Id = $_GET['delete'];
                                                $sql = "delete from orders where Id=$Id";
                                                $result = mysqli_query($con, $sql);

                                                if ($result) {
                                                    echo "<script>alert('News has been deleted successful!')</script>";
                                                    echo "<script>window.open('orders.php','_self')</script>";
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