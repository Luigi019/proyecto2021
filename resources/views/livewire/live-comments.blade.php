<div>
    <div class="row mb-5">
        <div class="col-md-1">
            <img width='55' class="rounded-circle float-left mr-2" src="{{ asset($model->photo) }}"
                alt="Avatar">
        </div>
        <div class="col-md-9">

            <div class="input-group mb-3">
                <input name="comments" wire:model.defer='comment' id="comments" type="text" class="form-control rounded-pill"
                    placeholder="Escribe tu comentario" aria-label="Escribe tu comentario"
                    aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button wire:click='commentable' class="btn btn-outline-danger rounded-pill" type="buttom"
                        id="button-addon2">Comentar</button>
                </div>
            </div>

        </div>

    </div>

  
    
</div>
