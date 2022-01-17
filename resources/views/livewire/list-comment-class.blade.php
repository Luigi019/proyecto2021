<div>
 @foreach($comments as $key => $comment)
                                        <div>     
                                          @if(isset($comment['comment']))
                                              <p>{{$comment['comment']}}</p>

                                              @else
                                              {{$comment}}
                                          @endif
                                        </div>
                                       @endforeach

</div>