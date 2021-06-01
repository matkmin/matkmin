<?php
  $page_title = 'Notification Pages';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>

<?php include_once('layouts/header.php'); ?>

   <div class="col-md-20">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-bell"></span>
           <span>NOTIFACATION</span>
         </strong>
       </div>
	   
   </div>
<?php include_once('layouts/footer.php'); ?>