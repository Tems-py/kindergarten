document.getElementById("child").addEventListener("change", x)
let saved = document.getElementById("parent").options;
let options = [];
for (let y=0; y<saved.length;y++){
    let lll = saved[y];
    options.push([lll.value, lll.text]);
}

function arraysEqual(a, b) {
    if (a === b) return true;
    if (a == null || b == null) return false;
    if (a.length !== b.length) return false;

    for (var i = 0; i < a.length; ++i) {
        if (a[i] !== b[i]) return false;
    }
    return true;
}

function contains(a, b){
    for (let i=0; i < a.length; i++){
        if (arraysEqual(a[i], b))
            return true
    }
    return false
}

console.log(options);
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

    axios({
        url: 'http://localhost/kindergarten/panel/admin/edit_child/api3.php',
        data: {"child": Number(document.getElementById("child").value)},
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
    })
        .then(function (response) {
            console.log(response.data)
            parents = [];
            for (let i=0; i<response.data.length; i++){
                parents.push([response.data[i][0], `${response.data[i][1]} ${response.data[i][2]} (${response.data[i][0]})`]);
            }

            optionsReset();
            show_parents();
            console.log(options);
            console.log(parents);

            for (let i=0; i<options.length; i++){
                if (!contains(parents, options[i])){
                    let opt = document.createElement('option');
                    opt.value = options[i][0];
                    opt.innerHTML = options[i][1];
                    document.getElementById("parent").appendChild(opt);
                }
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}

x();


function optionsReset(){
    let h = document.getElementById("parent");
    while (h.options.length > 0){
        h.options.remove(0);
    }
}

function show_parents(){
    let h = document.getElementById("p_list");
    h.innerHTML = "";
    for (let i=0; i<parents.length; i++){
        h.innerHTML += `<li>${parents[i][1]} <input type="button" value="Remove" onclick="remove(${i})"></li>`
    }
}

function remove(i){
    let opt = document.createElement('option');
    opt.value = parents[i][0];
    opt.innerHTML = parents[i][1];
    document.getElementById("parent").appendChild(opt);
    parents.splice(i, 1);
    show_parents();
}

let parents = [];
document.getElementById("add_parent").addEventListener("click", () => {
    let name = document.getElementById("parent").options[document.getElementById("parent").selectedIndex].text
    parents.push([document.getElementById("parent").value, name]);
    document.getElementById("parent").remove(document.getElementById("parent").selectedIndex);
    show_parents();
});

document.getElementById("p_add").addEventListener("click", () => {
    let l = "";
    for (let i=0; i<parents.length; i++){
        l += parents[i][0] + " ";
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
