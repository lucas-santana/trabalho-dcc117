<script>
    $(document).ready(function (e) {

        $('.addWishList').click(function (event) {

            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let id = $(this).attr('id');
            $.ajax({
                url: $(this).attr('data-url'),
                method: 'POST',
                dataType: 'JSON',
                success: function (response) {
                    console.log(id)
                    $("#"+id).remove()
                    Swal.fire({
                        text: 'Jogo adicionado a lista de desejos!',
                        icon:'success'
                    });



                },
                error: function (response) {
                }
            });
        });
    })
</script>
