// ================================
// MOBILE MENU
// ================================

function toggleMenu() {

    const nav =
        document.getElementById("navLinks");

    if (nav) {

        nav.classList.toggle("show");

    }

}


// ================================
// PASSWORD SHOW / HIDE
// ================================

function togglePassword() {

    const password =
        document.getElementById("password");

    if (!password) {
        return;
    }


    if (password.type === "password") {

        password.type = "text";

    } else {

        password.type = "password";

    }

}


// ================================
// REGISTRATION VALIDATION
// ================================

function validateForm() {

    const name =
        document.getElementById("name");

    const email =
        document.getElementById("email");

    const phone =
        document.getElementById("phone");

    const password =
        document.getElementById("password");


    if (name.value.trim() === "") {

        alert("Please enter your name.");

        name.focus();

        return false;

    }


    if (email.value.trim() === "") {

        alert("Please enter your email.");

        email.focus();

        return false;

    }


    const phonePattern =
        /^[0-9]{10}$/;


    if (!phonePattern.test(phone.value.trim())) {

        alert(
            "Please enter a valid 10 digit phone number."
        );

        phone.focus();

        return false;

    }


    if (password.value.length < 6) {

        alert(
            "Password must contain at least 6 characters."
        );

        password.focus();

        return false;

    }


    return true;

}


// ================================
// CONTACT FORM
// ================================

function contactMessage() {

    const name =
        document.getElementById("contactName");


    alert(
        "Thank you " +
        name.value +
        "! Your message has been received."
    );


    return false;

}