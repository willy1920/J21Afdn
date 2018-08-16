function updateNota(idNota) {
    let ask, request, input;
    ask = confirm("Apakah anda yakin menerima nota " + idNota);
    if (ask) {
        input = 'id=' + id;
        request =  ajax(request);
        request.onreadystatechange = function() {
            if (request.status == 200 && request.readyState == 4) {
                console.log(request.responseText);
                
                if (request.responseText == 1) {
                    window.location = "category.php";
                }
                else{
                    alert("Failed to delete");
                }
            }
        }
        request.open("POST", "notaUpdate.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(input);
    }
}