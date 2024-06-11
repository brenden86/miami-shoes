<?php

  // gets correct CSS class for displaying current & completed checkout steps

  function getCheckoutStepClass($step) {
    // get current checkout step, return if there is none (shouldn't happen)
    if(isset($_SESSION['checkout_info']['current_step'])) {
      $current_step = $_SESSION['checkout_info']['current_step'];
    } else {
      return;
    }

    if($current_step === $step) {
      return 'active';
    } elseif($current_step > $step) {
      return 'complete';
    }

  }

?>

<!-- checkout progress bar -->
<div class="checkout-progress">

  <div class="checkout-progress-bar">
    <div class="progress-segment <?=getCheckoutStepClass(1);?>"></div>
    <div class="progress-segment <?=getCheckoutStepClass(2);?>"></div>
  </div>

  <div class="progress-steps-wrapper">
    
    <div id="progress-basic-info" class="checkout-step <?=getCheckoutStepClass(1);?>">
      <div class="checkout-step-icon">
        <i class="bi-check" role="presentation"></i>
      </div>
      <h1>Basic Info</h1>
    </div>
    
    <div id="progress-shipping-payment" class="checkout-step <?=getCheckoutStepClass(2);?>">
      <div class="checkout-step-icon">
        <i class="bi-check" role="presentation"></i>
      </div>
      <h1>Shipping & Payment</h1>
    </div>
    
    <div id="progress-review" class="checkout-step <?=getCheckoutStepClass(3);?>">
      <div class="checkout-step-icon">
        <i class="bi-check" role="presentation"></i>
      </div>
      <h1>Review</h1>
    </div>
    
  </div>
  
  
</div>