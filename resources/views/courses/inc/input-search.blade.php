<div class="col-md-4">
    <div class="input-group border border-white rounded-pill shadow-sm" style="background-color: #fff;">
        <input id="searchList" type="text" class="form-control text-center border border-white p-0 rounded-pill" placeholder="Buscar... " aria-label="Buscar... ">
        <button class="btn text-gray border-white py-0 rounded-pill" type="button" id="btnSearch" style="background-color: #FFF;">
        <i class="fa fa-search"></i></button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        $('#searchList').on('keyup', function(){
            let search = $('#searchList').val();
            window.livewire.emit('getSearch', search);
        });


    });
</script>
