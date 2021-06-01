<?php
$page_title = 'Sales Report';
$results = '';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php include_once('layouts/header.php'); ?>
<?php
  if(isset($_POST['submit'])){
    $req_dates = array('start-date','end-date');
    validate_fields($req_dates);

    if(empty($errors)):
      $start_date   = remove_junk($db->escape($_POST['start-date']));
      $end_date     = remove_junk($db->escape($_POST['end-date']));
      $results      = find_sale_by_dates($start_date,$end_date);
    else:
      $session->msg("d", $errors);
      redirect('sales_report.php', false);
    endif;

  } else {
    $session->msg("d", "Select dates");
    redirect('sales_report.php', false);
  }
?>

<body>
  <?php if($results): ?>
    <div class="page-break">
       <div class="sale-head pull-left">
           <h1>Sales Report</h1>
           <strong><?php if(isset($start_date)){ echo $start_date;}?> To <?php if(isset($end_date)){echo $end_date;}?> </strong>
       </div>
      <table class="table table-border">
        <thead>
          <tr>
              <th>Date</th>
              <th>Product Title</th>
              <th>Buying Price</th>
              <th>Selling Price</th>
              <th>Total Quantity</th>
              <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($results as $result): ?>
           <tr>
              <td class=""><?php echo remove_junk($result['date']);?></td>
              <td class="desc">
                <h6><?php echo remove_junk(ucfirst($result['name']));?></h6>
              </td>
              <td class="text">RM<?php echo remove_junk($result['buy_price']);?></td>
              <td class="text">RM<?php echo remove_junk($result['sale_price']);?></td>
              <td class="text"><?php echo remove_junk($result['total_sales']);?></td>
              <td class="text"><?php echo remove_junk($result['total_saleing_price']);?></td>
          </tr>
        <?php endforeach; ?>
        </tbody>
        <tfoot>
         <tr class="text">
           <td colspan="4"></td>
           <td colspan="1"><strong>Grand Total</strong></td>
           <td>RM
           <?php echo number_format(total_price($results)[0], 2);?>
          </td>
         </tr>
         <tr class="text">
           <td colspan="4"></td>
           <td colspan="1"><strong>Profit</strong></td>
           <td>RM <?php echo number_format(total_price($results)[1], 2);?></td>
         </tr>
        </tfoot>
      </table>
    </div>
  <?php
    else:
        $session->msg("d", "Sorry no sales has been found. ");
        redirect('sales_report.php', false);
     endif;
  ?>
  
  

<?php include_once('layouts/footer.php'); ?>