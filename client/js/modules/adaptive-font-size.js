const cardProductNames = document.querySelectorAll('.product-name');

// only on non-mobile layouts
if(window.innerWidth > 768) {
  cardProductNames.forEach(name => {
    if(name.textContent.length > 16) {
      name.style.fontSize = '1.35rem';
    }
  });
}