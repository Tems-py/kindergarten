document.getElementById("group").addEventListener("change", x)
function x() {
    axios({
        url: 'http://localhost/kindergarten/panel/admin/edit_group/api.php',
        data: {"group": Number(document.getElementById("group").value)},
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
    })
        .then(function (response) {
            document.getElementById("name").value = response.data['groupName'];
            document.getElementById("caretaker").value = response.data['caretakerId'];
            // console.log(response.data);

            axios({
                url: 'http://localhost/kindergarten/panel/admin/edit_group/api2.php',
                data: {"group": Number(document.getElementById("group").value)},
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
            })
                .then(function (response) {

                    // console.log(response.data);
                    let inputs = document.getElementsByClassName("checkbox");
                    for (let i = 0; i < inputs.length; i++) {
                        inputs[i].disabled = true;
                        inputs[i].checked = false;
                    }

                    axios({
                        url: 'http://localhost/kindergarten/panel/admin/edit_group/api3.php',
                        data: {"group": Number(document.getElementById("group").value)},
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                    })
                        .then(function (response2) {

                            for (let i=0; i < response2.data.length; i++){
                                document.getElementsByName(response2.data[i][0])[0].disabled = false;
                            }

                            for (let i=0; i < response.data.length; i++){
                                document.getElementsByName(response.data[i][0])[0].disabled = false;
                                document.getElementsByName(response.data[i][0])[0].checked = true;
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });



                })
                .catch(function (error) {
                    console.log(error);
                });
        })
        .catch(function (error) {
            console.log(error);
        });
}

x();