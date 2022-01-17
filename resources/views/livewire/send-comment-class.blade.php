<div class="panel" style="background-color: #fff; padding-bottom:5px;">
    <div class="input-group">
        <input style="border: 0; background-color: #fff; border-bottom: solid 1px;" wire:model.defer='comment' type='text' class='form-control'/>
        <div class="input-group-append">
            <a  class='btn'>
                <i style="font-size: 22px" class="fas fa-smile text-warning"></i>
            </a>
            <a wire:click='commentable' class='btn'>
                <i style="font-size: 22px; transform: rotate(45deg);" class="fas fa-location-arrow text-danger"></i>
            </a>
        </div>
    </div>
</div>