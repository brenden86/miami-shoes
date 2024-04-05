<?php

// functions for populating info related to the order

function generateOrderId() {

  // return sequence of 10 random digits prefixed by 'MS-'

  $order_id_digits = array();
  $id_length = 10;

  for($i = 0; $i<$id_length; $i++) {
    array_push($order_id_digits, rand(0,9));
  }

  $order_id = implode('', $order_id_digits);

  return 'MS-' . $order_id;

}


function getDeliveryDate($ship_type) {

  // determine estimated delivery date from selected shipping method
  
  // get minimum delivery days
  if($ship_type === 'standard') {
    $ship_days = 3;
  } elseif($ship_type === 'expedited') {
    $ship_days = 1;
  }

  $dlvr_date = date_create();
  $biz_days_passed = 0;
  $days_passed = 0;
  
  // calculate delivery date, excluding weekends
  while($biz_days_passed < $ship_days) {
    $days_passed++;
    $new_date = date_add(date_create(), date_interval_create_from_date_string($days_passed." days"));
    $weekday = date_format($new_date, 'D');
    // check if date is on a weekend
    if($weekday != 'Sat' && $weekday != 'Sun') {
      $biz_days_passed++;
    }
    $dlvr_date = $new_date;
  }

  return date_format($dlvr_date, 'Y-m-d H:i:s');
  
}
?>