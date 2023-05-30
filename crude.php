<?php
    include("conecta.php");

    $matricula  = $_POST["matricula"];
    $nome       = $_POST["nome"];
    $idade      = $_POST["idade"];

    if(isset($_POST["INSERIR"]))
    {
        $comando = $pdo->prepare("INSERT INTO alunos VALUES($matricula, '$nome', $idade)");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }

    if(isset($_POST["EXCLUIR"]))
    {
        $comando = $pdo->prepare("DELETE FROM alunos WHERE matricula=$matricula");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }
    
    if(isset($_POST["ALTERAR"]))
    {
        $comando = $pdo->prepare("UPDATE alunos SET nome='$nome', idade=$idade WHERE matricula=$matricula");
        $resultado = $comando->execute();
        header("Location: cadastro.html");
    }

    if(isset($_POST["LISTAR"]))
    {
        $comando = $pdo->prepare("SELECT * FROM alunos");
        $resultado = $comando->execute();
        
        while ($linhas = $comando->fetch())
        {
            $m = $linhas["matricula"];
            $n = $linhas["nome"];
            $i = $linhas["idade"];
            echo("Matricula: $m Nome: $n Idade: $i <br>");
        }
    }
?>