<style>
    .file-caption-name {
        opacity: 0 !important;
    }

</style>
<div>
    <div class='card mt-5'>
        <div class='card-body'>
            <div class="form-group justify-content-center">
                <div class="form-group justify-content-center">
                    <label>Nombre: </label>
                    <input type="text" class="form-control" name="name" id="name"
                        value="{{ isset($city->name) ? $city->name : '' }}" required>
                </div>
                <div class="form-group justify-content-center">
                    <label>Longitud: </label>
                    <input class="form-control form-control-lg" name="longitude" id="longitude" value="{{ isset($city->longitude) ? $city->longitude : '' }}">
                    <small>Ejemplo: -0.00</small>
                </div>
                <div class="form-group justify-content-center">
                    <label>Latitud: </label>
                    <input type="text" class="form-control" name="latitude" id="latitude"
                        value="{{ isset($city->latitude) ? $city->latitude : '' }}">
                    <small>Ejemplo: -0.00</small>
                </div>
            </div>
        </div>
    </div>
</div>
