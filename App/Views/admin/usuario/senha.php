<div class="panel panel-default">
    <div class="panel-heading">Mudar Senha</div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="/senhaUsuarioPost">
            <input type="hidden" name="id" value="<?php echo $this->usuario->id; ?>">
            
            <div class="form-group">
                <label for="nova_senha" class="col-sm-2 control-label">Usuário</label>
                <div class="col-sm-4">
                    <p class="form-control-static">
                        <?php echo htmlentities($this->usuario->nome, ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label for="nova_senha" class="col-sm-2 control-label">Nova Senha</label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" name="nova_senha" id="nova_senha" 
                           value="" placeholder="Nova Senha" >
                </div>
            </div>
            <div class="form-group">
                <label for="nota" class="col-sm-2 control-label">Repita a nova Senha</label>
                <div class="col-sm-4">
                    <input type="password" name="confirme_senha" class="form-control" 
                           value="" placeholder="Repita a nova senha">
                </div>
            </div>  
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>