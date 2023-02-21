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

function show_parents(){
    let h = document.getElementById("p_list");
    h.innerHTML = "";
    for (let i=0; i<parents.length; i++){
        h.innerHTML += `<li>${parents[i].name} <input type="button" value="Remove" onclick="remove(${i})"></li>`
    }
}

function remove(i){
    let opt = document.createElement('option');
    opt.value = parents[i].id;
    opt.innerHTML = parents[i].name;
    document.getElementById("parent").appendChild(opt);
    parents.splice(i, 1);
    show_parents();
}

let parents = [];
document.getElementById("add_parent").addEventListener("click", () => {
    let name = document.getElementById("parent").options[document.getElementById("parent").selectedIndex].text
    parents.push({"id": document.getElementById("parent").value, "name": name});
    document.getElementById("parent").remove(document.getElementById("parent").selectedIndex);
    show_parents();
});

document.getElementById("p_add").addEventListener("click", () => {
    let l = "";
    for (let i=0; i<parents.length; i++){
        l += parents[i].id + " ";
    }
    console.log(l);
    axios({
        url: 'http://localhost/kindergarten/panel/admin/edit_child/api2.php',
        data: {"parents": l, "child": document.getElementById("child").value},
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }})
        .then(function (response){
           console.log(response.data)
        });
})
