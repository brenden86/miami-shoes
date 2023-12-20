<?php

include_once __DIR__ . '/../php-scripts/get-cart-info.php';

// set error message and return to checkout page
function checkoutValidationError($message) {
  $_SESSION['checkout_error'] = $message;
  header('location: /checkout');
  exit;
}

function validateCheckout($step) {

  // validate basic info section
  if($step === 1) {
    
    // billing first name
    if(empty($_POST['billing_first_name'])) {
      checkoutValidationError('Please enter a valid first name.');
    } else {
      $_SESSION['checkout_info']['billing_first_name'] = filter_var($_POST['billing_first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    // billing last name
    if(empty($_POST['billing_last_name'])) {
      checkoutValidationError('Please enter a valid last name.');
    } else {
      $_SESSION['checkout_info']['billing_last_name'] = filter_var($_POST['billing_last_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    // billing company
    if(!empty($_POST['billing_company'])) {
      $_SESSION['checkout_info']['billing_company'] = filter_var($_POST['billing_company'], FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    // billing street 1
    if(empty($_POST['billing_street1'])) {
      checkoutValidationError('Please enter a valid street name.');
    } else {
      $_SESSION['checkout_info']['billing_street1'] = filter_var($_POST['billing_street1'], FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    // billing street 2
    if(trim($_POST['billing_street2'])) {
      $_SESSION['checkout_info']['billing_street2'] = filter_var($_POST['billing_street2'], FILTER_SANITIZE_SPECIAL_CHARS);
    }

    // billing city
    if(empty($_POST['billing_city'])) {
      checkoutValidationError('Please enter a valid city name.');
    } else {
      $_SESSION['checkout_info']['billing_city'] = filter_var($_POST['billing_city'], FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    // billing state
    if(preg_match('/^[A-Za-z]{2}$/', $_POST['billing_state'])) {
      $_SESSION['checkout_info']['billing_state'] = $_POST['billing_state'];
    } else {
      checkoutValidationError('Please enter a valid billing state.');
    }
    
    // billing zip
    if(preg_match('/^\d{5}$/', $_POST['billing_zip'])) {
      $_SESSION['checkout_info']['billing_zip'] = $_POST['billing_zip'];
    } else {
      checkoutValidationError('Please enter a valid billing ZIP code.');
    }

    // email
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $_SESSION['checkout_info']['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    } else {
      checkoutValidationError('Please enter a valid email.');
    }

    if(!empty($_POST['phone'])) {
      if(!preg_match('/(\d{3})-(\d{3})-(\d{4})/', $_POST['phone'])) {
        checkoutValidationError('Please enter a valid 10-digit phone number.');
      } else {
        $_SESSION['checkout_info']['phone'] = $_POST['phone'];
      }
    }
    

  } elseif($step === 2) {
    
    // shipping type
    if(empty($_POST['shipping_type'])) {
      checkoutValidationError('Please select a shipping type.');
    } else {
      $_SESSION['checkout_info']['shipping_type'] = filter_var($_POST['shipping_type'], FILTER_SANITIZE_SPECIAL_CHARS);
    }

    // same address
    if($_POST['same_address'] === 'true') {
      $_SESSION['checkout_info']['same_address'] = 'true';
      // set shipping address fields to billing address field values
      $_SESSION['checkout_info']['shipping_first_name'] = $_SESSION['checkout_info']['billing_first_name'];
      $_SESSION['checkout_info']['shipping_last_name'] = $_SESSION['checkout_info']['billing_last_name'];
      $_SESSION['checkout_info']['shipping_street1'] = $_SESSION['checkout_info']['billing_street1'];
      $_SESSION['checkout_info']['shipping_street2'] = $_SESSION['checkout_info']['billing_street2'];
      $_SESSION['checkout_info']['shipping_city'] = $_SESSION['checkout_info']['billing_city'];
      $_SESSION['checkout_info']['shipping_state'] = $_SESSION['checkout_info']['billing_state'];
      $_SESSION['checkout_info']['shipping_zip'] = $_SESSION['checkout_info']['billing_zip'];
      $_SESSION['checkout_info']['shipping_company'] = $_SESSION['checkout_info']['billing_company'];
    } else {

      // shipping first name
      if(empty($_POST['shipping_first_name'])) {
        checkoutValidationError('Please enter a valid first name.');
      } else {
        $_SESSION['checkout_info']['shipping_first_name'] = filter_var($_POST['shipping_first_name'], FILTER_SANITIZE_SPECIAL_CHARS);
      }
  
      // shipping last name
      if(empty($_POST['shipping_last_name'])) {
        checkoutValidationError('Please enter a valid last name.');
      } else {
        $_SESSION['checkout_info']['shipping_last_name'] = filter_var($_POST['shipping_last_name'], FILTER_SANITIZE_SPECIAL_CHARS);
      }

      // shipping company
      if(!empty($_POST['shipping_company'])) {
        $_SESSION['checkout_info']['shipping_company'] = filter_var($_POST['shipping_company'], FILTER_SANITIZE_SPECIAL_CHARS);
      }
  
      // shipping street 1
      if(empty($_POST['shipping_street1'])) {
        checkoutValidationError('Please enter a valid street name.');
      } else {
        $_SESSION['checkout_info']['shipping_street1'] = filter_var($_POST['shipping_street1'], FILTER_SANITIZE_SPECIAL_CHARS);
      }
  
      // shipping street 2
      if(trim($_POST['shipping_street2'])) {
        $_SESSION['checkout_info']['shipping_street2'] = filter_var($_POST['shipping_street2'], FILTER_SANITIZE_SPECIAL_CHARS);
      }
  
      // shipping state
      if(preg_match('/^[A-Za-z]{2}$/', $_POST['shipping_state'])) {
        $_SESSION['checkout_info']['shipping_state'] = $_POST['shipping_state'];
      } else {
        checkoutValidationError('Please enter a valid shipping state.');
      }
  
      // shipping zip
      if(preg_match('/^\d{5}$/', $_POST['shipping_zip'])) {
        $_SESSION['checkout_info']['shipping_zip'] = $_POST['shipping_zip'];
      } else {
        checkoutValidationError('Please enter a valid shipping ZIP code.');
      }

    }

    // delivery instructions
    if(!empty($_POST['delivery_instructions'])) {
      $_SESSION['checkout_info']['delivery_instructions'] = filter_var($_POST['delivery_instructions'], FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    // payment method
    if(!empty($_POST['payment_method'])) {
      $_SESSION['checkout_info']['payment_method'] = filter_var($_POST['payment_method'], FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
      checkoutValidationError('Please select a payment method.');
    }

    // credit card name
    if(!empty($_POST['credit_card_name'])) {
      $_SESSION['checkout_info']['credit_card_name'] = filter_var($_POST['credit_card_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
      checkoutValidationError('Please enter a valid name');
    }

    // credit card zip
    if(preg_match('/^\d{5}$/', $_POST['credit_card_zip'])) {
      $_SESSION['checkout_info']['credit_card_zip'] = $_POST['credit_card_zip'];
    } else {
      checkoutValidationError('Please enter a valid ZIP code.');
    }

    // credit card number
    if(!empty($_POST['card_number'])) {
      $formatted_card_number = preg_replace('/\D/', '', $_POST['card_number']);
      if(strlen($formatted_card_number) === 16) {
        $_SESSION['checkout_info']['card_number'] = $formatted_card_number;
      } else {
        checkoutValidationError('Please enter a valid 12-digit card number.');
      }
    }
    
    // cvv
    if(preg_match('/^\d{3,4}$/', $_POST['cvv'])) {
      $_SESSION['checkout_info']['cvv'] = $_POST['cvv'];
    } else {
      checkoutValidationError('Please enter a valid CVV.');
    }
    
    // card expiration
    if(preg_match('/(0[1-9]|1[0-2])\/(2[3-9]|[3-9][0-9])/', $_POST['card_exp'])) {
      $_SESSION['checkout_info']['card_exp'] = $_POST['card_exp'];
    } else {
      checkoutValidationError('Please enter a valid expiration date.');
    }
    
  }
  
}

?>