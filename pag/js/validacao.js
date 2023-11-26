function validateForm() {
    let nome = document.forms["formCad"]["nome"].value;
    if (nome == "") {
      alert("Por favor, digite um nome.");
      return false;
    } 

    let email = document.forms["formCad"]["email"].value;
    if (email == "") {
      alert("Por favor, digite um email.");
      return false;
    }
    
    let  curso = document.forms["formCad"]["curso"].value;
    if (curso == "") {
      alert("Por favor, digite um nome.");
      return false;
    }

    let senha = document.forms["formCad"]["senha"].value;
    if (senha == "") {
      alert("Por favor, digite uma senha.");
      return false;
    }

    let turma = document.forms["formCad"]["turma"].value;
    if (turma == "") {
      alert("Por favor, digite a turma.");
      return false;
    }

    let matricula = document.forms["formCad"]["matricula"].value;
    if (x == "") {
      alert("Por favor, digite a matricula.");
      return false;
    }

}   

/*const form = document.querySelector("formCad"); 
const nameInput = document.querySelector("#nome");
const emailInput = document.querySelector("email");
const matriculaInput = document.querySelectorByName("matricula");
const turmaInput = document.querySelectorByName("turma");
const cursoInput = document.querySelectorByName("curso");
const senhaInput = document.querySelectorByName("senha");

form.addEventListener("submit", (event) =>{
    event.preventDefault();

    //verificar se o nome está vazio
    if(nameInput.value == ""){
        alert("Por favor, preencha o nome");
        return; 
    }

    if(emailInput.value == "" || !isEmailValid(emailInput.value)){
        alert("Por favor, preencha o email");
        return; 
    }

    if(cursoInput.value == ""){
        alert("Por favor, preencha o curso");
        return; 
    }

    if(turmaInput.value == ""){
        alert("Por favor, preencha a turma");
        return; 
    }

    if(senhaInput.value == ""){
        alert("Por favor, preencha a senha");
        return; 
    }

    if(matriculaInput.value == ""){
        alert("Por favor, preencha a matricula");
        return; 
    }
    //se todos os campos estiverem preenchidos envie o formulario
    form.submit(); 
});


function isEmailValid(email){
    const emailRegex = new RegExp(
        //usuario12@host.com
        /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/
    ); 

    if (emailRegex.test(email)){
        return true; 
    }

    return false; 

}*/