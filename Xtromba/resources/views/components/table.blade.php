
<div class='table-responsive'>
    {{$slot}}
    @if(isset($create))
    <a class='btn btn-outline-primary mb-3' href='{{route($create[1])}}'>{{$create[0]}}</a>
    @endif
    <table class="table responsive" id='exampleTable'>

        <thead>

            @if(isset($search))
            <tr>
                <td colspan="6">{{ $search }}</td>

            </tr>
            @endif
            <tr>
               @if(isset($theads))
                @foreach($theads as $thead)
                <th>{{ Str::upper($thead) }}</th>
                @endforeach

               @endif
            </tr>
        </thead>
        <tbody>

            @if(isset($fields))
            {{ $fields }}
            @endif

        </tbody>
    </table>
 </div>

