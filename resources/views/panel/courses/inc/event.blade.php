
@if($course->events->count())
@foreach($course->events as $event)
<div class='form-group' data-id='{{$event->id}}'>
    <div class='d-flex flex-direction-row mb-3'>
        <input type='text' class='form-control col-md-3' name='event[title][]' value='{{$event->title}}' placeholder='Titulo del evento' >
        <input type='number' hidden class='form-control col-md-3'  name='event[id][]' value='{{$event->id}}' >
        <input type='datetime-local' name='event[start][]'  class='form-control col-md-3 ml-4'value='{{$event->start}}' placeholder='fecha del evento' >
        <i class='fas fa-trash text-danger ml-3 mt-3' id='event-delete'> </i>
    </div>
    <textarea class='form-control' name='event[content][]'>{{$event->content}}</textarea>

 </div>
@endforeach
@else
<div class='form-group'>
    <div class='d-flex flex-direction-row mb-3'>
        <input type='text' class='form-control col-md-3' name='event[title][]' ' placeholder='Titulo del evento' >
        <input type='datetime-local' name='event[start][]'  class='form-control col-md-3 ml-4' placeholder='fecha del evento' >
        <i class='fas fa-trash text-danger ml-3 mt-3' id='event-delete'> </i>
    </div>
    <textarea class='form-control' name='event[content][]'></textarea>

 </div>
@endif