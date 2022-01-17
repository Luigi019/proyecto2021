<div>  
    @foreach($comments as $comment)
    <div class="row mb-4 mt-3 p-3">
            <div class="col-md-1">
                <img width='50' class="rounded-circle float-left mr-2" src="{{ asset('img/default.jpg') }}"
                    alt="Avatar">
            </div>
            <div class="col-md-11 text-justify">
                <p> <span class="meta-id mt-3">Estudiante</span>
                    <a class="name" href="#">NOMBRE DEL ESTUDIANTE</a>
                </p>
                <p class="card-text mt-2"> {{$comment['comment']}} </p>

            </div>
    </div>
    @endforeach

 



</div>
