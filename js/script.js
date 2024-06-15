// Select DOM elements
const menuBtn = document.querySelector('#menu-btn');
const navbar = document.querySelector('.header .navbar');
const loadMoreBtn = document.querySelector('.packages .load-more .btn');
const packageContainer = document.querySelector('.packages .box-container');
const sidebarMenuItems = document.querySelectorAll('#sidebar .side-menu.top li a');

// Initialize variables
let currentItem = 2;
let currentPackages = 2;

// Toggle mobile menu
menuBtn.addEventListener('click', () => {
  menuBtn.classList.toggle('fa-times');
  navbar.classList.toggle('active');
});

window.addEventListener('scroll', () => {
  menuBtn.classList.remove('fa-times');
  navbar.classList.remove('active');
});

// Load more packages
loadMoreBtn.addEventListener('click', () => {
  const boxes = packageContainer.querySelectorAll('.box');
  for (let i = currentItem; i < currentItem + 2 && i < boxes.length; i++) {
    boxes[i].style.display = 'inline-block';
  }
  currentItem += 2;
  if (currentItem >= boxes.length) {
    loadMoreBtn.style.display = 'none';
  }
});

 
// // Alternative "See More" functionality
// loadMoreBtn.addEventListener('click', () => {
//   const packageBoxes = packageContainer.querySelectorAll('.box');
//   for (let i = currentPackages; i < currentPackages + 2 && i < packageBoxes.length; i++) {
//     packageBoxes[i].style.display = 'block';
//   }
//   currentPackages += 2;
//   if (currentPackages >= packageBoxes.length) {
//     loadMoreBtn.style.display = 'none';
//   }
// });


//after this vaon will continue



