var email = document.getElementById("email");
var errorMensaje = document.getElementById("errorEmail");
var errorMensaje2 = document.getElementById("errorEmail2");
function validarFormulario() {
  var formularioValido = true;
  if (email.value === "") {
    errorMensaje.textContent = "Este campo es requerido";
    formularioValido = false;
  } else {
    errorMensaje.textContent = "";
  }
  // Expresión regular para validar el formato del email
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (emailRegex.test(email.value)) {
    errorMensaje2.textContent = "";
  } else {
    errorMensaje2.textContent = "Ingrese un email válido";
    formularioValido = false;
  }
  
  return formularioValido;
}
email.addEventListener("input", validarFormulario);

document.getElementById("myForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Evita que el formulario se envíe por defecto

  if (validarFormulario()) {
    document.getElementById("email").value = "";
  }
});