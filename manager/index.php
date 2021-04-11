<?php include('../includes/header.php') ?>


<section class="probootstrap-section probootstrap-section-sm">
            <div class="container">
            <h3 class="text-center"><b class='text-success'>ICT Manager</b></h3>
            <hr>
            <a class="text-center" href="index.php">Home</a>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <table class="table table-condensed">
                        <thead>
                            <tr>
                            <th scope="">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Job</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
<?php

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
                            <td> <a href="view.php?view=<?php echo $apply_id; ?>">view</a> </td>  
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