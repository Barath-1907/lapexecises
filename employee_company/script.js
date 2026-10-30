function validateRegistration() {

    let name = document.getElementById("name").value.trim();

    let email = document.getElementById("email").value.trim();

    let phone = document.getElementById("phone").value.trim();

    let department = document.getElementById("department").value.trim();

    let designation = document.getElementById("designation").value.trim();

    let password = document.getElementById("password").value;

    let role = document.getElementById("role").value;


    if (name === "") {
        alert("Please enter your name");
        return false;
    }


    if (email === "") {
        alert("Please enter email");
        return false;
    }


    if (phone === "") {
        alert("Please enter phone number");
        return false;
    }


    if (department === "") {
        alert("Please enter department");
        return false;
    }


    if (designation === "") {
        alert("Please enter designation");
        return false;
    }


    if (password.length < 4) {
        alert("Password must contain at least 4 characters");
        return false;
    }


    if (role === "") {
        alert("Please select account type");
        return false;
    }


    return true;
}