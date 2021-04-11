<?php include('../includes/header.php') ?>


<section class="probootstrap-section probootstrap-section-sm">
            <div class="container">
            <h3 class="text-center"><b class='text-success'>ICT Manager</b></h3>
            <hr>
            <a class="text-center" href="index.php">Home</a>
            <a class="text-center" href="index.php">Logout</a>
                <div class="row">
                    <div class="col-md-12 text-center">

                    <?php

                    $id = $_GET['view'];

$sql = "SELECT * FROM request WHERE apply_id = $id";
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
    }
} else {
  echo "0 results";
}


if (isset($_GET['approve'])) {
    
    $approve_id = $_GET['approve'];
    $query = "UPDATE request SET ";
    $query .= "status  = 'approved' ";
    $query .= "WHERE apply_id = $approve_id ";

   
    $update_query = mysqli_query($conn, $query);
    header("Location: view.php?view=".$approve_id );
    
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }

}

if (isset($_GET['decline'])) {
    
    $approve_id = $_GET['decline'];
    $query = "UPDATE request SET ";
    $query .= "status  = 'declined' ";
    $query .= "WHERE apply_id = $approve_id ";

    $update_query = mysqli_query($conn, $query);
    header("Location: view.php?view=".$approve_id );
    
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}

  
?>

                        <div class="probootstrap-service-2 probootstrap-animate">
                            <div class="image">
                            <div class="image-bg">
                                <h3><?php echo $title; ?></h3>
                                <p>Status: <?php 
                                if($status === 'approved'){
                                    echo "<b class='text-success'>$status</b>";
                                }else{
                                    echo "<b class='text-danger'>$status</b>";
                                }
                                ?></p>
                            </div>
                            </div>
                            <div class="text">
                            <span class="probootstrap-meta"><i class="icon-calendar2"></i> <?php echo $date; ?></span>
                            <h3><?php echo $job; ?></h3>
                            <p><?php echo $supply; ?>.</p>
                            <p><a href="view.php?approve=<?php echo $apply_id ?>" class="btn btn-primary">Approve</a>
                            <a href="view.php?decline=<?php echo $apply_id ?>" class="btn btn-danger">Decline</a>
                            </p>
                           
                            </div>
                        </div>

                      
                   
                    </div>
                </div>
            </div>


        </section>

    </div>


<?php include('../includes/footer.php') ?>