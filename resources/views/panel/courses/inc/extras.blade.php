@if(count($course->getFile('extra' , 'get')))
@foreach($course->getFile('extra' , 'get') as $key => $value)
<div class='d-flex form-group' data-id='{{$value['id']}}' data-file='{{$value['file']}}'>
    <input type="text" placeholder="Titulo del archivo" value='{{ $value['title'] }}'class='form-control col-md-3' name="extra[title][]">
    <input type='number' hidden class='form-control col-md-3' value='{{ $value['id'] }}' name='extra[id][]'  >
    <input id="extra" class="hidden ml-3 " name="extra[file][]" type="file"/>
    <i class="fas fa-trash text-danger" id='delete-extra'></i>
</div>
@endforeach
@endif
