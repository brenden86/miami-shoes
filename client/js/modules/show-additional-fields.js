

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

export function showCheckoutInput(input, button = null) {
  if(input.classList.contains('hide')) {
    input.classList.remove('hide')
  }
  if(button) button.remove();
}

// show billing company
showBillingCompanyButton?.addEventListener('click', () => {
  showCheckoutInput(billingCompanyInput, showBillingCompanyButton);
})

// show shipping company
showShippingCompanyButton?.addEventListener('click', () => {
  showCheckoutInput(shippingCompanyInput, showShippingCompanyButton)
})

// show delivery instructions
showDeliveryInstructionsButton?.addEventListener('click', () => {
  showCheckoutInput(deliveryInstructionsInput, showDeliveryInstructionsButton);
})

// hide shipping address & clear values if addresses are the same
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
        input.required = false;
      } else {
        input.required = true;
      }
    })
  })

}