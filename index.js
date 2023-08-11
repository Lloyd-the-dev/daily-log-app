// Code for rotating effect of login and Signup page
const card = document.getElementById("card");
function openRegister(){
    card.style.transform = "rotateY(-180deg)";
}
function openLogin(){
    card.style.transform = "rotateY(0deg)";
}

