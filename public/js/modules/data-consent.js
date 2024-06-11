
// check if user has acknowledged user data notice

import { getCookie, removeCookie, setCookie } from './cookie-functions.js';
import { showPopup, closePopup } from './popups.js';

export const acceptDataConsent = () => setCookie('user-data-consent', 'true', 90)

export function checkUserDataConsent() {

  // show popup if data consent cookie doesn't exist
  const dataConsentCookie = getCookie('user-data-consent');
  if(!dataConsentCookie) {
    showPopup('dataConsent', true);
  }
  
}

document.addEventListener('DOMContentLoaded', checkUserDataConsent);

document.addEventListener('click', (e) => {
  if(e.target.classList.contains('data-consent-button')) {
    closePopup();
    acceptDataConsent();
  }
})
