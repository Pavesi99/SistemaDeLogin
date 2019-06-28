
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Sistema de Login</title>
    <style>
        #alerta,#caixaRegistro,#caixaSenha{
            display: none;
        }
    </style>
  </head>
  <body class= "bg-dark">
      <main class = "container mt-4">
          <!-- Alerta -->
          <section class="row">
              <div class = "col-lg-4 offset-lg-4" id="alerta">
                  <div class  = "alert alert-success text-center">
                      <strong id="resultado">
                          Olá Maravilhoso Mundo Bootstrap
                      </strong>
                  </div>
              </div>
          </section>
          
          <!--  Formulario de Login -->
          <section class="row">
              
              <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaLogin">
                  <h2 class="text-center mt-2">
                      Entrada
                  </h2>
                  <form action="#" method="post" role="form" class="p-2" id="formLogin">
                      <div class="form-group">
                          <input type="text" name="nomeUsuario" class="form-control" placeholder="Nome do Usuário"
                                 required minlength="5">
                      </div>
                      
                           <div class="form-group">
                               <input type="password" name="senhaUsuario" class="form-control" placeholder="Senha"
                                 required minlength="6">
                          
                      </div>
                      <div class="form-group">
                       <div class="custom-control custom-checkbox">
                           <input type="checkbox" name="lembrar" id="checkLembrar" class="custom-control-input" >
                           <label for="checkLembrar" class="custom-control-label">
                                  Lembrar de mim.
                           </label>
                           
                               <a href="#" id="btnEsqueci" class="float-right">
                                 Esqueci a Senha
                      </a>
                      </div>
                      </div>
                      <div class="form-group">
                          <input type="submit" name="btnEntrar" id="btnEntrar" value="~~Entrar~~" class="btn btn-primary btn-block">
                          
                      </div>
                      <div class="form-group">
                          <p>
                              Novo Usuário?? 
                              <a href="#" id="btnRegistrar"> 
                              Registrar-se aqui.
                              </a>
                          </p>
                      </div>
                  </form>
              </div>
          </section>
          <br> <!-- Maroto -->
              <!-- Formulario de Registro de Novo Usuario -->
              <section class = "row">
                  <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaRegistro">
                      <h2 class="text-center mt-2">REGISTRAR-SE </h2>
                      <form action="#" method="post" role="form" class="p-2" id="formRegistro">
                          
                          
                          <!-- Campo Nome Completro -->
                          <div class="form-group">
                              <input type="text" name="nomeCompleto" class="form-control" placeholder="Nome Completo"
                                     required minlength="6"> 
                          </div>
                              <!-- Campo Nome do Usuario -->
                          <div class="form-group">
                              <input type="text" name="nomeUsuario" class="form-control" placeholder="Nome do Usuário"
                                     required minlength="6">
                          </div>
                              
                              <!-- Campo E-mail -->
                              <div class="form-group">
                                  <input type="email" name="emailUsuario" class="form-control" placeholder="E-mail"
                                         required>
                              </div>
                              
                              <!-- Campo Senha -->
                              <div class="form-group">
                                  <input type="password" id="senhaUsuario" class="form-control" placeholder="Senha" 
                                         required minlength="6">
                              </div>
                              
                              <!-- Campo de confirmação de senha -->
                              <div class="form-group">
                                  <input type="passord" id="senhaUsuarioConfirmar" class="form-control" placeholder="Confirmar a Senha"
                                         required minlength="6">
                              </div>
                              <!-- CheckBox de aceite os termos -->
                              <div class="form-group">
                                  <div class="custom-control custom-checkbox">
                                  <input type="checkbox" name="concordar" class="custom-control-input" id="checkConcordar">
                                  <label for="checkConcordar" class="custom-control-label" >
                                      Eu concordo com os 
                                      <a href="#"> TERMOS E CONDIÇÕES.</a>
                                  </label>
                                  </div>
                              </div>
                              <!-- Botao enviar -->
                              
                              <div class="form-group">
                                  <input type="submit" name="btnRegistroUsuario" id="btnRegistroUsuario" value=" ++ Registrar ++"
                                         class="btn btn-primary btn-block">
                              </div>
                              
                              <!-- Já registrado -->
                              <div class="form-group">
                                  <p class="text-center">
                                      <a href="#" id="btnEntrarRegistrado">
                                          Entrar aqui.
                                      </a>
                                      
                                  </p>
                              </div>
                      </form>
                  </div>
                      
              </section>
              <br>
          <!-- Formulário de recuperação de senha -->
          
          <section class="row">
              <div class="col-lg-4 offset-lg-4 bg-light rounded" id="caixaSenha">
                  <h2 class="text-center mt-2">
                      Gerar nova senha
                  </h2>
                  <form action="#" method="post" role="form" class="p-2" id="formSenha">
                      <div class="form-group">
                          <small class="text-muted">
                              Para gerar nova senha digite seu email para receber as instruções.
                          </small>
                      </div>
                      <div class="form-group">
                          <input type="email" name="emailGerarSenha" class="form-control" placeholder="E-mail" required="">
                      </div>
                      <div class="form-group">
                          <input type="submit" name="btnGerar" id="btnGerar" value="~~ Gerar ~~" class="btn btn-primary btn-block">
                      </div>
                      <div class="form-group float-right">
                          <a href="#" id="btnVoltar">
                              Voltar
                          </a>
                      </div>
                      
                  </form>
              </div>
          </section>
          
              <!-- Formulário de recuperação de senha -->
          
      </main>
      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        //$(document).ready(function(){});
       // JQuery
       //Esqueci a senha
    $(function(){
          $("#btnEsqueci").click(function(){
              $("#caixaLogin").hide();
              $("#caixaSenha").show();   
          });
             $("#btnVoltar").click(function(){
                  $("#caixaLogin").show();
              $("#caixaSenha").hide(); 
              });
        });
        //Registrar o novo usuario
        $(function(){
          $("#btnRegistrar").click(function(){
              $("#caixaLogin").hide();
              $("#caixaRegistro").show();   
          });
            $("#btnEntrarRegistrado").click(function(){
                 $("#caixaRegistro").hide(); 
              $("#caixaLogin").show();
               
          });
         });
    </script>
  </body>
</html>
