
export const setContent = (function(message) {
  const output = document.querySelector('.output');
  output.textContent = message;
})('idk')


const button = document.querySelector('#test-button');
button.addEventListener('click', () => {
  setContent('clicked button');
})






