<!-- checkout form fields - SHIPPING & PAYMENT -->
<form
  id="checkout-form-shipping-payment"
  action="/pages/checkout/checkout-submit.php"
  method="post"
>
  <div id="shipping-payment-fields" class="checkout-fields">
  
  <fieldset>
    <legend>Shipping Information</legend>
    <!-- shipping -->
    <div class="input-wrapper inline">
      <label for="shipping-standard" class="radio-container large">
        <input
          type="radio"
          id="shipping-standard"
          name="shipping_type"
          value="standard"
          <?=($_SESSION['checkout_info']['shipping_type'] === 'standard') ? 'checked' : '';?>
        >
          <div class="radio"></div>
          Standard Shipping - FREE
          <span class="label-descriptor">3-5 business days</span>
        </label>
        <label for="shipping-expedited" class="radio-container large">
          <input
          type="radio"
          id="shipping-expedited"
          name="shipping_type"
          value="expedited"
          <?=($_SESSION['checkout_info']['shipping_type'] === 'expedited') ? 'checked' : '';?>
        >
        <div class="radio"></div>
        Expedited Shipping - $14.99
        <span class="label-descriptor">1-2 business days</span>
      </label>
    </div>
  
    <br>
    <br>
    
    <!-- shipping address -->
    
    
    <label for="same-as-billing" class="checkbox-container">
      <input
      type="checkbox"
      id="same-as-billing"
      name="same_address"
      value="true"
      <?=($_SESSION['checkout_info']['same_address'] === 'true') ? 'checked' : '';?>
      >
      <div class="checkbox">
        <i class="bi-check"></i>
      </div>
      Shipping address same as billing
    </label>
    
    <div id="shipping-address-fields" class="input-wrapper">

      <div class="input-wrapper inline">
        <label for="shipping-first-name" class="sr-only">first name</label>
        <input
          type="text"
          id="shipping-first-name"
          name="shipping_first_name"
          value="<?=$shipping_first_name ?? '';?>"
          placeholder="First name"
          required
        >
    
        <label for="shipping-last-name" class="sr-only">last name</label>
        <input
          type="text"
          id="shipping-last-name"
          name="shipping_last_name"
          value="<?=$shipping_last_name ?? '';?>"
          placeholder="Last name"
          required
        >
      </div>
    
    
        <!-- SHOW COMPANY BUTTON -->
        <?php
          if(!$shipping_company) {
            echo '
              <div id="add-shipping-company-field" class="add-field-button">
                <i class="bi-plus-circle-fill"></i>
                Add Company
              </div>
            ';
          }
        ?>
    
        <label for="shipping-company" class="sr-only">company</label>
        <input
          class="<?=(!$shipping_company) ? 'hide' : '';?>"
          type="text"
          name="shipping_company"
          value="<?=$shipping_company ?? '';?>"
          id="shipping-company"
          placeholder="Company"
        >
    
        <label for="shipping-street1" class="sr-only">Address Line 1</label>
        <input
          type="text"
          name="shipping_street1"
          value="<?=$shipping_street1 ?? '';?>"
          id="shipping-street1"
          placeholder="Street"
          required
        >
    
        <label for="shipping-street2" class="sr-only">Address Line 2</label>
        <input
          type="text"
          name="shipping_street2"
          value="<?=$shipping_street2 ?? '';?>"
          id="shipping-street2"
          placeholder="Apartment, suite, unit, etc."
        >
    
        <div class="input-wrapper inline">
          <label for="shipping-city" class="sr-only">city</label>
          <input
            type="text"
            id="shipping-city"
            name="shipping_city"
            value="<?=$shipping_city ?? '';?>"
            placeholder="City"
            required
          >
    
          <!-- USE JAVASCRIPT TO STYLE STATE PLACEHOLDER COLOR -->
          <label for="shipping-state" class="sr-only">state</label>
          <select name="shipping_state" id="shipping-state" required>
            <option value="" disabled <?=(!$shipping_state) ? 'selected' : ''?>>State</option>
            <option value="AL" <?=($shipping_state === "AL") ? 'selected' : ''?>>Alabama</option>
            <option value="AK" <?=($shipping_state === "AK") ? 'selected' : ''?>>Alaska</option>
            <option value="AZ" <?=($shipping_state === "AZ") ? 'selected' : ''?>>Arizona</option>
            <option value="AR" <?=($shipping_state === "AR") ? 'selected' : ''?>>Arkansas</option>
            <option value="CA" <?=($shipping_state === "CA") ? 'selected' : ''?>>California</option>
            <option value="CO" <?=($shipping_state === "CO") ? 'selected' : ''?>>Colorado</option>
            <option value="CT" <?=($shipping_state === "CT") ? 'selected' : ''?>>Connecticut</option>
            <option value="DE" <?=($shipping_state === "DE") ? 'selected' : ''?>>Delaware</option>
            <option value="DC" <?=($shipping_state === "DC") ? 'selected' : ''?>>District Of Columbia</option>
            <option value="FL" <?=($shipping_state === "FL") ? 'selected' : ''?>>Florida</option>
            <option value="GA" <?=($shipping_state === "GA") ? 'selected' : ''?>>Georgia</option>
            <option value="HI" <?=($shipping_state === "HI") ? 'selected' : ''?>>Hawaii</option>
            <option value="ID" <?=($shipping_state === "ID") ? 'selected' : ''?>>Idaho</option>
            <option value="IL" <?=($shipping_state === "IL") ? 'selected' : ''?>>Illinois</option>
            <option value="IN" <?=($shipping_state === "IN") ? 'selected' : ''?>>Indiana</option>
            <option value="IA" <?=($shipping_state === "IA") ? 'selected' : ''?>>Iowa</option>
            <option value="KS" <?=($shipping_state === "KS") ? 'selected' : ''?>>Kansas</option>
            <option value="KY" <?=($shipping_state === "KY") ? 'selected' : ''?>>Kentucky</option>
            <option value="LA" <?=($shipping_state === "LA") ? 'selected' : ''?>>Louisiana</option>
            <option value="ME" <?=($shipping_state === "ME") ? 'selected' : ''?>>Maine</option>
            <option value="MD" <?=($shipping_state === "MD") ? 'selected' : ''?>>Maryland</option>
            <option value="MA" <?=($shipping_state === "MA") ? 'selected' : ''?>>Massachusetts</option>
            <option value="MI" <?=($shipping_state === "MI") ? 'selected' : ''?>>Michigan</option>
            <option value="MN" <?=($shipping_state === "MN") ? 'selected' : ''?>>Minnesota</option>
            <option value="MS" <?=($shipping_state === "MS") ? 'selected' : ''?>>Mississippi</option>
            <option value="MO" <?=($shipping_state === "MO") ? 'selected' : ''?>>Missouri</option>
            <option value="MT" <?=($shipping_state === "MT") ? 'selected' : ''?>>Montana</option>
            <option value="NE" <?=($shipping_state === "NE") ? 'selected' : ''?>>Nebraska</option>
            <option value="NV" <?=($shipping_state === "NV") ? 'selected' : ''?>>Nevada</option>
            <option value="NH" <?=($shipping_state === "NH") ? 'selected' : ''?>>New Hampshire</option>
            <option value="NJ" <?=($shipping_state === "NJ") ? 'selected' : ''?>>New Jersey</option>
            <option value="NM" <?=($shipping_state === "NM") ? 'selected' : ''?>>New Mexico</option>
            <option value="NY" <?=($shipping_state === "NY") ? 'selected' : ''?>>New York</option>
            <option value="NC" <?=($shipping_state === "NC") ? 'selected' : ''?>>North Carolina</option>
            <option value="ND" <?=($shipping_state === "ND") ? 'selected' : ''?>>North Dakota</option>
            <option value="OH" <?=($shipping_state === "OH") ? 'selected' : ''?>>Ohio</option>
            <option value="OK" <?=($shipping_state === "OK") ? 'selected' : ''?>>Oklahoma</option>
            <option value="OR" <?=($shipping_state === "OR") ? 'selected' : ''?>>Oregon</option>
            <option value="PA" <?=($shipping_state === "PA") ? 'selected' : ''?>>Pennsylvania</option>
            <option value="RI" <?=($shipping_state === "RI") ? 'selected' : ''?>>Rhode Island</option>
            <option value="SC" <?=($shipping_state === "SC") ? 'selected' : ''?>>South Carolina</option>
            <option value="SD" <?=($shipping_state === "SD") ? 'selected' : ''?>>South Dakota</option>
            <option value="TN" <?=($shipping_state === "TN") ? 'selected' : ''?>>Tennessee</option>
            <option value="TX" <?=($shipping_state === "TX") ? 'selected' : ''?>>Texas</option>
            <option value="UT" <?=($shipping_state === "UT") ? 'selected' : ''?>>Utah</option>
            <option value="VT" <?=($shipping_state === "VT") ? 'selected' : ''?>>Vermont</option>
            <option value="VA" <?=($shipping_state === "VA") ? 'selected' : ''?>>Virginia</option>
            <option value="WA" <?=($shipping_state === "WA") ? 'selected' : ''?>>Washington</option>
            <option value="WV" <?=($shipping_state === "WV") ? 'selected' : ''?>>West Virginia</option>
            <option value="WI" <?=($shipping_state === "WI") ? 'selected' : ''?>>Wisconsin</option>
            <option value="WY" <?=($shipping_state === "WY") ? 'selected' : ''?>>Wyoming</option>
          </select>
    
          <label for="shipping-zip" class="sr-only">zip</label>
          <input
            type="text"
            id="shipping-zip"
            name="shipping_zip"
            value="<?=$shipping_zip ?? '';?>"
            placeholder="ZIP"
            pattern="\d{5}"
            maxlength="5"
            required
          >
        </div>
  
      
    </div>
    
    <div class="input-wrapper">

      <!-- SHOW DELIVERY INSTRUCTIONS FIELD -->
      
      <?php
        if(!$delivery_instructions) {
          echo '
          <div id="add-delivery-instructions-field" class="add-field-button">
            <i class="bi-plus-circle-fill"></i>
            Add Delivery Instructions
          </div>
          ';
        }
      ?>

      <label for="delivery-instructions" class="sr-only">delivery instructions</label>
      <textarea
        id="delivery-instructions"
        class="<?=(!$delivery_instructions) ? 'hide' : '';?>"
        cols="30"
        rows="4"
        placeholder="Type delivery instructions here"
        name="delivery_instructions"
      ><?=$delivery_instructions ?? '';?></textarea>
    </div>
    
  </fieldset>
  
  
  <!-- payment method -->
  <fieldset>
    <legend>Payment Method</legend>
  

  

  
  <!-- credit card info -->
  <div class="input-wrapper inline">
    <label for="credit-card-name" class="sr-only">Name on card</label>
    <input
      type="text"
      id="credit-card-name"
      name="credit_card_name"
      value="<?=$credit_card_name ?? '';?>"
      placeholder="Name on card"
      required
    >
  
    <label for="credit-card-zip" class="sr-only">ZIP</label>
    <input
      type="text"
      id="credit-card-zip"
      name="credit_card_zip"
      value="<?=$credit_card_zip ?? '';?>"
      placeholder="Card ZIP"
      inputmode="numeric"
      maxlength="5"
      style="width: 25%"
      required
    >
  </div>

  </fieldset>

  <div class="credit-card-container">
  
    <div class="credit-card-inputs">
  
      <div class="card-input-wrapper">
        <div class="card-input">
          <label for="card-number">Card Number</label>
          <input
            type="text"
            name="card_number"
            value="<?=$card_number ?? '';?>"
            minlength="19"
            maxlength="19"
            id="card-number"
            inputmode="numeric"
            placeholder="XXXX XXXX XXXX XXXX"
            required
          >
        </div>
        <div class="card-input">
          <label for="cvv">CVV</label>
          <input
            type="text"
            name="cvv"
            value="<?=$cvv ?? '';?>"
            id="cvv"
            style="width: 70px"
            inputmode="numeric"
            maxlength="4"
            required
          >
        </div>
      </div>
  
      <div class="card-input-wrapper">
        <div class="card-input">
          <label for="card-exp">Expiration Date</label>
          <input
          type="text"
          id="card-exp"
          name="card_exp"
          value="<?=$card_exp ?? '';?>"
          inputmode="numeric"
          style="width: 90px"
          placeholder="MM/YY"
          maxlength="5"
          pattern="(0[1-9]|1[0-2])\/(2[3-9]|[3-9][0-9])"
          required
        >
        </div>
      </div>
  
    </div>
    
    <?php /*
    - Use if using PayPal API -
    <div class="payment-processor">
      <span>Powered by</span>
      <img src="/images/paypal.png" alt="paypal">
    </div>
    */?>
  
  </div>
  
  </div>
  <div class="form-navigation-buttons">
    <a href="/checkout.php?prev_step=1" class="text-button">Back</a>
    <button class="button next" type="submit">
      Continue to Review
      <i class="bi-caret-right-fill"></i>
    </button>
  </div>
</form>