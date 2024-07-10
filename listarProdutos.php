<?php include "header.php"; ?>

<?php

    include_once "conexaoBD.php"; //inclui o arquivo de conexão com o BD
    $listarProdutos = "SELECT * FROM Produtos";//Query para selecionar todos os produtos.
    $res = mysqli_query($conn, $listarProdutos) or die("Erro ao tentar listar produtos!" . mysqli_error($conn));
    
    $totalProdutos = mysqli_num_rows($res);//retorna o total de registros retornado pela query. 
    
    echo "<h2>Total de produtos cadastrados: $totalProdutos</h2>";

    //montar o cabecalho da tabela para exibir os registros
    echo"
        <table class='table'>
            <tr>
                <th>ID</th>
                <th>FOTO</th>
                <th>NOME</th>
                <th>DESCRIÇÃO</th>
                <th>CATEGORIA</th>
                <th>VALOR</th>
                <th>CONDIÇÃO</th>
                <th>DATA</th>
                <th>HORA</th>
                <th>STATUS</th>
            </th>
        </thead>";
        //varre a tabela enquanto houver registros e armazena-os em um array
        while($registro = mysqli_fetch_assoc($res)){
            $idProduto = $registro["idProduto"];
            $fotoProduto = $registro["fotoProduto"];
            $nomeProduto = $registro["nomeProduto"];
            $descricaoProduto = $registro["descricaoProduto"];
            $categoriaProduto = $registro["categoriaProduto"];
            $valorProduto = $registro["valorProduto"];
            $condicaoProduto = $registro["condicaoProduto"];
            $dataCadastroProduto = $registro["dataCadastroProduto"];
            $horaCadastroProduto = $registro["horaCadastroProduto"];
            $statusProduto = $registro["statusProduto"];

            echo "
                <tbody>
                    <tr>
                        <td>$idProduto</td>
                        <td><img src= '$fotoProduto' width='100'</td>
                        <td>$nomeProduto</td>
                        <td>$descricaoProduto</td>
                        <td>$categoriaProduto</td>
                        <td>$valorProduto</td>
                        <td>$condicaoProduto</td>
                        <td>$dataCadastroProduto</td>
                        <td>$horaCadastroProduto</td>
                        <td>$statusProduto</td>
                    </tr>
                </tbody>
            ";
        }
    echo "</table>";

?>

<?php include "footer.php"; ?>