

// Show extra field buttons
const showBillingCompanyButton = document.querySelector('#add-billing-company-field');
const showShippingCompanyButton = document.querySelector('#add-shipping-company-field');
const showDeliveryInstructionsButton = document.querySelector('#add-delivery-instructions-field')

// Extra inputs
const billingCompanyInput = document.querySelector('input[name="billing_company"]');
const shippingCompanyInput = document.querySelector('input[name="shipping_company"]');
const deliveryInstructionsInput = document.querySelector('#delivery-instructions');

// click handlers

if(showBillingCompanyButton) {
  showBillingCompanyButton.addEventListener('click', () => {
    if (billingCompanyInput.classList.contains('hide')) {
      billingCompanyInput.classList.remove('hide');
    }
    showBillingCompanyButton.remove();
  })
}

if(showShippingCompanyButton) {
  showShippingCompanyButton.addEventListener('click', () => {
    if (shippingCompanyInput.classList.contains('hide')) {
      shippingCompanyInput.classList.remove('hide');
    }
    showShippingCompanyButton.remove();
  })
}

if(showDeliveryInstructionsButton) {
  showDeliveryInstructionsButton.addEventListener('click', () => {
    if (deliveryInstructionsInput.classList.contains('hide')) {
      deliveryInstructionsInput.classList.remove('hide');
    }
    showDeliveryInstructionsButton.remove();
  })
}