// Main navbar toggle
$(document).ready(function () {
    $("#burgerIcon, #toggle").click(function () {
        $("#navLinks").toggleClass("show");
        $("#burgerIcon").toggleClass(
            "active_burger",
            $("#navLinks").hasClass("show")
        );
    });
});



//code for message duration for the system success and fail 
(function () {
    const alertElements = document.getElementsByClassName("alert");

    for (let alertIndex = 0; alertIndex < alertElements.length; alertIndex++) {
        const currentAlert = alertElements[alertIndex];
        const duration = parseInt(currentAlert.dataset.duration);

        setTimeout(function () {
            currentAlert.style.opacity = "0";
            currentAlert.style.display = "none";
        }, duration);
    }
})();



//Delete button toogle on typing the password 
document.addEventListener("DOMContentLoaded", function() {
    const passwordInput = document.getElementById('password');
    const deleteButton = document.getElementById('deleteButton');

    passwordInput.addEventListener('input', function() {
        if (passwordInput.value.trim() !== '') {
            deleteButton.style.display = 'inline';
        } else {
            deleteButton.style.display = 'none';
        }
    });
});



//counting the exprience in the about page
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');
  
    counters.forEach(counter => {
      const update = () => {
        const target = +counter.dataset.target;
        const count = +counter.innerText;
        const increment = target / 100;
  
        if (count < target) {
          counter.innerText = Math.ceil(count + increment);
          setTimeout(update, 20);
        } else {
          counter.innerText = target;
        }
      };
      update();
    });
});
  


// code for toggling the eye the password input to show the it and hide it
function togglePassword(iconSpan) {
    const targetId = iconSpan.getAttribute('data-target');
    const input = document.getElementById(targetId);
    const icon = iconSpan.querySelector('i');

    icon.classList.add('rotate-animation');

    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }

    setTimeout(() => {
        icon.classList.remove('rotate-animation');
    }, 300); // match animation duration
}


