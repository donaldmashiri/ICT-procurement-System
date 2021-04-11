<?php include('../includes/header.php') ?>


<section class="probootstrap-section probootstrap-section-sm">
            <div class="container">
            <h3 class="text-center"><b class='text-dark'>ICT Procurement</b></h3>
            <hr>
            <a class="text-center" href="index.php">Home</a>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <table class="table table-condensed">
                        <thead>
                            <tr>
                            <th scope="">#</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Title</th>
                            <th scope="col">Amount</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
<?php

// $sql = "SELECT * FROM request WHERE select_status = 'not seleted'";

// $sql = "SELECT * FROM quotation JOIN supplier ON quotation.supplier_id = supplier.sup_id WHERE request_id = quo_status";
$sql = "SELECT * FROM quotation JOIN supplier ON quotation.supplier_id = supplier.sup_id WHERE supplier_id = quo_status";
$result = $conn->query($sql);

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

      $quo_description = $row["quo_description"];

    
?>
                            <tr>
                            <th scope="row"><?php echo $quo_id; ?></th>
                            <th><?php echo $supplier_name; ?></th>
                            <th><?php echo $quo_title; ?></th>
                             <th>$<?php echo $quo_amount; ?></th>
                            <td> <a href="view.php?view=<?php echo $request_id ?>" class="btn btn-info">View</a> </td>  
                            </tr>

                            <?php 
                             }
                            } else {
                              echo "0 results";
                            }
                          
                            ?>

                        </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </section>

    </div>


<?php include('../includes/footer.php') ?>