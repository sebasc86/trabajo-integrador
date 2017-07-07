

window.onload = function() {

    var formRegistro = document.formulario_registro;
    var formLogin = document.formulario_ingreso;
    var cambiarPaleta = document.querySelector('.icon');
    cambiarPaleta.addEventListener('click', function (){
        cambiarPaletaCss();
    }
);

function cambiarPaletaCss() {
    var paleta = document.querySelector("#paleta");
    var cssDoc = paleta.getAttribute("href");
    if(cssDoc == "css/paleta.css") {
        paleta.setAttribute("href","css/paleta2.css");
    }
    else {
        paleta.setAttribute("href","css/paleta.css");
    }
}

    if(typeof formRegistro !== "undefined"){
        formRegistro.addEventListener('submit', function(evento) {
            evento.preventDefault();
            if(validarRegistro().length == 0) {
                formRegistro.submit();
            }





            if(validarRegistro().length > 0){
              console.log("hay errores")
              console.log(validarRegistro())
            } else {
              console.log("esta validado");
            formRegistro.submit()

          }


        });
    }


    if(typeof formLogin !== "undefined"){
        formLogin.addEventListener('submit', function(evento) {
            validarLogin();
            return !validarRegistro();
            evento.preventDefault();
        });
    }



    function validarRegistro() {
      console.log(8);
        var nombreVal = formRegistro.nombre.value;
        var errorNombre = document.querySelector('#error_name');
        var apellidoVal = formRegistro.apellido.value;
        var errorApellido = document.querySelector('#error_surname');
        var emailVal = formRegistro.correo.value;
        var errorEmail = document.querySelector('#error_email');
        var passwordVal = formRegistro.password.value;
        var errorPassword = document.querySelector('#error_password');
        var password2Val = formRegistro.password2.value;
        var errorPassword2 = document.querySelector('#error_password2');
        var edadVal = formRegistro.edad.value;
        var errorEdad = document.querySelector('#error_edad');
        var sexoMVal = document.getElementById('hombre').checked;
        var sexoFVal = document.getElementById('mujer').checked;
        var errorSexo = document.getElementById('error_sexo');
        var conductorVal = document.getElementById('conductor').checked;
        var acompVal = document.getElementById('acompanante').checked;
        var errorConductorAcomp = document.getElementById('error_conductor_acomp');
        var acepteVal = document.getElementById('terminos').checked;
        var errorAcepte = document.getElementById('error_acepte');

        errorNombre.innerText = '';
        errorApellido.innerText = '';
        errorEmail.innerText = '';
        errorPassword.innerText = '';
        errorPassword2.innerText = '';
        errorEdad.innerText = '';
        errorSexo.innerText = '';
        errorConductorAcomp.innerText = '';
        errorAcepte.innerText = '';

        var errors = [];

        if (nombreVal == '' || nombreVal.length == 0) {
            errorNombre.innerText = 'Por favor ingrese su nombre';
            errors.push(errorNombre.innerText);
        }
        if (apellidoVal == '' || apellidoVal.length == 0) {
            errorApellido.innerText = 'Por favor ingrese su apellido';
            errors.push(errorApellido.innerText);
        }
        if (emailVal == '' || emailVal.length == 0) {
            errorEmail.innerText = 'Por favor ingrese su email';
            errors.push(errorEmail.innerText);
        }
        if (passwordVal == '' || passwordVal.length == 0) {
            errorPassword.innerText = 'Por favor ingrese su contraseña';
            errors.push(errorPassword.innerText);
        }
        if (password2Val == '' || password2Val.length == 0) {
            errorPassword2.innerText = 'Por favor repita su contraseña';
            errors.push(errorPassword2.innerText);
        }
        if (edadVal == '' || password2Val.length == 0) {
            errorEdad.innerText = 'Por favor ingrese su edad';
            errors.push(errorEdad.innerText);
        }
        if ((sexoMVal == false && sexoFVal == false) || (sexoMVal.length == 0 && sexoFVal.length == 0)) {
            errorSexo.innerText = 'Por favor indique su sexo';
            errors.push(errorSexo.innerText);
        }
        if ((conductorVal == false && acompVal == false) || (conductorVal.length == 0 && acompVal.length == 0)) {
            errorConductorAcomp.innerText = 'Por favor indique si es conductor, acompañante o ambos';
            errors.push(errorConductorAcomp.innerText);
        }
        if (acepteVal == false || acepteVal.length == 0) {
            errorAcepte.innerText = 'Por favor acepte los términos y condiciones';
            errors.push(errorAcepte.innerText);
        }

        return errors;

    }

    function validarLogin() {
        var emailVal = formLogin.correo.value;
        var errorEmail = document.querySelector('#error_email');
        var passwordVal = formLogin.password.value;
        var errorPassword = document.querySelector('#error_password');

        errorEmail.innerText = '';
        errorPassword.innerText = '';

        var errors = [];

        if (emailVal == '' || emailVal.length == 0) {
            errorEmail.innerText = 'Por favor ingrese su email';
            errors.push(errorEmail.innerText);

        }
        if (passwordVal == '' || passwordVal.length == 0) {
            errorPassword.innerText = 'Por favor ingrese su contraseña';
            errors.push(errorPassword.innerText);
        }

        return errors;

    }



}
