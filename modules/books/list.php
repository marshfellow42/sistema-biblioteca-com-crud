<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Lista de Livros</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            Listando os livros 
        </h6>
        <a class="btn btn-primary btn-sm" href="?page=insertBook"> <i class="fas fa-plus-square"></i> Adicionar </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th> nome </th>
                        <th> capa </th>
                        <th> autor </th>
                        <th> gênero </th>
                        <th> C.Ind </th>                        
                        <th> Diária </th>
                        <th> Multa </th>
                        <th> QTD </th>
                        <th> Ações </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th> nome </th>
                        <th> capa </th>
                        <th> autor </th>
                        <th> gênero </th>
                        <th> C.Ind </th>                        
                        <th> Diária </th>
                        <th> Multa </th>
                        <th> QTD </th>
                        <th> Ações</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach($books as $book):?>
                        <?php
                            $nEmp = select("emprestimos", ["count(*) as nEmp"],['livroId'=>$book['id']],'')[0];
                        ?>
                        
                        <tr>
                            <td> <?=$book['nome'];?> </td>
                            <td> <img src="<?=$GLOBALS['baseUrl'];?>/assets/img/books/<?=$book['capa'];?>" alt="" width="80" height="100"></td>
                            <td> <?=$book['autor'];?> </td>
                            <td> <?=$book['genero'];?> </td>
                            <td> <?=$book['classificacao'];?> </td>                            
                            <td> <?=number_format($book['valorDiario'],2);?> </td>
                            <td> <?=number_format($book['valorMulta'],2);?> </td>
                            <td> <?=$book['quantidade'];?> </td>
                            <td>
                                <a href="?page=updateBook&id=<?=$book['id'];?>" class="btn btn-sm btn-warning" ><i class="fas fa-edit"></i></a>
                                
                                <?php if($nEmp['nEmp'] == "0"):?>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-<?=$book['id'];?>"><i class="fas fa-trash"></i></button>
                                <?php endif;?>

                                <a class="btn btn-sm btn-secondary" href="<?=$GLOBALS['baseUrl'];?>/controllers/book.controller.php?id=<?=$book['id'];?>&ativo=1&action=block">
                                    <i class="fas fa-ban"></i>
                                </a>

                                <!--    
                                <?php if($book['ativo']):?>
                                    <a class="btn btn-sm btn-success" href="<?=$GLOBALS['baseUrl'];?>/controllers/book.controller.php?id=<?=$book['id'];?>&ativo=0&action=block">
                                        <i class="fas fa-thumbs-up"></i>
                                    </a>
                                <?php else: ?>
                                    <a class="btn btn-sm btn-secondary" href="<?=$GLOBALS['baseUrl'];?>/controllers/book.controller.php?id=<?=$book['id'];?>&ativo=1&action=block">
                                        <i class="fas fa-ban"></i>
                                    </a>
                                <?php endif;?>    
                                -->

                                <!-- Modal de Exclusão -->
                                <div class="modal fade" id="delete-<?=$book['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="<?=$GLOBALS['baseUrl'];?>/controllers/book.controller.php" method="POST">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Livro?! </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Tem certeza que deseja excluir o livro 
                                                    <strong> <?= $book['nome']; ?> </strong> !? <br>
                                                    Essa operação não pode ser desfeita.
                                                    
                                                    <input type="hidden" name="action" value="delete">
                                                    <input type="hidden" name="id" value="<?=$book['id'];?>">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-ban"></i> Não, cancelar! </button>
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fa fa-thumbs-up"></i> Sim, continuar!  
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach;?>
                
                </tbody>
            </table>
        </div>
    </div>
</div>
