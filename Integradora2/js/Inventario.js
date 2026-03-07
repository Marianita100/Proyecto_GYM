function mostrar(id){
    let grupos = document.querySelectorAll(".grupo");
    grupos.forEach(g => g.style.display = "none");

    document.getElementById(id).style.display = "grid";
}