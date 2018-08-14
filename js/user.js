function submitTrolli() {
    let input, request, idAccount, idProduct, stock;

    idAccount = document.getElementById('idAccount').value;
    idProduct = document.getElementById('idProduct').value;
    stock = document.getElementById('trolliStock').value;

    input = "idAccount=" + idAccount + "&idProduct=" + idProduct + "&stock=" + stock;
    request =  ajax(request);
    console.log(input);
    
    request.onreadystatechange = function() {
        if (request.status == 200 && request.readyState == 4) {
            console.log(request.responseText);
        }
    }
    request.open("POST", "trolli.php", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(input);
}