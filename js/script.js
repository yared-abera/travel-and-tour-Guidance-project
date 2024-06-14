const menu = document.querySelector('#menu-btn');
const navbar = document.querySelector('.header .navbar');

menu.onclick = () => {
	menu.classList.toggle('fa-times');
	navbar.classList.toggle('active');
};

window.onscroll = () => {
	menu.classList.remove('fa-times');
	navbar.classList.remove('active');
};
const loadMoreBtn = document.querySelector('.packages .load-more .btn');
let currentItem = 3;

loadMoreBtn.onclick = () => {
	const boxes = [...document.querySelectorAll('.packages .box-container .box')];
	for (let i = currentItem; i < currentItem + 3; i + 1) {
		boxes[i].style.display = 'inline-block';
	}
	currentItem += 3;
	if (currentItem >= boxes.length) {
		loadMoreBtn.style.display = 'none';
	}
};


const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i => {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if (window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if (searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if (window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if (window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if (this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})

const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if (this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})
document.querySelectorAll('.delete-btn').forEach(btn => {
	btn.addEventListener('click', deletePackage);
});

function deletePackage(event) {
	event.preventDefault();
	const packageName = event.target.dataset.packageName;

	if (confirm(`Are you sure you want to delete the package "${packageName}"?`)) {
		fetch(`delete_package.php`, {
			method: 'DELETE',
			headers: {
				'Content-Type': 'application/json'
			},
			body: JSON.stringify({ package_name: packageName })
		})
			.then(response => response.text())
			.then(data => {
				alert(data);
				location.reload();
			})
			.catch(error => {
				alert('Error deleting package: ' + error);
			});
	}
}
document.getElementById('updateForm').addEventListener('submit', function (event) {
	event.preventDefault(); // Prevent the default form submission

	// Get the form data
	var formData = new FormData(event.target);

	// Send the form data using AJAX
	fetch('<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?update=" . $updateId; ?>', {
		method: 'POST',
		body: formData
	})
		.then(response => response.json())
		.then(data => {
			// Handle the response from the server
			console.log(data);
			// Redirect the user to the index.php page or display a success message
			window.location.href = 'index.php';
		})
		.catch(error => {
			// Handle any errors
			console.error('Error:', error);
		});
});
var xhr = new XMLHttpRequest();
xhr.open('POST', '<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?update=" . $updateId; ?>', true);
xhr.onreadystatechange = function () {
	if (xhr.readyState === 4 && xhr.status === 200) {
		// Handle the response from the server
		console.log(xhr.responseText);
		// Redirect the user to the index.php page or display a success message
		window.location.href = 'index.php';
	}
};
xhr.send(formData);