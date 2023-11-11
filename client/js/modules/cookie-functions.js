export function getCookie(cookieName) {
  let decodedCookie = decodeURIComponent(document.cookie);
  let cookieArray = decodedCookie.split(';');
  let regexp = new RegExp("^\\s?" + cookieName + "=");

  const cookie = cookieArray.find(cookie => cookie.search(regexp) >= 0);

  if(cookie) {
    return cookie.substring(cookie.indexOf(cookieName) + cookieName.length + 1, cookie.length);
  } else {
    return null;
  }

}

export function setCookie(name, value, expDays = 7, path = '/') {
  let date = new Date();
  date.setTime(date.getTime() + (expDays*24*60*60*1000))
  let expire = date.toUTCString();
  document.cookie = `${name}=${value};expires=${expire};path=${path}`;
}

export function removeCookie(name) {
  const cookie = getCookie(name);
  // return error if cookie not found
  if(!cookie) return console.error(`ERROR: Cannot remove cookie, no cookie found with the name of: ${name}`);
  // remove cookie if found by setting exp date in the past
  setCookie(name, '', -1);
  console.log(`removed cookie ${name}`)
}