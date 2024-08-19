<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Ediçao de Livros</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ediçao do Livro - <?=$book['nome'];?></h6>
    </div>
    <div class="card-body">
    <form enctype="multipart/form-data" action="<?=$GLOBALS['baseUrl'];?>/controllers/book.controller.php" method="POST">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" required class="form-control" id="nome" value="<?=$book['nome'];?>" name="nome">
            </div>
            <!-- <div class="form-group col-md-4">
                <label for="capa">Capa</label>
                <input type="file" class="form-control" id="capa" name="capa">
            </div> -->
            <div class="form-group col-md-4">
                <label for="autor">Autor</label>
                <input type="text" required class="form-control" id="autor" value="<?=$book['autor'];?>" name="autor">
            </div>
            <div class="form-group col-md-4">
                <label for="genero">Gênero</label>
                <input type="text" required class="form-control" id="genero" value="<?=$book['genero'];?>" name="genero">
            </div>
            <div class="form-group col-md-4">
                <label for="classificacao">Classificação</label>
                <select required class="form-control" id="classificacao" name="classificacao">
                    <?php $selected_value = $book['classificacao']?>
                    <option value="livre" <?php if ($selected_value == 'livre') echo 'selected'; ?>>Livre</option>
                    <option value="NR12" <?php if ($selected_value == 'NR12') echo 'selected'; ?>>NR12</option>
                    <option value="NR14" <?php if ($selected_value == 'NR14') echo 'selected'; ?>>NR14</option>
                    <option value="NR16" <?php if ($selected_value == 'NR16') echo 'selected'; ?>>NR16</option>
                    <option value="NR18" <?php if ($selected_value == 'NR18') echo 'selected'; ?>>NR18</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="descricao">Descrição</label>
                <input type="text" required class="form-control" id="descricao" value="<?=$book['descricao'];?>" name="descricao">
            </div>
            <div class="form-group col-md-4">
                <label for="dataDePublicacao">Data de Publicação</label>
                <input type="date" required class="form-control" id="dataDePublicacao" value="<?=$book['dataDePublicacao'];?>" name="dataDePublicacao">
            </div>
            <div class="form-group col-md-4">
                <label for="valorDiario">Valor Diário</label>
                <input type="text" required class="form-control" id="valorDiario" value="<?=$book['valorDiario'];?>" name="valorDiario">
            </div>
            <div class="form-group col-md-4">
                <label for="valorMulta">Valor Multa</label>
                <input type="text" required class="form-control" id="valorMulta" value="<?=$book['valorMulta'];?>" name="valorMulta">
            </div>
            <div class="form-group col-md-4">
                <label for="quantidade">Quantidade</label>
                <input type="text" required class="form-control" id="quantidade" value="<?=$book['quantidade'];?>" name="quantidade">
            </div>
            <div class="form-group col-md-4">
                <label for="createdIn">Criado Em</label>
                <input type="text" required disabled class="form-control" id="createdIn" value="<?=$book['createdIn'];?>" name="createdIn">
            </div>
        </div>
            <input type="hidden" value="update" name="action">
            <input type="hidden" value="<?=$book['id'];?>" name="id">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataDePublicacao').keydown(function(e) {
            e.preventDefault();
        });
    });
</script>