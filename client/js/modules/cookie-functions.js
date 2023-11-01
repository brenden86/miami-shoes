export function getCookie(cookieName) {
  let decodedCookie = decodeURIComponent(document.cookie);
  let cookieArray = decodedCookie.split(';');
  let regexp = new RegExp("^\\s?" + cookieName + "=");
  // loop through cookies array, look for match
  let cookieValue = '';
  cookieArray.forEach(cookie => {
    if(cookie.search(regexp) >= 0) {
      // return cookie value
      cookieValue = cookie.substring(cookie.indexOf(cookieName) + cookieName.length + 1, cookie.length);
    }
  })
  if(cookieValue) {
    return cookieValue;
  } else {
    return '';
  }
}

export function setCookie(name, value, expDays = 7) {
  let date = new Date();
  date.setTime(date.getTime() + (expDays*24*60*60*1000))
  let expire = date.toUTCString();
  document.cookie = `${name}=${value};expires=${expire}`;
}