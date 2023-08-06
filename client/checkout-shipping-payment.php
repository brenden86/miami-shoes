<!-- checkout form fields - SHIPPING & PAYMENT -->
<form
  id="checkout-form-shipping-payment"
  action="/php-scripts/test.php"
  method="post"
>
  <div id="shipping-payment-fields" class="checkout-fields">
  
  <fieldset>
    <legend>Shipping Information</legend>
    <!-- shipping -->
    <div class="input-wrapper inline">
      <label for="shipping-standard" class="radio-container large">
        <input type="radio" id="shipping-standard" name="shipping-type" value="standard">
        <div class="radio"></div>
        Standard Shipping - FREE
        <span class="label-descriptor">3-5 business days</span>
      </label>
      <label for="shipping-expedited" class="radio-container large">
        <input type="radio" id="shipping-expedited" name="shipping-type" value="expedited">
        <div class="radio"></div>
        Expedited Shipping - $14.99
        <span class="label-descriptor">1-2 business days</span>
      </label>
    </div>
  
    <br>
    <br>
  
    <!-- shipping address -->
    <label for="same-as-billing" class="checkbox-container">
      <input type="checkbox" id="same-as-billing" name="same-shipping-billing-address">
      <div class="checkbox">
        <i class="bi-check"></i>
      </div>
      Shipping address same as billing
    </label>
  
    <div class="input-wrapper inline">
      <label for="shipping-first-name" class="sr-only">first name</label>
      <input type="text" id="shipping-first-name" name="shipping-first-name" placeholder="First name">
  
      <label for="shipping-last-name" class="sr-only">last name</label>
      <input type="text" id="shipping-last-name" name="shipping-last-name" placeholder="Last name">
    </div>
  
    <div class="input-wrapper">
  
      <!-- SHOW COMPANY BUTTON -->
      <div id="add-shipping-company-field" class="add-field-button">
        <i class="bi-plus-circle-fill"></i>
        Add Company
      </div>
  
      <label for="shipping-company" class="sr-only">company</label>
      <input type="text" name="shipping-company" id="shipping-company" placeholder="Company">
  
      <label for="shipping-street1" class="sr-only">Address Line 1</label>
      <input type="text" name="shipping-street1" id="shipping-street1" placeholder="Street">
  
      <label for="shipping-street2" class="sr-only">Address Line 2</label>
      <input type="text" name="shipping-street2" id="shipping-street2" placeholder="Apartment, suite, unit, etc.">
  
      <div class="input-wrapper inline">
        <label for="shipping-city" class="sr-only">city</label>
        <input type="text" id="shipping-city" name="shipping-city" placeholder="City">
  
        <!-- USE JAVASCRIPT TO STYLE STATE PLACEHOLDER COLOR -->
        <label for="shipping-state" class="sr-only">state</label>
        <select name="shipping-state" id="shipping-state">
          <option value="" disabled selected>State</option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">District Of Columbia</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
        </select>
  
        <label for="shipping-zip" class="sr-only">zip</label>
        <input type="text" id="shipping-zip" name="shipping-zip" placeholder="ZIP">
      </div>
  
      <!-- SHOW DELIVERY INSTRUCTIONS FIELD -->
      <div id="add-delivery-instructions-field" class="add-field-button">
        <i class="bi-plus-circle-fill"></i>
        Add Delivery Instructions
      </div>
    </div>
  
    <label for="delivery-instructions" class="sr-only">delivery instructions</label>
    <textarea name="delivery-instructions" id="delivery-instructions" cols="30" rows="4" placeholder="Type delivery instructions here"></textarea>
  </fieldset>
  
  
  <!-- payment method -->
  <fieldset>
    <legend>Payment Method</legend>
  
    <div class="input-wrapper inline">
  
      <label for="payment-new-card" class="radio-container large">
        <input type="radio" name="payment-method" id="payment-new-card" value="new" required checked>
        <div class="radio"></div>
        New Card
  
      </label>
  
      <label for="payment-visa-1234" class="radio-container large">
        <input type="radio" name="payment-method" id="payment-visa-1234" value="saved" disabled>
        <div class="radio"></div>
        VISA ending in 1234
        <span class="label-descriptor">Joe Schmoe</span>
  
      </label>
  
      <!-- MOVE TO SCRIPT FILE -->
      <script>
        let radioInputs = document.querySelectorAll('input[type="radio"]')
        radioInputs.forEach(e => {
          if (e.disabled) {
            e.parentElement.style.color = '#b8b8b8'
            // color matches $font-light in _var.scss
            // MUST change manually if variable changes
          }
        })
      </script>
  
    </div>
  
  </fieldset>
  
  <!-- credit card info -->
  <label>Card Information</label>
  <div class="input-wrapper inline">
    <label for="credit-card-name" class="sr-only">Name on card</label>
    <input type="text" id="credit-card-name" name="credit-card-name" placeholder="Name on card">
  
    <label for="credit-card-zip" class="sr-only">ZIP</label>
    <input type="text" id="credit-card-zip" name="credit-card-zip" placeholder="Card ZIP" style="width: 25%">
  </div>
  
  <div class="credit-card-container">
  
    <div class="credit-card-inputs">
  
      <div class="card-input-wrapper">
        <div class="card-input">
          <label for="card-number">Card Number</label>
          <input type="text" name="card-number" maxlength="19" id="card-number" inputmode="numeric" style="width: 250px">
        </div>
        <div class="card-input">
          <label for="cvv">CVV</label>
          <input type="text" name="cvv" id="cvv" style="width: 70px" inputmode="numeric" maxlength="4">
        </div>
      </div>
  
      <div class="card-input-wrapper">
        <div class="card-input">
          <label for="card-exp">Expiration Date</label>
          <input type="text" id="card-exp" name="card-exp" inputmode="numeric" style="width: 90px" placeholder="MM/YY" maxlength="4">
        </div>
      </div>
  
    </div>
  
    <div class="payment-processor">
      <span>Powered by</span>
      <img src="./images/paypal.png" alt="paypal">
    </div>
  
  </div>
  
  </div>
  <div class="form-navigation-buttons">
    <div class="text-button">Back</div>
    <button class="button next" type="submit">
      Continue to Shipping
      <i class="bi-caret-right-fill"></i>
    </button>
  </div>
</form>