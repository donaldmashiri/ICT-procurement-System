<?php include('../includes/header.php') ?>


<section class="probootstrap-section probootstrap-section-sm">
            <div class="container">
            <h3 class="text-center"><b class='text-info'>ICT Department</b></h3>
            <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div  class="panel panel-body">
                            <ul class="probootstrap-side-menu">
                            <li><a  href="index.php">Home</a></li>
                                <li><a  href="apply.php">Application</a></li>
                                <li><a  href="feedback.php">Feedback</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9 text-center">
                        <table class="table table-condensed">
                        <thead>
                            <tr>
                            <th scope="">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Job</th>
                            <th scope="col">Date</th>
                            <th scope="col">Supply</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
<?php

if (isset($_GET['req'])) {
    
    $req = $_GET['req'];
    $query = "UPDATE request SET ";
    $query .= "quotation  = 'requested' ";
    $query .= "WHERE apply_id = $req ";

    $update_query = mysqli_query($conn, $query);
    header("Location: feedback.php");
    
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}


$sql = "SELECT * FROM request";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $apply_id = $row["apply_id"];
      $title = $row["title"];
      $job = $row["job"];
      $date = $row["date"];
      $supply = $row["supply"];
      $status = $row["status"];
  
?>
                            <tr>
                            <th scope="row"><?php echo $apply_id; ?></th>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $job; ?></td>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $supply; ?></td>
                            <td><?php
                           if($status === 'approved'){
                            echo "<b class='text-success'>$status</b>";
                            echo "<a href='index.php?req=$apply_id' class='btn btn-primary'>request quotation</a>";
                        }else{
                            echo "<b class='text-danger'>$status</b>";
                        }
                             
                             ?></td>


                            </tr>

                            <?php 
                             }
                            } else {
                              echo "0 results";
                            }
                            $conn->close();

                            ?>

                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </div>


<?php include('../includes/footer.php') ?>