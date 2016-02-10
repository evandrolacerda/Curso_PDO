<div class="panel panel-danger">
    <div class="panel-heading">Deletar Usuario</div>
    <form method="post" action="/excluirUsuarioPost">
        <input type="hidden" name="id" value="<?php echo $this->usuario->id; ?>">
    <div class="panel-body">
        <p>Tem certeza que deseja apagar o registro do Usuário <strong><?php echo $this->usuario->nome; ?></strong>?</p>
        <p>Esta operação não poderá ser desfeita!</p>
        <hr>
        <button class="btn btn-danger" type="submit">Deletar</button>
        <a href="/admin" class="btn btn-primary">Cancelar</a>
    </div>
        
    </form>
</div>