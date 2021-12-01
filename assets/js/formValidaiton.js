function validate() {

    var firstName = document.getElementById("firstName");
    var lastName = document.getElementById("lastName");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementsByClassName("gender");
    var hobbies = document.getElementsByClassName("hobbies");
    var city = document.getElementById("city");
    var address = document.getElementById("address");
    var photo = document.getElementById("photo");

    var hobCount = 0;
    var genCount = 0;
    for (i = 0; i < hobbies.length; i++) {
        if (hobbies[i].checked) {
            hobCount++;
        }
    }
    for (i = 0; i < gender.length; i++) {
        if (gender[i].checked) {
            genCount++;
        }
    }
    if (firstName.value == "") {
        alert("First Name Is Mandatory.");
        firstName.focus();
    } else if (!isNaN(firstName.value)) {
        alert("First Name Can't in Digits.");
        firstName.value = "";
        firstName.focus();
    } else if (lastName.value == "") {
        alert("Last Name Is Mandatory.");
        lastName.focus();
    } else if (!isNaN(lastName.value)) {
        alert("Last Name Can't in Digits.");
        lastName.value = "";
        lastName.focus();
    } else if (mobile.value == "") {
        alert("Mobile Is Mandatory.");
        mobile.focus();
    } else if (isNaN(mobile.value)) {
        alert("Mobile can only be in digits.");
        mobile.value = "";
        mobile.focus();
    } else if (mobile.value.length > 10 || mobile.value.length < 10) {
        alert("Mobile Should be of 10 digits.");
        mobile.value = "";
        mobile.focus();
    } else if (email.value == "") {
        alert("Email Is Mandatory.");
        email.value = "";
        email.focus();
    } else if (!validateEmail(email.value)) {
        alert("Please enter a valid email.");
        email.value = "";
        email.focus();
    } else if (genCount == 0) {
        alert("Please Select Gender.");
    } else if (hobCount == 0) {
        alert("Please Select Atleast One Hobby.");
    } else if (city.value == "") {
        alert("Please Select City.");
        city.focus();
    } else if (address.value == "") {
        alert("Address Is Mandatory.");
        address.focus();
    } else if (photo.value == "") {
        alert("Photo Is Mandatory.");
        photo.style.outline = "1px solid red";
    }else {
        if(confirm("Are you sure want to submit the form data?")){
            document.frm.submit();
        }
    }
}

function changeBGColor() {
    var city = document.getElementById("city").value;
    if (city === "LKW")
        document.body.style.backgroundColor = "Green";
    else if (city === "VNS")
        document.body.style.backgroundColor = "Yellow";
    else if (city === "MGS")
        document.body.style.backgroundColor = "lightgrey";
    else
        document.body.style.backgroundColor = "white";
}

function validateEmail(email) {
    if (email.includes("@") && email.includes(".")) {
        var indexOfAtRate = email.indexOf("@");
        var indexOfDot = email.indexOf(".");
        if (indexOfAtRate < indexOfDot) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}