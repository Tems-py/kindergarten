document.getElementById("account").addEventListener("change", x)
function x() {
    axios({
        url: 'http://localhost/kindergarten/panel/admin/edit_account/api.php',
        data: {"account": Number(document.getElementById("account").value)},
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
    })
        .then(function (response) {
            document.getElementById("name").value = response.data['name'];
            document.getElementById("surname").value = response.data['familyName'];
            document.getElementById("email").value = response.data['email'];
            document.getElementById("type").value = response.data['accountType'];
            console.log(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
}

x();