<form class="form-horizontal" method="post" action="/inserir_post">
    <input type="hidden" name="id" value="" >
  <div class="form-group">
    <label for="nome" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="nome" id="nome" 
               value="" placeholder="Nome" >
    </div>
  </div>
  <div class="form-group">
    <label for="nota" class="col-sm-2 control-label">Nota</label>
    <div class="col-sm-2">
        <input type="number" name="nota" class="form-control" 
               value="">
    </div>
  </div>  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Registrar</button>
    </div>
  </div>
</form>