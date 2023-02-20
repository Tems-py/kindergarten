document.getElementById("who").addEventListener("change", () => {
    let x = document.getElementById("who");
    let h = document.getElementsByClassName("option");
    document.getElementById("option1").classList.add("hidden");
    document.getElementById("option2").classList.add("hidden");
    document.getElementById("option3").classList.add("hidden");
    for (let i=0; i<h.length; i++){
        h[i].value = null;
    }
    if (x.value === "1"){
        document.getElementById("option1").classList.remove("hidden");
    }
    else if (x.value === "2"){
        document.getElementById("option2").classList.remove("hidden");
    }
    else if (x.value === "3"){
        document.getElementById("option3").classList.remove("hidden");
    }
})