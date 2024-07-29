
function p_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function p_close() {
  document.getElementById("mySidebar").style.display = "none";
  
}

function p_show_nav(name) {
  document.getElementById("menuCliente").style.display = "none";
  document.getElementById(name).style.display = "block";
}
function p_show_none() {
  document.getElementById("menuCliente").style.display = "none";
}

// Script para mostrar ou ocultar senha
function mostrarOcultarSenhaLogin() {
  var senha  = document.getElementById("Senha");

  if (senha.type == "password"){
    senha.type  = "text";
  } else {
    senha.type  = "password";
  }
}

// mostrar ou ocultar senha
function mostrarOcultarSenhaCadastro() {
  var senha1 = document.getElementById("Senha1");
  var senha2 = document.getElementById("Senha2");

  if (senha1.type == "password"){
    senha1.type = "text";
    senha2.type = "text";
  } else {
    senha1.type = "password";
    senha2.type = "password";
  }
}

// validar confirmação de senha 
function validarSenha() {
  var senha  = document.getElementById("Senha1");
  var senha2 = document.getElementById("Senha2");

  if (senha.value != senha2.value) {
    senha2.setCustomValidity("Senhas diferentes!");
    senha2.reportValidity();
    return false;
  } else {
    senha2.setCustomValidity("");
    return true;
  }
}

// preenchimento de número de celular
function mask(o, f) {
  setTimeout(function() {
    var v = mphone(o.value);
    if (v != o.value) {
      o.value = v;
    }
  }, 1);
}


function mphone(v) {
  var r = v.replace(/\D/g, "");
  r = r.replace(/^0/, "");
  if (r.length > 10) {
    r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1)$2-$3");
  } else if (r.length > 5) {
    r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1)$2-$3");
  } else if (r.length > 2) {
    r = r.replace(/^(\d\d)(\d{0,5})/, "($1)$2");
  } else {
    r = r.replace(/^(\d*)/, "($1");
  }
  return r;
}

function mensagem(m) {
  alert(m);
}
