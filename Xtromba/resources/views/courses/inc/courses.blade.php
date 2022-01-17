@foreach ($collects as $key => $collect)
    <div class="col mb-4">
        <div class="card border-0 mb-4">
            <img class="card-img-top rounded" width='100%' style="object-fit: cover;"
                 src="{{asset($collect->getFile('photo' , 'first')['file']) }}" alt="">
            <div class="card-body p-0">
                <h5 class="card-title mt-3 text-danger">{{ $collect->title }}</h5>
                @if ($collect->teacher)
                    <div class="text-black-50 text-truncate" style="font-size: .95rem;"><i
                            class="fas fa-user text-danger mr-1"></i><strong>Dictado
                            por: </strong>{{ $collect->teacher->name }}
                    </div>
                    <p class="card-text">{{ Str::limit($collect->teacher->name, 25) }}</p>
                @endif
                @if(!Auth::check() || !Auth::user()->hasProduct($collect , 'Course')->count() )
                    <a href="{{route('public.payment.checkout' , [
    'isCourse'=>$collect->getTable() === 'courses' ? true : false,
    'collect'=>$collect
])}}" class="btn btn-danger"><i class="fas fa-tv"></i>&nbsp; Comprar
                    </a>
                @else
                    <a href="{{route('public.course.lessons.show' , [$collect->id])}}" class="btn btn-danger"><i
                            class="fas fa-tv"></i>&nbsp; Ver
                    </a>
                @endif
            </div>
        </div>
    </div>
@endforeach
