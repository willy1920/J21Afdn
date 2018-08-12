function checkPass() {
    let pass1, pass2;
    pass1 = document.getElementById('pass1').value;
    pass2 = document.getElementById('pass2').value;
    if (pass1 != pass2) {
        document.getElementById('labelPass').innerHTML = "Password tidak cocok";
    }
    else{
        document.getElementById('labelPass').innerHTML = "";
    }
}