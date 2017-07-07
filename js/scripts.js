// Comentarios:

// VER agregar validación para email
// Ver los checkbox, el sexo está mal, debiera ser un radio (VER PARA No ROMPER)

window.onload = function() {

    var formRegistro = document.formulario_registro;
    var formLogin = document.formulario_ingreso;


    if(typeof formRegistro !== "undefined"){
        formRegistro.addEventListener('submit', function(evento) {
            evento.preventDefault();
            validarRegistro();

        });
    }


    if(typeof formLogin !== "undefined"){
        console.log(formLogin);
        formLogin.addEventListener('submit', function(evento) {
            evento.preventDefault();
            validarLogin();

        });
    }



    function validarRegistro() {
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


        if (nombreVal == '' || nombreVal.length == 0) {
            errorNombre.innerText = 'Por favor ingrese su nombre';
        }
        if (apellidoVal == '' || apellidoVal.length == 0) {
            errorApellido.innerText = 'Por favor ingrese su apellido';
        }
        if (emailVal == '' || emailVal.length == 0) {
            errorEmail.innerText = 'Por favor ingrese su email';
        }
        if (passwordVal == '' || passwordVal.length == 0) {
            errorPassword.innerText = 'Por favor ingrese su contraseña';
        }
        if (password2Val == '' || password2Val.length == 0) {
            errorPassword2.innerText = 'Por favor repita su contraseña';
        }
        if (edadVal == '' || password2Val.length == 0) {
            errorEdad.innerText = 'Por favor ingrese su edad';
        }
        if ((sexoMVal == false && sexoFVal == false) || (sexoMVal.length == 0 && sexoFVal.length == 0)) {
            errorSexo.innerText = 'Por favor indique su sexo';
        }
        if ((conductorVal == false && acompVal == false) || (conductorVal.length == 0 && acompVal.length == 0)) {
            errorConductorAcomp.innerText = 'Por favor indique si es conductor, acompañante o ambos';
        }
        if (acepteVal == false || acepteVal.length == 0) {
            errorAcepte.innerText = 'Por favor acepte los términos y condiciones';
        }


    }

    function validarLogin() {
        var emailVal = formLogin.correo.value;
        var errorEmail = document.querySelector('#error_email');
        var passwordVal = formLogin.password.value;
        var errorPassword = document.querySelector('#error_password');

        errorEmail.innerText = '';
        errorPassword.innerText = '';


        if (emailVal == '' || emailVal.length == 0) {
            errorEmail.innerText = 'Por favor ingrese su email';
        }
        if (passwordVal == '' || passwordVal.length == 0) {
            errorPassword.innerText = 'Por favor ingrese su contraseña';
        }

    }



}
