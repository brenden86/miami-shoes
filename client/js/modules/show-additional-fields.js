

// Show extra field buttons
const showBillingCompanyButton = document.querySelector('#add-billing-company-field');
const showShippingCompanyButton = document.querySelector('#add-shipping-company-field');
const showDeliveryInstructionsButton = document.querySelector('#add-delivery-instructions-field')
const sameAsBillingCheckbox = document.querySelector('#same-as-billing');

// Extra inputs
const billingCompanyInput = document.querySelector('input[name="billing_company"]');
const shippingCompanyInput = document.querySelector('input[name="shipping_company"]');
const deliveryInstructionsInput = document.querySelector('#delivery-instructions');
const shippingAddressFields = document.querySelector('#shipping-address-fields');


// show billing company
if(showBillingCompanyButton) {
  showBillingCompanyButton.addEventListener('click', () => {
    if (billingCompanyInput.classList.contains('hide')) {
      billingCompanyInput.classList.remove('hide');
    }
    showBillingCompanyButton.remove();
  })
}

// show shipping company
if(showShippingCompanyButton) {
  showShippingCompanyButton.addEventListener('click', () => {
    if (shippingCompanyInput.classList.contains('hide')) {
      shippingCompanyInput.classList.remove('hide');
    }
    showShippingCompanyButton.remove();
  })
}

// show delivery instructions
if(showDeliveryInstructionsButton) {
  showDeliveryInstructionsButton.addEventListener('click', () => {
    if (deliveryInstructionsInput.classList.contains('hide')) {
      deliveryInstructionsInput.classList.remove('hide');
    }
    showDeliveryInstructionsButton.remove();
  })
}

// hide shipping address & clear values
if(sameAsBillingCheckbox) {
  
  // hide fields initially if checked
  if(sameAsBillingCheckbox.checked && !shippingAddressFields.classList.contains('hide')) {
    shippingAddressFields.classList.add('hide');
    // remove required attribute from fields, will be populated server-side
    
  }

  let requiredShippingInputs = shippingAddressFields.querySelectorAll('[required]');

  sameAsBillingCheckbox.addEventListener('change', () => {

    // hide/unhide fields
    shippingAddressFields.classList.toggle('hide');

    // remove required attributes if hidden
    requiredShippingInputs.forEach(input => {
      if(sameAsBillingCheckbox.checked) {
        console.log('checked')
        input.required = false;
      } else {
        console.log('unchecked')
        input.required = true;
      }
    })
  })


}