  
  window.addEventListener("DOMContentLoaded" , () => {
    var element = document.getElementById("navbar");
    document.addEventListener("scroll", () => {
        if (window.scrollY > 0) {
        element.classList.remove('nav-big')
        element.classList.add('nav-small')
        }else if (document.documentElement.scrollTop === 0){
            element.classList.remove('nav-small');
            element.classList.add('nav-big');
            
        }
            
    });  
});



    function validarFormulario() {
        var input = document.getElementById("myInput");
        var errorSpan = document.getElementById("myError");
        var email = document.getElementById("email");
        var errorSpan2 = document.getElementById("mensajeError2");
        var errorSpan22 = document.getElementById("mensajeError22");
        var mensaje = document.getElementById("mensaje");
        var errorSpan4 = document.getElementById("mensajeError4");
        var errorSpan44 = document.getElementById("mensajeError44");


        var formularioValido = true;


        if (input.value == "")  {
        errorSpan.textContent = "Este campo es requerido.";
        formularioValido = false;
        } else {
        errorSpan.textContent = "";
        }

        if (email.value == "") {
        errorSpan2.textContent = "Este campo es requerido.";
        formularioValido = false;
        } else {
        errorSpan2.textContent = "";
        }
        // creamos una variable const con una expresion regular
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailRegex.test(email.value)) {
        errorSpan22.textContent = "";
        }else {
        errorSpan22.textContent = "Ingrese un email valido";
        formularioValido = false;
        }



        if (mensaje.value == "") {
        errorSpan4.textContent = "Este campo es requerido.";
        formularioValido = false;
        } else {
        errorSpan4.textContent = "";
        }

        var expresionRegular = /^.{20,}$/;
        if (expresionRegular.test(mensaje.value)) {
        errorSpan44.textContent = "";
        }else {
        errorSpan44.textContent = "Ingrese al menos 20 caracteres";
        formularioValido = false;
        }

        return formularioValido;


}

        var input = document.getElementById("myInput");
        input.addEventListener("input", validarFormulario);

        var email = document.getElementById("email");
        email.addEventListener("input", validarFormulario);

        var mensaje = document.getElementById("mensaje");
        mensaje.addEventListener("input", validarFormulario);

    
    document.getElementById("myForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Evita que se envíe el formulario por defecto
        validarFormulario(); // Validar el formulario antes de enviarlo


        if(validarFormulario()){
             // Vacía los campos de entrada
        document.getElementById('myInput').value = '';
        document.getElementById('email').value = '';
        document.getElementById('mensaje').value = '';
        }
       
});


 







