document.getElementById("child").addEventListener("change", x)
function x() {
    axios({
        url: 'http://localhost/kindergarten/panel/admin/edit_child/api.php',
        data: {"child": Number(document.getElementById("child").value)},
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
    })
        .then(function (response) {
            document.getElementById("i_name").value = response.data['name'];
            document.getElementById("i_surname").value = response.data['familyName'];
            document.getElementById("i_birthdate").value = response.data['birthdate'];
            document.getElementById("i_group").value = response.data['groupId'];
            console.log(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
}

x();