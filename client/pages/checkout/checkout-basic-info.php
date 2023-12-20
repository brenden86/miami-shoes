<form
  id="checkout-form-basic-info"
  action="/pages/checkout/checkout-submit.php"
  method="post"
>

  <div id="basic-info-fields" class="checkout-fields">
  
    <fieldset>
      <legend class="section">Billing Information</legend>

      <div class="input-wrapper">

        <div class="label">Billing Address</div class="label">

        <div class="input-wrapper inline">
          <label for="billing-first-name" class="sr-only">first name</label>
          <input
            type="text"
            id="billing-first-name"
            name="billing_first_name"
            value="<?=$billing_first_name ?? '';?>"
            placeholder="First name"
            required
          >
    
          <label for="billing-last-name" class="sr-only">last name</label>
          <input
            type="text"
            id="billing-last-name"
            name="billing_last_name"
            value="<?=$billing_last_name ?? '';?>"
            placeholder="Last name"
            required
          >
        </div>
      </div>
      <div class="input-wrapper">
        <!-- SHOW COMPANY BUTTON -->
        <?php
        if(!$billing_company) {
          echo '
            <div id="add-billing-company-field" class="add-field-button" role="button" tabindex="0">
              <i class="bi-plus-circle-fill" role="presentation"></i>
              Add Company
            </div>
          ';
        }
      ?>
  
        <label for="billing-company" class="sr-only">company</label>
        <input type="text"
          id="billing-company"
          class="<?=(!$billing_company) ? 'hide' : '';?>"
          name="billing_company"
          value="<?=$billing_company ?? '';?>"
          placeholder="Company"
        >
  
  
        <label for="billing-street1" class="sr-only">Address Line 1</label>
        <input
          id="billing-street1"
          type="text"
          name="billing_street1"
          value="<?=$billing_street1 ?? '';?>"
          placeholder="Street"
          required
        >
  
        <label for="billing-street2" class="sr-only">Address Line 2</label>
        <input
          id="billing-street2"
          type="text"
          name="billing_street2"
          value="<?=$billing_street2 ?? '';?>"
          placeholder="Apartment, suite, unit, etc."
        >
  
      </div>
  
      <div class="input-wrapper inline">
        <label for="billing-city" class="sr-only">city</label>
        <input
          id="billing-city"
          type="text"
          name="billing_city"
          value="<?=$billing_city ?? '';?>"
          placeholder="City"
          required
        >
  
        <!-- USE JAVASCRIPT TO STYLE STATE PLACEHOLDER COLOR -->
        <label for="billing-state" class="sr-only">state</label>
        <select name="billing_state" id="billing-state" required>
          <option value="" disabled <?=(!$billing_state) ? 'selected' : ''?>>State</option>
          <option value="AL" <?=($billing_state === "AL") ? 'selected' : ''?>>Alabama</option>
          <option value="AK" <?=($billing_state === "AK") ? 'selected' : ''?>>Alaska</option>
          <option value="AZ" <?=($billing_state === "AZ") ? 'selected' : ''?>>Arizona</option>
          <option value="AR" <?=($billing_state === "AR") ? 'selected' : ''?>>Arkansas</option>
          <option value="CA" <?=($billing_state === "CA") ? 'selected' : ''?>>California</option>
          <option value="CO" <?=($billing_state === "CO") ? 'selected' : ''?>>Colorado</option>
          <option value="CT" <?=($billing_state === "CT") ? 'selected' : ''?>>Connecticut</option>
          <option value="DE" <?=($billing_state === "DE") ? 'selected' : ''?>>Delaware</option>
          <option value="DC" <?=($billing_state === "DC") ? 'selected' : ''?>>District Of Columbia</option>
          <option value="FL" <?=($billing_state === "FL") ? 'selected' : ''?>>Florida</option>
          <option value="GA" <?=($billing_state === "GA") ? 'selected' : ''?>>Georgia</option>
          <option value="HI" <?=($billing_state === "HI") ? 'selected' : ''?>>Hawaii</option>
          <option value="ID" <?=($billing_state === "ID") ? 'selected' : ''?>>Idaho</option>
          <option value="IL" <?=($billing_state === "IL") ? 'selected' : ''?>>Illinois</option>
          <option value="IN" <?=($billing_state === "IN") ? 'selected' : ''?>>Indiana</option>
          <option value="IA" <?=($billing_state === "IA") ? 'selected' : ''?>>Iowa</option>
          <option value="KS" <?=($billing_state === "KS") ? 'selected' : ''?>>Kansas</option>
          <option value="KY" <?=($billing_state === "KY") ? 'selected' : ''?>>Kentucky</option>
          <option value="LA" <?=($billing_state === "LA") ? 'selected' : ''?>>Louisiana</option>
          <option value="ME" <?=($billing_state === "ME") ? 'selected' : ''?>>Maine</option>
          <option value="MD" <?=($billing_state === "MD") ? 'selected' : ''?>>Maryland</option>
          <option value="MA" <?=($billing_state === "MA") ? 'selected' : ''?>>Massachusetts</option>
          <option value="MI" <?=($billing_state === "MI") ? 'selected' : ''?>>Michigan</option>
          <option value="MN" <?=($billing_state === "MN") ? 'selected' : ''?>>Minnesota</option>
          <option value="MS" <?=($billing_state === "MS") ? 'selected' : ''?>>Mississippi</option>
          <option value="MO" <?=($billing_state === "MO") ? 'selected' : ''?>>Missouri</option>
          <option value="MT" <?=($billing_state === "MT") ? 'selected' : ''?>>Montana</option>
          <option value="NE" <?=($billing_state === "NE") ? 'selected' : ''?>>Nebraska</option>
          <option value="NV" <?=($billing_state === "NV") ? 'selected' : ''?>>Nevada</option>
          <option value="NH" <?=($billing_state === "NH") ? 'selected' : ''?>>New Hampshire</option>
          <option value="NJ" <?=($billing_state === "NJ") ? 'selected' : ''?>>New Jersey</option>
          <option value="NM" <?=($billing_state === "NM") ? 'selected' : ''?>>New Mexico</option>
          <option value="NY" <?=($billing_state === "NY") ? 'selected' : ''?>>New York</option>
          <option value="NC" <?=($billing_state === "NC") ? 'selected' : ''?>>North Carolina</option>
          <option value="ND" <?=($billing_state === "ND") ? 'selected' : ''?>>North Dakota</option>
          <option value="OH" <?=($billing_state === "OH") ? 'selected' : ''?>>Ohio</option>
          <option value="OK" <?=($billing_state === "OK") ? 'selected' : ''?>>Oklahoma</option>
          <option value="OR" <?=($billing_state === "OR") ? 'selected' : ''?>>Oregon</option>
          <option value="PA" <?=($billing_state === "PA") ? 'selected' : ''?>>Pennsylvania</option>
          <option value="RI" <?=($billing_state === "RI") ? 'selected' : ''?>>Rhode Island</option>
          <option value="SC" <?=($billing_state === "SC") ? 'selected' : ''?>>South Carolina</option>
          <option value="SD" <?=($billing_state === "SD") ? 'selected' : ''?>>South Dakota</option>
          <option value="TN" <?=($billing_state === "TN") ? 'selected' : ''?>>Tennessee</option>
          <option value="TX" <?=($billing_state === "TX") ? 'selected' : ''?>>Texas</option>
          <option value="UT" <?=($billing_state === "UT") ? 'selected' : ''?>>Utah</option>
          <option value="VT" <?=($billing_state === "VT") ? 'selected' : ''?>>Vermont</option>
          <option value="VA" <?=($billing_state === "VA") ? 'selected' : ''?>>Virginia</option>
          <option value="WA" <?=($billing_state === "WA") ? 'selected' : ''?>>Washington</option>
          <option value="WV" <?=($billing_state === "WV") ? 'selected' : ''?>>West Virginia</option>
          <option value="WI" <?=($billing_state === "WI") ? 'selected' : ''?>>Wisconsin</option>
          <option value="WY" <?=($billing_state === "WY") ? 'selected' : ''?>>Wyoming</option>
        </select>
  
        <label for="billing-zip" class="sr-only">zip</label>
        <input
          type="text"
          id="billing-zip"
          name="billing_zip"
          value="<?=$billing_zip ?? '';?>"
          placeholder="ZIP"
          pattern="\d{5}"
          maxlength="5"
          inputmode="numeric"
          required
        >
      </div>
  
  </fieldset>
  
    <div class="input-wrapper">
      <label for="email">Email</label>
      <input
        type="email"
        id="email"
        name="email"
        value="<?=$email ?? '';?>"
        required
      >
    </div>
  
    <br>
  
    <div class="input-wrapper">
      <label for="phone">Phone Number</label>
      <input
        type="tel"
        id="phone"
        name="phone"
        value="<?=$phone ?? '';?>"
        placeholder="555-555-5555"
        inputmode="numeric"
        maxlength="12"
        pattern="(\d{3})-(\d{3})-(\d{4})"
      >
    </div>

    <!-- checkout navigation buttons -->
    <div class="form-navigation-buttons">
      <a href="#" class="empty-link"></a>
      <button class="button next" type="submit">
        Continue to Shipping
        <i class="bi-caret-right-fill" role="presentation"></i>
      </button>
    </div>


  </div>


</form>