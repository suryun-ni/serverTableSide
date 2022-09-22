<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">EDIT POST</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="post_id">

                <div class="form-group">
                    <label for="name" class="control-label">Kamar</label>
                    <input type="text" class="form-control" id="kamar-edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title-edit"></div>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Id User</label>
                    <textarea class="form-control" id="user_id-edit" rows="4"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content-edit"></div>
                </div>
                <div class="form-group">
                    <label class="control-label">Status</label>
                    <textarea class="form-control" id="status-edit" rows="4"></textarea>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content-edit"></div>
                </div>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="update">UPDATE</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-edit-post', function () {

        let post_id = $(this).data('id');
        console.log("ini post id = " + post_id);
        //fetch detail post with ajax
        $.ajax({
            url: `{{URL('pemesanan/list/id/${post_id}')}}`,
            type: "GET",
            cache: false,
            success:function(response){
                console.log("ini respon = " + response.data);
                //fill data to form
                $('#post_id').val(response.data.id);
                $('#kamar-edit').val(response.data.kamar);
                $('#user_id-edit').val(response.data.user_id);
                $('#status-edit').val(response.data.status);

                //open modal
                $('#modal-edit').modal('show');
                console.log("ini kamar = "+response.data.kamar);
            }
            
        });
    });

    //action update post
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        var post_id = $('#post_id').val();
        var kamar   = $('#kamar-edit').val();
        var user_id = $('#user_id-edit').val();
        var status = $('#status-edit').val();
        // var token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `{{URL('pemesanan/list/edit/${post_id}')}}`,
            type: "PUT",
            cache: false,
            data: {
                    "kamar": kamar,
                    "user_id": user_id,
                    "status": status,
                    
            },
            success:function(response){
                console.log(response);
                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                table.draw();

                //close modal
                $('#modal-edit').modal('hide');
                

            },
            error: function (response) {
                Swal.fire({
                    type: 'error',
                    icon: 'error',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });
            },
        });

    });

</script>