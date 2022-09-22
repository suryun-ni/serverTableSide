<script>
    $('body').on('click','#btn-delete-post', function () {
        let post_id = $(this).data('id');
        
        swal.fire({
            title: "Are you sure About That?",
            text : "Delete this data?",
            icon : "warning",
            showCancelButton: true,
            cancelButtonText: "cancel",
            confirmButtonText: "continue"
        }).then((result) => {
            if (result.isConfirmed) {
                console.log(result);
            
            $.ajax({
                type: "DELETE",
                url: `{{URL('/pemesanan/list/hapus/${post_id}')}}`,
                cache: false,
                success: function (response) {
                    Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        table.draw();
                }
            });
            }

        });
      })
</script>