function validation() {

    var name = document.getElementById("name").value.trim();
    var email = document.getElementById("email").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var department = document.getElementById("department").value;

 
    if (name === "") {
        alert("Please enter employee name");
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
        alert("Please select department");
        return false;
    }
    return true;
}