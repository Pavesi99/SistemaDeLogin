<?php //início de um script PHP
 session_start();//inicialização da sessão
 //Memória de Login entre todos as páginas

 
//Importando as configurações de Banco de Dados
require_once 'configDB.php';

//Limpando os dados de entrada POST
function verificar_entrada($entrada){
   $saída = trim($entrada);//Remove espaços
   $saída = htmlspecialchars($saída);//Remove HTML
   $saída = stripcslashes($saída);//Remove barras
   return $saída; 
}

if(isset($_POST['action']) 
        && $_POST['action'] == 'entrar'){
    //echo "Entrou!";
    $nomeUsuário = verificar_entrada($_POST['nomeUsuario']);
     $senhaUsuário = verificar_entrada($_POST['senhaUsuario']);
    $senha = sha1($senhaUsuário);

    //Vai cair na prova campo senha de 32 caracteres!
    
    $sql = $conexão->prepare("SELECT * FROM usuario WHERE nomeusuario = ? AND senha= ? ");
    $sql->bind_param("ss",$nomeUsuário,$senha);
    $sql->execute();
    
    $busca = $sql->fetch();
    if($busca != null){
        //Usuario e senha estão corretos
        $_SESSION['nomeUsuario'] = $nomeUsuário;
        echo 'ok';
        
        if(!empty($_POST['lembrar'])){
            setcookie('nomeUsuario', $nomeUsuário, time()+(365*24*60*60));// 1 ano de vida do cookie em segundos
            setcookie('senhaUsuario', $senhaUsuário, time()+(365*24*60*60));// 1 ano de vida do cookie em segundos
        }else{
            //Limpa o cookie 
            if (isset($_COOKIE['nomeUsuario'])){
                setcookie('nomeUsuario', '');
                if(isset($_COOKIE['senhaUsuario'])){
                    setcookie('senhaUsuario','');
                }
            }
        }
    }else{
        echo 'Falhou no login, nome de usuário ou senha inválidos.';
    }
    
        }elseif(isset($_POST['action']) 
        && $_POST['action'] == 'registro'){
    
    //Sanitização de entradas POST
    $nomeCompleto = verificar_entrada($_POST['nomeCompleto']);
    $nomeUsuário = verificar_entrada($_POST['nomeUsuario']);
    $emailUsuário = verificar_entrada($_POST['emailUsuario']);
    $senhaUsuário = verificar_entrada($_POST['senhaUsuario']);
    $senhaUsuárioConfirmar = verificar_entrada($_POST['senhaUsuarioConfirmar']);
    $criado = date("Y-m-d H:i:s"); //Cria uma data Ano-mês-dia
    
    //Gerar um hash para as senhas
    $senha = sha1($senhaUsuário);
    $senhaConfirmar = sha1($senhaUsuárioConfirmar);
    
    //echo "Hash: " . $senha;
    
    //Conferência de senha no Back-end, no caso do javascript 
    // estar desabilitado
    if($senha != $senhaConfirmar){
        echo "As senhas não conferem";
        exit();
    }else{
        //Verificando se o usuário existe no Banco de Dados
        //Usando MySQLi prepared statment
        $sql = $conexão->prepare("SELECT nomeUsuario, email FROM "
                . "usuario WHERE nomeUsuario = ? OR "
                . "email = ?");//Evitar SQL injection
        $sql->bind_param("ss", $nomeUsuário, $emailUsuário);
        $sql->execute(); //Método do objeto $sql
        $resultado = $sql->get_result(); //Tabela do Banco
        $linha = $resultado->fetch_array(MYSQLI_ASSOC);
        if($linha['nomeUsuario'] == $nomeUsuário)
            echo "Nome {$nomeUsuário} indisponível.";
        elseif($linha['email'] == $emailUsuário)
            echo "E-mail {$emailUsuário} indisponível.";            
        else{
            
            //Preparar a inserção no Banco de dados
            $sql = 
                $conexão->prepare("INSERT INTO usuario "
                . "(nome, nomeUsuario, email, senha, criado) "
                . "VALUES(?, ?, ?, ?, ?)");
            $sql->bind_param("sssss", $nomeCompleto, $nomeUsuário,
                    $emailUsuário, $senha, $criado);
            if($sql->execute())
                echo "Cadastrado com sucesso!";
            else
                echo "Algo deu errado. Por favor, tente novamente.";            
        }
    }
}elseif(isset($_POST['action']) 
        && $_POST['action'] == 'gerar'){
    $emailGerarSenha = verificar_entrada($_POST['emailGerarSenha']);
    
    $sql = $conexão->prepare("SELECT idUsuario FROM usuario WHERE email = ?;");
    
    $sql->bind_param("s",$emailGerarSenha);
    $sql->execute();
    $resposta = $sql->get_result();
    if($resposta->num_rows > 0){ #Email existe no Banco de dados
        #Geração do token, 10 caracteres aleatorios
        $frase = "dwad234e3ffa3r534r543g4324gwefqdq2e245t4fswr243a1e23erd342r23r";
        $palavra_secreta = str_shuffle($frase);
        $token = substr($palavra_secreta,0,10);
        
        //Atualização do banco de dados, passando o token e a validade
        $sql = $conexão->prepare("UPDATE usuario SET token = ?, tokenExpirado=DATE_ADD(now(), INTERVAL 5 MINUTE) WHERE email=?;");
        $sql->bind_param("ss", $token, $emailGerarSenha);
        $sql->execute();
        
        #Simulação do envio do e-mail
        #O codigo abaixo deveria ser enviado por e-mail
        
        $link = "<p ><a href='http://localhost:8080/sistemaDeLogin/gerarSenha.php?email=$emailGerarSenha&token=$token'>Clique aqui</a> para gerar uma nova senha.</p>";
        echo $link;
        
    }else{ #Email não existe
        echo "<strong class='text-danger'>E-mail não ENCONTRADO</strong>";
    }
    
        }else {
    
   header("location:index.php"); //redireciona ao acessar este arquivo diretamente
   //só funciona quando nada esta impresso na tela
   
}
