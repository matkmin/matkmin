<?php
  $page_title = 'Add Supplier';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_supplier'])){

   $req_fields = array('full-name','address','email' );
   validate_fields($req_fields);

   if(empty($errors)){
           $name   = remove_junk($db->escape($_POST['full-name']));
       $address   = remove_junk($db->escape($_POST['address']));
       $email   = remove_junk($db->escape($_POST['email']));
   
      
        $query = "INSERT INTO suppliers (";
        $query .="name,address,email";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$address}', '{$email}','1'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Suppliers account has been creted! ");
          redirect('add_supplier.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to create account!');
          redirect('add_supplier.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_supplier.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Add New Supplier</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_supplier.php">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="full-name" placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Address">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name ="email"  placeholder="Email">
            </div>
           
            <div class="form-group clearfix">
              <button type="submit" name="add_supplier" class="btn btn-primary">Add Supplier</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
