<script>
    $(document).ready(function (e) {
        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");

            event.preventDefault();

            Swal.fire({
                title: 'Excluir registro?',
                // showDenyButton: true,
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Excluir'
                // denyButtonText: `Don't save`,
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    })
</script>
