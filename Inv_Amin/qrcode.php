<?php
  $page_title = 'QR COde Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>

<?php include_once('layouts/header.php'); ?>


  <div class="row">
   <div class="col-md-20">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-qrcode"></span>
           <span>QR SCAN</span>
         </strong>
       </div>
	   
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

 	
<video id="preview"></video>
<script type="text/javascript">
  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
  scanner.addListener('scan', function (content) {
	alert(content);
  });
  Instascan.Camera.getCameras().then(function (cameras) {
	if (cameras.length > 0) {
	  scanner.start(cameras[0]);
	} else {
	  console.error('No cameras found.');
	}
  }).catch(function (e) {
	console.error(e);
  });
</script>

  </div>



<?php include_once('layouts/footer.php'); ?>
