<form class="form-horizontal" method="post" action="/editar_post">
    <input type="hidden" name="id" value="<?php echo $this->aluno->id;  ?>" >
  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="nome" id="nome" 
               value="<?php echo $this->aluno->nome; ?>" placeholder="Nome" >
    </div>
  </div>
  <div class="form-group">
    <label for="nota" class="col-sm-2 control-label">Nota</label>
    <div class="col-sm-2">
        <input type="number" name="nota" class="form-control" 
               value="<?php echo $this->aluno->nota;?>">
    </div>
  </div>  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Registrar</button>
    </div>
  </div>
</form>