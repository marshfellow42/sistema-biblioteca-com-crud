<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Cadastro de Livros</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cadastro de Livro</h6>
    </div>
    <div class="card-body">
    <form enctype="multipart/form-data" action="<?=$GLOBALS['baseUrl'];?>/controllers/book.controller.php" method="POST">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="nome">Nome</label>
                <input type="text" required class="form-control" id="nome" name="nome">
            </div>
            <div class="form-group col-md-4">
                <label for="capa">Capa</label>
                <input type="file" required class="form-control" id="capa" name="capa">
            </div>
            <div class="form-group col-md-4">
                <label for="autor">Autor</label>
                <input type="text" required class="form-control" id="autor" name="autor">
            </div>
            <div class="form-group col-md-4">
                <label for="genero">Gênero</label>
                <input type="text" required class="form-control" id="genero" name="genero">
            </div>
            <div class="form-group col-md-4">
                <label for="classificacao">Classificação</label>
                <select required class="form-control" id="classificacao" name="classificacao">
                    <option value="Livre">Livre</option>
                    <option value="+10">+10</option>
                    <option value="+12">+12</option>
                    <option value="+14">+14</option>
                    <option value="+16">+16</option>
                    <option value="+18">+18</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="descricao">Descrição</label>
                <input type="text" required class="form-control" id="descricao" name="descricao">
            </div>
            <div class="form-group col-md-4">
                <label for="dataDePublicacao">Data de Publicação</label>
                <input type="date" required class="form-control" id="dataDePublicacao" name="dataDePublicacao">
            </div>

            <div class="form-group col-md-4">
                <label for="valorDiario">Valor Diário</label>
                <input type="text" required class="form-control" id="valorDiario" name="valorDiario" onkeypress="return /[0-9]/i.test(event.key)">
            </div>
            <div class="form-group col-md-4">
                <label for="valorMulta">Valor Multa</label>
                <input type="text" required class="form-control" id="valorMulta" name="valorMulta" onkeypress="return /[0-9]/i.test(event.key)">
            </div>
            <div class="form-group col-md-4">
                <label for="quantidade">Quantidade</label>
                <input type="text" required class="form-control" id="quantidade" name="quantidade" onkeypress="return /[0-9]/i.test(event.key)">
            </div>
            <div class="form-group col-md-4">
                <label for="createdIn">Criado Em</label>
                <input type="text" required disabled class="form-control" id="createdIn" name="createdIn" value="<?=date("d/m/Y H:i:s");?>">
            </div>
        </div>
            <input type="hidden" value="insert" name="action">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>

<script src="<?=$GLOBALS['baseUrl'];?>/assets/js/jquery.min.js"></script>
<script src="<?=$GLOBALS['baseUrl'];?>/assets/js/jquery.mask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataDePublicacao').keydown(function(e) {
            e.preventDefault();
        });

        $('#valorDiario').mask('R$ #', {
            translation: {
                '#': {
                    pattern: /[0-9]/, recursive: true
                }
            }
        });
    });
</script>