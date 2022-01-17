<x-message-or-errors/>
@csrf
<div class="form-group">
    <label for="name">Nombre</label>
    <input id="name" class="form-control" type="text" name="name" value='{{ $user->name }}'>
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input id="email" class="form-control" type="email" name="email" value='{{ $user->email }}'>
</div>
<div class="form-group">
    <label for="tel">Telefono</label>
    <input id="tel" class="form-control" type="tel" name="phone">
</div>

@if(isset($password))
<div class="form-group">
    <label for="password">Clave secreta</label>
    <input id="password" class="form-control" type="password" name="password" >
</div>
@endif
<div class="form-group">

    <input  class="btn btn-primary font-weight-bold" type="submit" value="{{ isset($form['button']) ? $form['button'] : 'Aceptar' }}">
</div>
