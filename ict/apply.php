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

<?php

if(isset($_POST['apply'])){

    $title = $_POST['title'];
    $job = $_POST['job'];
    $date = $_POST['date'];
    $supply = $_POST['supply'];
    $status = "not approved";

    
    $sql = "INSERT INTO request (title, job, date, supply, status)
    VALUES ('{$title}', '{$job}', '{$date}', '{$supply}', '{$status}')";
    
    if ($conn->query($sql) === TRUE) {
      echo "<p class='text-success'>Your application successfully</p>";
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
                                <input type="text" class="form-control" name="title" placeholder="Title">
                            </div>
                           </div>
                           <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="job" placeholder="Job">
                            </div>
                           </div>
                           <div class="col-md-6">
                            <div class="form-group">
                            <label for="password">Proposed date</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                           </div>
                           <div class="col-md-12">
                            <div class="form-group">
                                <textarea cols="30" rows="10" class="form-control" id="message" name="supply" placeholder="Supply of Materials Needed"></textarea>
                            </div>
                           </div>
                           <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-info btn-lg" id="submit" name="apply" value="Apply">
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