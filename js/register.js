
document.addEventListener("DOMContentLoaded", function () {
    var signupBtn = document.getElementById("signupBtn");
    var modal = document.getElementById("registerModal");
    var closeBtn = document.getElementById("closeBtn-register");

    signupBtn.addEventListener("click", function () {
        modal.style.display = "flex";
    });

    closeBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    });
});

// function validateForm() {
//     var username = document.getElementById('username').value;
//     var password = document.getElementById('password').value;

//     if (username.trim() === "") {
//         alert("Username is required.");
//         return false;
//     }

//     if (password.trim() === "") {
//         alert("Password is required.");
//         return false;
//     }

//     return true;
// }