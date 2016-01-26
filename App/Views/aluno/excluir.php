<div class="panel panel-danger">
    <div class="panel-heading">Deletar Aluno</div>
    <form method="post" action="/excluir_post">
        <input type="hidden" name="id" value="<?php echo $this->aluno->id; ?>">
    <div class="panel-body">
        <p>Tem certeza que deseja apagar o registro do Aluno <strong><?php echo $this->aluno->nome; ?></strong>?</p>
        <p>Esta operação não poderá ser desfeita!</p>
        <hr>
        <button class="btn btn-danger" type="submit">Deletar</button>
        <a href="/" class="btn btn-primary">Cancelar</a>
    </div>
        
    </form>
</div>