<?php
require_once 'Usuarios.php';
$u = new Usuario;
?>

<html lang="pt-br"> 
<head>
   <meta charset="utf-8">
   <title>Projeto Login</title>
   <link rel="stylesheet" href="Estilo.css">
</head>
<body>
   <div id="corpo-form">
   <h1>Cadastrar</h1>
   <form method="POST" action="Processa.php">
    <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
    <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
    <input type="email" name="email" placeholder="Usuário" maxlength="40">
    <input type="password" name="senha" placeholder="Senha" maxlength="15">
    <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
    <input type="submit" value="Cadastrar">
   </form>
   </div>
   <?php
   //verificar se clicou no botão
   if(isset($_POST['nome']));
   {
      $nome = addslashes($_POST['nome']);
      $telefone = addslashes($_POST['telefone']); 
      $email = addslashes($_POST['email']);
      $senha = addslashes($_POST['senha']);
      $ConfirmarSenha = addslashes($_POST['confSenha']);
      //verificar campos em branco//
      if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($ConfirmarSenha))
      {
         $u->conectar("projeto_login","localhost","root","");
         if ($u_>$msgErro =="") 
         {
            if($senha == $ConfirmarSenha)
            {
               if($u->cadastrar($nome,$telefone,$email,$senha))
               {
                  echo "Cadastrado com sucesso";
               }
               else
               {
                  echo "Email já cadastrado";
               }
            }
            else
            {
               echo "Senha e Confirmar Senha não correspondem!";
            }

         }
         else 
         {
            echo "erro:".$u->msgErro;
         }
      }else 
      {
         echo "preencha todos os campos";
      }
   }

   ?>
</body>
</html>