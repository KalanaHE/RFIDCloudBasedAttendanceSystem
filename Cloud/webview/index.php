<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Attendance System">
  <meta name="author" content="Kalana Hettiarachchi">

  <title>Cloud Based Attendance Monitoring System by Kalana Hettiarachchi</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <link rel="shortcut icon" href="../../myweb/images/favicon.ico">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">CalculusWebS</a>




    

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
<!--     <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Stats</span>
        </a>
      </li>


    </ul> -->

    <div id="content-wrapper">

      <div class="container-fluid" id="section">

		<center><div class="lds-hourglass" height="100%"><br></div></center>
      		<style>
				.lds-hourglass {
				  display: inline-block;
				  position: relative;
				  width: 64px;
				  height: 64px;
				}
				.lds-hourglass:after {
				  content: " ";
				  display: block;
				  border-radius: 50%;
				  width: 0;
				  height: 0;
				  margin: 6px;
				  box-sizing: border-box;
				  border: 26px solid #000000;
				  border-color: #000000 transparent #000000 transparent;
				  animation: lds-hourglass 1.2s infinite;
				}
				@keyframes lds-hourglass {
				  0% {
				    transform: rotate(0);
				    animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
				  }
				  50% {
				    transform: rotate(900deg);
				    animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
				  }
				  100% {
				    transform: rotate(1800deg);
				  }
				}

			</style>


      </div>
      <!-- /.container-fluid -->

     

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

   <!-- Sticky Footer -->
  <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
      <span>Copyright © Designed and developed by <a href="https://linkedin.com/in/kalanahe/" target="_blank">Kalana Hettiarachchi</a> </span>
    </div>
  </footer>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

  <script>

    $(document).ready(function() {
    setInterval(timestamp, 1000);
    });

    function timestamp() {
        $.ajax({
            url: 'content.php',
            success: function(data) {
                $('#section').html(data);
            },
        });
    }


    
</script>

</body>

</html>
