document.addEventListener('DOMContentLoaded', function() {

    //Elementos recogidos por id

    var tabla = document.getElementById("tabla");
    var usuarios = document.getElementById("usuarios");
    var nuevos = document.getElementById("nuevos");

    //Lista de eventos

    usuarios.addEventListener("click", mostrarTablaUsuarios);
    nuevos.addEventListener("click", mostrarTablaNuevos);

    //Funciones

    //Cambiar tabla

    function mostrarTablaUsuarios() {
        nuevos.removeAttribute("class");
        usuarios.setAttribute("class", "subrayado");
    }

    function mostrarTablaNuevos() {
        usuarios.removeAttribute("class");
        nuevos.setAttribute("class", "subrayado");
    }

});