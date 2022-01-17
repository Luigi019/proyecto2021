const votes =(type , id) => {
    alert(123)
    //   var ratedIndex = -1;
            
                $(document).ready(function() {
                    resetStarColors()
                    $.get('{{route("public.ajax.getVote")}}', {
                        type:'User',
                        id
                    }).then(response => {
                        if (response != null || response > 0) {
                            alert(response)
                        setStars(parseInt(response));
                    }
                    })
                    
                    $('.fa-star').on('click', function() {
                        ratedIndex = parseInt($(this).data('index'));
                        alert(ratedIndex)
                        saveToTheDB();

                    });

                    $('.fa-star').mouseover(function() {
                        resetStarColors();

                        var currentIndex = parseInt($(this).data('index'));

                        setStars(currentIndex);
                    });
                    $('.fa-star').mouseleave(function() {
                        resetStarColors();
                        if (ratedIndex != -1)
                            setStars(ratedIndex);
                    });
                });

                function saveToTheDB() {
                    $.ajax({
                        "url": "{{ route('public.ajax.RatedIndex') }}",
                        "method": "POST",
                        "dataType": 'json',
                        "data": {
                            "_token": "{{ csrf_token() }}",
                            "Uid": Uid,
                            "ratedIndex": ratedIndex
                            
                        },
                        success: function(data) {
                            $('#mensajeVoto').html(data.message);
                            setTimeout(() => {    
                                $('#mensajeVoto').html('');
                            }, 1000);
                            
                            
                        }
                    });
                }

                function setStars(max) {
                    for (var i = 0; i < max; i++)
                        $('.fa-star:eq(' + i + ')').css('color', 'gold');
                }

                function resetStarColors() {
                    $('.fa-star').css('color', 'gray');
                }
}