
// enable clicking on focused elements by pressing enter
document.addEventListener('keydown', (e) => {
  if(e.key === "Enter" && !e.target.matches('button')) {
    // prevent double-clicking behavior on certain elements
    document.activeElement.click();
  }
})