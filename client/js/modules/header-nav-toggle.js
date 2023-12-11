

export function toggleNav() {
  
  if (toggleIcon.classList.contains('active')) {
    toggleIcon.classList.remove('active');
    toggleIcon.setAttribute('aria-pressed', 'false');
  } else {
    toggleIcon.classList.add('active');
    toggleIcon.setAttribute('aria-pressed', 'true');
  }
  navContainer.classList.toggle('show');
  
}

const toggleIcon = document.querySelector('.mobile-nav-toggle');
const navContainer = document.querySelector('#mobile-nav-container')

toggleIcon.addEventListener('click', () => {
  toggleNav();
})


// brands toggle

export function toggleBrands() {
  if (brandsToggle.classList.contains('active')) {
    brandsToggle.classList.remove('active');
    brandsToggle.setAttribute('aria-pressed', 'false');
  } else {
    brandsToggle.classList.add('active');
    brandsToggle.setAttribute('aria-pressed', 'true')
  }
}

const brandsToggle = document.querySelector('#brands-header-mobile');

brandsToggle.addEventListener('click', () => {
  toggleBrands();
})