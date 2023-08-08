<form
  id="checkout-form-basic-info"
  action="/client/checkout-submit.php"
  method="post"
>
<?php
  // extract billing info from session
  extract($_SESSION['checkout-info']['billing'])
?>
  <div id="basic-info-fields" class="checkout-fields">
  
    <fieldset>
      <legend class="section">Billing Information</legend>
  
      <label>Billing Address</label>
      <div class="input-wrapper inline">
        <label for="billing-first-name" class="sr-only">first name</label>
        <input
          type="text"
          id="billing-first-name"
          name="billing_first_name"
          value="<?=$billing_first_name?>"
          placeholder="First name"
        >
  
        <label for="billing-last-name" class="sr-only">last name</label>
        <input
          type="text"
          id="billing-last-name"
          name="billing_last_name"
          value=<?=$billing_last_name?>
          placeholder="Last name"
        >
      </div>
      <div class="input-wrapper">
        <!-- SHOW COMPANY BUTTON -->
        <div id="add-billing-company-field" class="add-field-button">
          <i class="bi-plus-circle-fill"></i>
          Add Company
        </div>
  
        <label for="billing-company" class="sr-only">company</label>
        <input type="text"
          id="billing-company"
          name="billing_company"
          value=<?=$billing_company?>
          placeholder="Company"
        >
  
  
        <label for="billing-street1" class="sr-only">Address Line 1</label>
        <input
          id="billing-street1"
          type="text"
          name="billing_street1"
          value=<?=$billing_street1?>
          placeholder="Street"
        >
  
        <label for="billing-street2" class="sr-only">Address Line 2</label>
        <input
          id="billing-street2"
          type="text"
          name="billing_street2"
          value=<?=$billing_street2?>
          placeholder="Apartment, suite, unit, etc."
        >
  
      </div>
  
      <div class="input-wrapper inline">
        <label for="billing-city" class="sr-only">city</label>
        <input
          id="billing-city"
          type="text"
          name="billing_city"
          value=<?=$billing_city;?>
          placeholder="City"
        >
  
        <!-- USE JAVASCRIPT TO STYLE STATE PLACEHOLDER COLOR -->
        <label for="billing-state" class="sr-only">state</label>
        <select name="billing-state" id="billing-state">
          <option value="" disabled selected>State</option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA" selected>California</option>
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
  
        <label for="billing-zip" class="sr-only">zip</label>
        <input type="text" id="billing-zip" name="billing-zip" placeholder="ZIP">
      </div>
  
    </fieldset>
  
    <div class="input-wrapper">
      <label for="email">Email</label>
      <input type="email" name="email" id="email">
    </div>
  
    <br>
  
    <div class="input-wrapper">
      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" placeholder="(555) 555-5555">
    </div>

    <!-- checkout navigation buttons -->
    <div class="form-navigation-buttons">
      <div class="text-button">Back</div>
      <button class="button next" type="submit">
        Continue to Shipping
        <i class="bi-caret-right-fill"></i>
      </button>
    </div>


  </div>


</form>