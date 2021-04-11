<?php include('../includes/header.php') ?>


<section class="probootstrap-section probootstrap-section-sm">
            <div class="container">
            <h3 class="text-center"><b class='text-dark'>ICT Procurement</b></h3>
            <hr>
            <a class="text-center" href="index.php">Home</a>
            <!-- <a class="text-center" href="index.php">Logout</a> -->
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

 
?>

<table class="table" border="1">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ref#</th>
      <th scope="col">Title</th>
      <th scope="col">job</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">ICT00<?php echo $apply_id; ?></th>
      <th><?php echo $title; ?></th>
      <th><?php echo $job; ?></th>
     
    </tr>
  
  </tbody>
</table>

<ul class="list-group">
  <li class="list-group-item">Description : <?php echo $supply; ?> </li>
</ul>



<?php

$id = $_GET['view'];

$sql = "SELECT * FROM quotation JOIN supplier ON quotation.supplier_id = supplier.sup_id WHERE request_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    $quo_id = $row["quo_id"];
    $request_id = $row["request_id"];
    $supplier_id = $row["supplier_id"];
    $supplier_name = $row["supplier_name"];

    $quo_title = $row["quo_title"];
    $quo_amount = $row["quo_amount"];
    $order_status = $row["order_status"];

    $quo_description = $row["quo_description"];
}
} else {
echo "0 results";
}


?>


<ul class="list-group">
  <li class="list-group-item text-danger"> <strong> Supplier : <?php echo $supplier_name; ?> </strong></li>
</ul>

                   
                       <div class="row">
                        <table class="table" border="1">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">ref#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Amount</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">ICT00<?php echo $quo_id; ?></th>
                                <th><?php echo $quo_title; ?></th>
                                <th><?php echo $quo_description; ?></th>
                                <th>$<?php echo $quo_amount; ?></th>
                                
                                </tr>
                            
                            </tbody>
                        </table>
                       </div>
                  


    <?php

if (isset($_POST['submit'])) {
    
    $query = "UPDATE quotation SET ";
    $query .= "order_status  = 'ORDERED' ";
    $query .= "WHERE request_id = $request_id ";

   
    $update_query = mysqli_query($conn, $query);
    header("Location: view.php?view=".$request_id );
    
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }

}


?>

                    <form action="" method="post" class="probootstrap-form">
                <ul class="list-group">
                <li class="list-group-item text-info"> <strong> order status : 
                <?php
                if($order_status === 'ORDERED'){
                    echo "<b class='text-success'>$order_status</b>";
                }
                ?> </strong></li>
                        <div class="form-group">
                                    <input type="submit" class="btn btn-warning" id="submit" name="submit" value="Send Order">
                        </div>

                </ul>
                </form>



                   
                    </div>
                </div>
            </div>


        </section>

    </div>



<?php

if (isset($_GET['select'])) {
    
    $select_id = $_GET['select'];
    $query = "UPDATE quotation SET ";
    $query .= "quo_status  = '{$supplier_id}' ";
    $query .= "WHERE request_id = $request_id ";
    
    $update_query = mysqli_query($conn, $query);
    header("Location: quo.php?quo=".$request_id );
    
    if (!$update_query) {
        die("Query failed" . mysqli_error($conn));
    }
}

?>


<?php include('../includes/footer.php') ?>