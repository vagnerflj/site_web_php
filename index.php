<?php include("header.php"); ?>
    <?php
         include_once "conexaoBD.php"; //inclui o arquivo de conexão com o BD
         $listarProdutos = "SELECT * FROM Produtos";//Query para selecionar todos os produtos.
         $res = mysqli_query($conn, $listarProdutos) or die("Erro ao tentar listar produtos!" . mysqli_error($conn));
         $totalProdutos = mysqli_num_rows($res);//retorna o total de registros retornado pela query.
    ?> 

    <div class="container text-center mt-3 mb-5">

        <!-- Alerta criado para informar a quantidade de produtos -->
        <div class="alert alert-info text-center" style="width:50%; margin:auto;">
            Há <strong><?php echo $totalProdutos ?></strong> produtos em nossa loja.
        </div>
        <br>

        <!-- Formulário para aplicar filtros aos produtos -->
        <form name="formFiltro" action="index.php" method="GET" style="width:50%; margin:auto;">
            <select class="form-select" name="filtroProduto" required>
                <option value="todos">Visualizar todos os Produtos</option>
                <option value="disponivel">Visualizar apenas Produtos Disponíveis</option>
                <option value="vendido">Visualizar apenas Produtos Vendidos</option>
            </select><br>
            <button type="submit" class="btn btn-primary" style="float:right">
                Filtrar Produtos
            </button>
        </form>

        <!-- Início da primeira linha da GRID -->
        <div class="row mt-5">
            <?php
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
                        <!-- Início da primeira coluna da GRID -->
                        <div class='col-sm-3'>
                            <!-- Início do Card para exibição do produto-->
                            <div class='card' style='width:100%; height:100%;'>
                                <img class='card-img-top' src='$fotoProduto' alt='Card image'>
                                <div class='card-body'>
                                    <h4 class='card-title'>$nomeProduto</h4>
                                    <p class='card-text'>$valorProduto</p>
                                    <a href='#' class='btn btn-primary'>ver detalhes</a>
                                </div>
                            </div>
                        </div>
                    ";
                }
            ?>
            
        </div>
    </div>
</div>

<?php include("footer.php"); ?>

?>