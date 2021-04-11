<?php include('../includes/header.php');

$sql = "SELECT * FROM supplier WHERE sup_id = '{$_SESSION['sup_id']}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      $sup_id = $row["sup_id"];
      $supplier_name = $row["supplier_name"];

    }
}

?>



<section class="probootstrap-section probootstrap-section-sm">
            <div class="container">
            <h3 class="text-center"><b class='text-success'>Supplier <?php echo $sup_id. ' : ' . $supplier_name;?> </b></h3>
            <hr>
            <a class="text-center" href="index.php">Home</a>
            <a class="text-center" href="../index.php">Logout</a>
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

if(isset($_POST['send'])){

    $quo_title = $_POST['quo_title'];
    $quo_description = $_POST['quo_description'];
    $quo_amount = $_POST['quo_amount'];


    
    $sql = "INSERT INTO quotation (request_id, supplier_id, quo_title, quo_description, quo_amount)
    VALUES ({$apply_id}, {$sup_id}, '{$quo_title}', '{$quo_description}', '{$quo_amount}')";
    
    if ($conn->query($sql) === TRUE) {
      echo "<p class='text-success'>Your quotation request was successfully</p>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}

?>


                    <form action="" method="post" class="probootstrap-form">
                       <div class="row">
                           <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="quo_title" placeholder="Title">
                            </div>
                           </div>
                           <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="quo_amount" placeholder="Amount">
                            </div>
                           </div>
                          
                           <div class="col-md-12">
                            <div class="form-group">
                                <textarea cols="30" rows="10" class="form-control" name="quo_description" placeholder="Material You can supply"></textarea>
                            </div>
                           </div>
                           <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success btn-lg" id="submit" name="send" value="Send Quotaion">
                                </div>
                            </div>
                       </div>
                    </form>



                      
                   
                    </div>
                </div>
            </div>


        </section>

    </div>


<?php include('../includes/footer.php') ?>