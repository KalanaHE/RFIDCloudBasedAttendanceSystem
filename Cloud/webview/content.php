<?php 

          require '../dbconnect.php';

          $result = mysqli_query($conn,"SELECT * FROM user_attendance");

          $result2 = mysqli_query($conn,"SELECT * FROM user_attendance WHERE allow = '1' ");

          $result3 = mysqli_query($conn,"SELECT * FROM user_attendance WHERE allow = '0' ");

           if ($result&&$result3) { 
            // it return number of rows in the table. 
            $count = mysqli_num_rows($result2); 
            $count2 = mysqli_num_rows($result3);
              
            // close the result. 
            mysqli_free_result($result2); 
        } 

?>


 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Stats</a>
          </li>
          <li class="breadcrumb-item active">List</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-comments"></i>
                </div>
                <div class="mr-5"><h3><?php echo $count; ?> Allowed Students</h3></div>
              </div>
       <!--        <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a> -->
            </div>
          </div>

          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-life-ring"></i>
                </div>
                <div class="mr-5"><h3><?php echo $count2; ?> Disallowed Students</h3></div>
              </div>
            <!--   <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a> -->
            </div>
          </div>
        </div>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Report</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Time</th>
                  </tr>
                </thead>
      
      <?php 

          require '../dbconnect.php';

          $result = mysqli_query($conn,"SELECT * FROM user_attendance");

       ?>
                <tbody>

                  <?php 

                    while($row = mysqli_fetch_array($result)){
                      echo "<tr>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" . $row['userid'] . "</td>";
                      if($row['allow']==1){
                        echo "<td class='text-center'><button type='button' class='btn btn-success'>" . $row['allow'] . "</button></td>";
                      }else{
                        echo "<td class='text-center'><button type='button' class='btn btn-danger'>" . $row['allow'] . "</button></td>";
                      }

                      echo "<td>" . $row['timestamp'] . "</td>";
                      echo "</tr>";
                    }

                   ?>
                  
                </tbody>
              </table>
            </div>
          </div>
          

          <div class="card-footer small text-muted">Last updated at <?php echo '<font color="green">Just now.</font>'; ?></div>
        </div>


