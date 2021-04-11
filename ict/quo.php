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
                                <li><a  href="index.php">Application</a></li>
                                <li><a  href="feedback.php">Feedback</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9 text-center">

                   
                       <div class="row">

<?php 

$id = $_GET['quo'];

$sql = "SELECT * FROM request WHERE apply_id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //   $request_id = $row["request_id"];
    //   $supplier_id = $row["supplier_id"];
    //   $quo_title = $row["quo_title"];
    //   $quo_title = $row["quo_title"];

     
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

<p class="text-primary"><strong>Comparison of the suppliers quotations</strong></p>




<?php 

$id = $_GET['quo'];

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
      $quo_description = $row["quo_description"];

    
?>
                           <div class="col-md-6">
                                <div style="border-style: ridge;" class="card">
                                    <div class="card-header text-danger"><strong>Supplier : <?php echo $supplier_id. ' : '. $supplier_name; ?></strong></div>
                                    <hr>
                                    <div class="card-body">
                                    <p class="text-info">Title : <?php echo $quo_title; ?></p>
                                        <small style="margin-top:-10px">Description: <?php echo $quo_description; ?></small>  
                                 </div>

                                 <div class="form-group">
                              <br>
                              <form action="" method="POST">
                              <input type="hidden" name="sup_id" value="<?php echo $supplier_id ?>">
                                 <input type="hidden" name="req_id" value="<?php echo $request_id ?>">
                                    <!-- <a href="quo.php?select=<?php // echo $supplier_id ?>" class="btn btn-danger">Select this supplier</a> -->

                                    <button class="btn btn-danger" type="submit" name="submit">Select this supplier</button>

                                    </form>
                                </div>



                                </div>
                           </div>
<?php }
} else {
    echo "No Supplier send a Quotation yet";
}   ?>
                       </div>


                       <?php

if (isset($_POST['submit'])) {

    $sup_id = $_POST['sup_id'];   
    $req_id = $_POST['req_id'];

    // echo $sup_id;
    // echo $request_id;


        $query = "UPDATE quotation SET ";
        $query .= "quo_status  = '{$sup_id}' ";
        $query .= "WHERE request_id = $req_id ";
    
        $update_query = mysqli_query($conn, $query);
        header("Location: feedback.php" );
    
        if (!$update_query) {
            die("Query failed" . mysqli_error($conn));
        }
    
    }




?>



                   
                      



                    </div>
                </div>
            </div>
    </section>
</div>


<?php include('../includes/footer.php') ?>