<div>
    @if($errors->any())
    <div class="alert alert-danger p-3">
      <ul>
          @foreach($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
          @endforeach
      </ul>
    </div>
    @elseif(isset(flash()->message))
    
    <div class="alert alert-{{ flash()->class }} p-3">
          {{ flash()->message }}
    </div>
    @endif
</div>
