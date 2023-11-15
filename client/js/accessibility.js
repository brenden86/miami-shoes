
// enable clicking on focused elements by pressing enter
document.addEventListener('keypress', (e) => {
  if(e.key === "Enter") document.activeElement.click();
})