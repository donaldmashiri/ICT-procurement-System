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

                    <form action="" method="post" class="probootstrap-form">
                       <div class="row">

<?php 

$sql = "SELECT * FROM request WHERE quotation = 'requested'";
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
      $quotation = $row["quotation"];
  
?>

                           <div class="col-md-6">
                                <div style="border-style: ridge;" class="card">
                                    <div class="card-header">Title : <?php echo $title; ?></div>
                                    <div class="card-body">
                                        <small>Description: <?php echo $job; ?></small>
                                        <h6>Quotation Status : <?php echo "<b class='text-success'>$quotation</b>"; ?> </h6>

                                        <!-- <h6>Feed back Status : <?php //echo "<b class='text-success'>$quotation</b>"; ?> </h6> -->

                                        <a href="quo.php?quo=<?php echo $apply_id; ?>" class="btn-secondary">view quotations</a>
                                    </div>
                                </div>
                           </div>

    <?php 
        }
    } else {
        echo "0 results";
    }
    $conn->close();

    ?>

                           
                       </div>
                    </form>
                    </div>
                </div>
            </div>
    </section>
</div>


<?php include('../includes/footer.php') ?>