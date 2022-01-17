<div class="form-group justify-content-center">
    <div class="form-group justify-content-center">
        <label for="page">Página: </label>
        <input type="text" class="form-control" name="page" id="page"
            value="{{  $page->page }}" maxlength="25" required>
        <small>Así se llamará el enlace para ir a la página, ejemplo: Políticas y Privacidad </small>
    </div>
    <div class="form-group justify-content-center">
      <label for="page">Titulo de la página: </label>
      <input type="text" class="form-control" name="titlePage" id="titlePage"
          value="{{  $page->titlePage }}" maxlength="25" required>
      <small>Este será el enunciado de la pagina, ejemplo: Aviso legal de Xtromba </small>
  </div>
  <div class='form-group'>
    <label for='body'>Cuerpo de la pagina</label>
    <textarea  class="form-control" placeholder='Cuerpo de la pagina' id="description" name='description'/>{!!$page->description!!}</textarea>
    </div>
</div>
