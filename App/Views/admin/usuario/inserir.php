<div class="panel panel-default">
    <div class="panel-heading">Cadastro de Usuário</div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="/inserirUsuarioPost">
            <input type="hidden" name="id" value="">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nome" id="nome" 
                           value="" placeholder="Nome" >
                </div>
            </div>
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome de Usuário</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="username" id="username" 
                           value="" placeholder="Nome de Usuário" >
                </div>
            </div>
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Administrador</label>
                <div class="col-sm-4">
                    <select class="form-control" name="admin">
                        <option value="">Selecione</option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="nota" class="col-sm-2 control-label">Senha</label>
                <div class="col-sm-2">
                    <input type="password" name="senha" class="form-control" 
                           value="">
                </div>
            </div>  
            <div class="form-group">
                <label for="confirme_senha" class="col-sm-2 control-label">Confirme a senha</label>
                <div class="col-sm-2">
                    <input type="password" name="confirme_senha" class="form-control" 
                           value="">
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