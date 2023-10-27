const form = document.querySelector("form"); 
const nameInput = document.querySelector("#nome");
const emailInput = document.querySelector("#email");
const matriculaInput = document.querySelector("#matricula");
const turmaInput = document.querySelector("#turma");
const cursoInput = document.querySelector("#curso");
const senhaInput = document.querySelector("#senha");

form.addEventListener("submit", (event) =>){
    event.preventDefault();

    //verificar se o nome está vazio
    if(nameInput.value == ""){
        alert("Por favor, preencha o nome");
        return; 
    }

    if(emailInput.value == ""){
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


    function isEmailValid(email){
        const emailRegex = new RegExp(
            //usuario12@host.com
            /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/
        ); 


    }

    //se todos os campos estiverem preenchidos envie o formulario
    form.submit(); 
};