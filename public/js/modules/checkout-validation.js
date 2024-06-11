
// client-side validation of the checkout information input fields

const billingZip = document.querySelector('#billing-zip');
const shippingZip = document.querySelector('#shipping-zip');
const phone = document.querySelector('#phone');
const creditCardZip = document.querySelector('#credit-card-zip');
const cardNumber = document.querySelector('#card-number');
const cvv = document.querySelector('#cvv');
const cardExp = document.querySelector('#card-exp');

let numbericInputs = [
  billingZip,
  shippingZip,
  phone,
  creditCardZip,
  cardNumber,
  cvv,
  cardExp
]

// listen to numeric inputs and only allow digits to be entered

numbericInputs.forEach(input => {
  
  input?.addEventListener('keypress', (e) => {
    if(!e.key.match(/\d+/)) {
      e.preventDefault();
    }
  })
  
})

// functions for formatting input

export function formatPhoneNumber() {
  let phoneDigits = phone.value.replaceAll(/\D/gi, "");
  if(phoneDigits.length >= 7) {
    phone.value = phoneDigits.substring(0,3)+"-"+phoneDigits.substring(3,6)+"-"+phoneDigits.substring(6,phoneDigits.length);
  } else if (phoneDigits.length >= 4) {
    phone.value = phoneDigits.substring(0,3)+"-"+phoneDigits.substring(3,phoneDigits.length);
  }
}

export function formatCardNumber() {
  let cardDigits = cardNumber.value.replaceAll(/\s/gi, "");
  let cardSegments = cardDigits.match(/.{1,4}/g) ?? [];
  cardNumber.value = cardSegments.join(' ') ?? '';
}

export function formatCardExp() {
  let dateDigits = cardExp.value.replaceAll(/\D/gi, "");
  let dateSegments = dateDigits.match(/.{1,2}/g) ?? [];
  cardExp.value = dateSegments.join('/');
}


// Input event listeners

// format phone number
phone?.addEventListener('keyup', () => {
  formatPhoneNumber();
})

// format credit card number
cardNumber?.addEventListener('keyup', () => {
  formatCardNumber();
})

// format card exp date
cardExp?.addEventListener('keyup', () => {
  formatCardExp();
})


// format all inputs on initial load if data is present
if(phone) formatPhoneNumber();
if(cardNumber) formatCardNumber();
if(cardExp) formatCardExp();