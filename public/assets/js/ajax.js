$(
    $('form[name="destroy"]').submit(function(e){
        e.preventDefault()

        $.ajax({
            url: $(this).attr('action'),
            type: 'delete',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response){
                if(response.success){
                    $('#msg').removeClass('d-none').html(response.message)

                    if(response.route_link){
                        window.location.href = response.route_link
                    }
                }

                $('#msg').removeClass('d-none').html(response.message)

                if(response.route_link){
                    window.location.href = response.route_link
                }
            }
        })
    })
)
