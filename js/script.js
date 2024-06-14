// Select DOM elements
const menuBtn = document.querySelector('#menu-btn');
const navbar = document.querySelector('.header .navbar');
const loadMoreBtn = document.querySelector('.packages .load-more .btn');
const packageContainer = document.querySelector('.packages .box-container');
const sidebarMenuItems = document.querySelectorAll('#sidebar .side-menu.top li a');

// Initialize variables
let currentItem = 3;
let currentPackages = 4;

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
  for (let i = currentItem; i < currentItem + 3 && i < boxes.length; i++) {
    boxes[i].style.display = 'inline-block';
  }
  currentItem += 3;
  if (currentItem >= boxes.length) {
    loadMoreBtn.style.display = 'none';
  }
});

// Toggle active state of sidebar menu items
sidebarMenuItems.forEach(item => {
  const li = item.parentElement;
  item.addEventListener('click', () => {
    sidebarMenuItems.forEach(i => i.parentElement.classList.remove('active'));
    li.classList.add('active');
  });
});

// Alternative "See More" functionality
loadMoreBtn.addEventListener('click', () => {
  const packageBoxes = packageContainer.querySelectorAll('.box');
  for (let i = currentPackages; i < currentPackages + 3 && i < packageBoxes.length; i++) {
    packageBoxes[i].style.display = 'block';
  }
  currentPackages += 3;
  if (currentPackages >= packageBoxes.length) {
    loadMoreBtn.style.display = 'none';
  }
});



// Select all the input fields in the form

const inputFields = document.querySelectorAll('.book-form input');

// Add event listener to each input field

inputFields.forEach(input => {
  input.addEventListener('focus', () => {
    input.style.outline = 'none';
  });
});



