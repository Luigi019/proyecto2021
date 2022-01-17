<div class="form-group justify-content-center">
    <div class="form-group justify-content-center">
        <label for="tag">Titulo de la categoria: </label>
        <input type="text" class="form-control" name="tag" id="tag"
            value="{{  $tag->tag }}" maxlength="25" required>
        <small>Ejemplo: Salsa</small>
    </div>
   
    <div class="form-group" >
      <label for="activo">Activo</label>
      <div class="">
        <select name="active" id="active"  class="form-control ">
           <option value="{{1}}" id="true" name="true">  Activo  <i class="far fa-check-circle"></i> </option>
           <option value="{{0}}" id="false" name="false">  Inactivo  <i class="far fa-times-circle"></i> </option>
        </select>
      </div>
      <small id="helpId" class="form-text text-muted">Selecione una opcion si la catgoria estara activa o inactiva</small>
    </div>
</div>