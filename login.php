<?php

    include ("conexaoBD.php");

    //cria variaveis para receber o email ea senha informados no formlogin
    //utiliza a funcao mysql_real_escape_string para evitar sql injection
    $emailUsuario = mysqli_real_escape_string($conn, $_POST['emailUsuario']);
    $senhaUsuario = mysqli_real_escape_string($conn, $_POST['senhaUsuario']);

    //cria a query responsavel por realizar a verificacao dos dados no BD
    $buscarLogin = "SELECT *
                    FROM Usuarios
                    WHERE emailUsuario = '{$emailUsuario}'
                    AND senhaUsuario = md5('{$senhaUsuario}')";
    //cria uma variavel boolean para verificar se aquery foi executada com sucesso
    $efetuarLogin = mysqli_query($conn, $buscarLogin);

    if($registro = mysqli_fetch_assoc($efetuarLogin)){
        $quantidadeLogin = mysqli_num_rows($efetuarLogin);
        
        //cria variaveis php para armezenar os registros encontrados no DB
        $idUsuario = $registro['idUsuario'];
        $tipoUsuario = $registro['tipoUsuario'];
        $fotoUsuario = $registro['fotoUsuario'];
        $emailUsuario = $registro['emailUsuario'];
        $nomeUsuario = $registro['nomeUsuario'];

        //cria variaveis de sessao para armazenar os valores 
        $_SESSION['$idUsuario'] = $idUsuario;
        $_SESSION['$tipoUsuario'] = $tipoUsuario;
        $_SESSION['$fotoUsuario'] = $fotoUsuario;
        $_SESSION['$emailUsuario'] = $emailUsuario;
        $_SESSION['$nomeUsuario'] = $nomeUsuario;
        
        $_SESSION['logado'] = true;
        $_SESSION['ultimoAcesso'] = time();

        header('location:index.php');//redireciona para pagina inicial 
    }
        elseif(empty($_POST['$emailUsuario']) || empty($_POST['$senhaUsuario']) || $quantidadeLogin == 0){
            header('location:formLogin.php?erroLogin=dadosInvalidos');
        }


    


?>