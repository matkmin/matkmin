<?php
  $page_title = 'All Suppliers';
  require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
 page_require_level(1);
//pull out all user form database
 $all_supplier = find_all_supplier();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-folder-close"></span>
          <span>Suppliers</span>
       </strong>
         <a href="add_supplier.php" class="btn btn-info pull-right">Add New Suppliers</a>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Full Name </th>
			<th class="text-center" style="width: 15%;">Address</th>
            <th class="text-center" style="width: 15%;">Contact Number</th>
			<th class="text-center" style="width: 15%;">E-mail</th>
			<th class="text-center" style="width: 15%;">Branch</th>
            <th class="text-center" style="width: 100px;">Actions</th>
          </tr>
        </thead>
        <tbody>
       <?php foreach($all_supplier as $a_supplier): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($a_supplier['name']))?></td>
           <td><?php echo remove_junk($db->escape($a_supplier['address']))?></td>
           <td class="text-center"><?php echo remove_junk(randString($a_supplier['address']))?></td>
		   <td class="text-center"><?php echo remove_junk(ucwords($a_supplier['name']))?></td>
		   <td class="text-center"><?php echo remove_junk(ucwords($a_supplier['name']))?></td>
           
     
           <td class="text-center">
             <div class="btn-group">
                <a href="edit_supplier.php?id=<?php echo (int)$a_supplier['id'];?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                  <i class="glyphicon glyphicon-pencil"></i>
               </a>
                <a href="delete_supplier.php?id=<?php echo (int)$a_supplier['id'];?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                  <i class="glyphicon glyphicon-remove"></i>
                </a>
                </div>
           </td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
  <?php include_once('layouts/footer.php'); ?>
