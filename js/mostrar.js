async function visUSER(id){
console.log("acessou:" + id);
const dados = await fetch("visualizar.php?id="+id);
const resposta= await dados.json();
console.log(resposta);
if(resposta['status'] == true){

    document.getElementById('id_usuario').innerHTML= resposta['dados'].id_usuario;
    document.getElementById('nome').innerHTML= resposta['dados'].nome;
    document.getElementById('cpf').innerHTML= resposta['dados'].cpf;
    document.getElementById('celular').innerHTML= resposta['dados'].celular;
    document.getElementById('telefone').innerHTML= resposta['dados'].telefone;
    document.getElementById('email').innerHTML= resposta['dados'].email;
    document.getElementById('login_user').innerHTML= resposta['dados'].login_user;
    document.getElementById('status_descricao').innerHTML= resposta['dados'].status_descricao;
    document.getElementById('perfil_descricao').innerHTML= resposta['dados'].perfil_descricao;
    document.getElementById('datanasc').innerHTML= resposta['dados'].datanasc;
    document.getElementById('nomemae').innerHTML= resposta['dados'].nomemae;
    document.getElementById('cep').innerHTML= resposta['dados'].cep;
    document.getElementById('rua').innerHTML= resposta['dados'].rua;
    document.getElementById('numero').innerHTML = resposta['dados'].end_numero;
    document.getElementById('complemento').innerHTML = resposta['dados'].end_complemento;
    document.getElementById('bairro').innerHTML= resposta['dados'].bairro;
    document.getElementById('cidade').innerHTML= resposta['dados'].cidade;
    document.getElementById('uf').innerHTML= resposta['dados'].uf;

}

}


async function editUSER(id) {

    // const editarModal = new bootstrap.Modal(document.getElementById("editModal"));
     console.log("Editar: " + id);
 
     const dados = await fetch("visualizar.php?id=" + id);
     const resposta = await dados.json();
     console.log(resposta);
 
     if (resposta['status'] == true) {
 
        // editarModal.show();
 
         document.getElementById("editid").value = resposta['dados'].id_usuario;
         document.getElementById("editPerfil").value = resposta['dados'].id_perfil;
         document.getElementById("editTipo").value = resposta['dados'].tipo;
     }
 }
 
 const formEditUser = document.getElementById("form-edit-usuario");
 if (formEditUser) {
     formEditUser.addEventListener("submit", async(e) => {
         e.preventDefault();
        
 
         const dados = await fetch("nivelAcesso.php", {
             method: "POST",
             body: new FormData(formEditUser),
         });
 
         const resposta = await dados.json();
 
         if(resposta['status']){
             document.getElementById("msgAlertErroEdit").innerHTML = resposta['msg']
             formEditUser.reset();
             
         } else {
             document.getElementById("msgAlertErroEdit").innerHTML = resposta['msg']
         }
     });
 }


 async function alterUSER(id) {
    const a = document.querySelector("#mylink");
    // const editarModal = new bootstrap.Modal(document.getElementById("editModal"));
    console.log("Desativar: " + id);
    
    const dados = await fetch("visualizar.php?id=" + id);
    const resposta = await dados.json();
    console.log(resposta);
    
    a.href = "desativa.php?id=" + id;
     if (resposta['status'] == true) {
 
        // editarModal.show();
 
         document.getElementById("editid").value = resposta['dados'].id_usuario;
         document.getElementById("editPerfil").value = resposta['dados'].id_perfil;
         document.getElementById("editTipo").value = resposta['dados'].tipo;
     }
 }