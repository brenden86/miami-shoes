

export function toggleNav() {
  
  toggleIcon.classList.toggle('active');
  navContainer.classList.toggle('show');
  
}

const toggleIcon = document.querySelector('.mobile-nav-toggle');
const navContainer = document.querySelector('#mobile-nav-container')

toggleIcon.addEventListener('click', () => {
  toggleNav();
})


// brands toggle

export function toggleBrands() {
  brandsToggle.classList.toggle('active');
}

const brandsToggle = document.querySelector('#brands-header-mobile');

brandsToggle.addEventListener('click', () => {
  toggleBrands();
})