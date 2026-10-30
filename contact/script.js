function validateContact() {

    let name = document.getElementById("name").value.trim();

    let email = document.getElementById("email").value.trim();

    let phone = document.getElementById("phone").value.trim();

    let address = document.getElementById("address").value.trim();


    if (name === "") {

        alert("Please enter contact name");

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


    if (address === "") {

        alert("Please enter address");

        return false;
    }


    return true;
}


function confirmDelete() {

    return confirm(
        "Are you sure you want to delete this contact?"
    );

}