{if isset($smarty.session.USER_ID)}
  


<form action="add" method="POST" class="row g-3" >
  <div class="col-md-6" >
  <label for="inputName" class="form-label">Nombre</label>
  <input name="nombre" type="text" class="form-control" id="inputName" required>
  </div>
  <div class="col-md-6">
  <label for="inputName" class="form-label">Apellido</label>
  <input name="apellido" type="text" class="form-control" id="inputName" required>
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">DNI</label>
    <input name="dni" type="number" class="form-control" id="inputAddress" required>
  </div>
  <div class="col-12">
    <label for="inputEmail4" class="form-label">Email</label>
    <input name="email"type="text" class="form-control" id="inputEmail4" required>
    
  </div>
    <div class="col-12">
    <input type="submit" name="agregar" class="btn btn-outline-secondary" value="Agregar">       
  </div>

</form>

{/if}
