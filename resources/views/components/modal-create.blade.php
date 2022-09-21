<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH POST</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <div class="form-group">
                    <label for="name" class="control-label">Nama kamar</label>
                    <input type="text" class="form-control" id="kamar">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">User id</label>
                    <input type="text" class="form-control" id="user_id">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>
                <div class="form-group">
                    <label for="name" class="control-label">Status</label>
                    <input type="text" class="form-control" id="status">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="tutup">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-create-post', function () {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create post
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
            var kamar   = $('#kamar').val();
            var user_id = $('#user_id').val();
            var status = $('#status').val();
        
        //ajax
        $.ajax({

            url: "{{ url('/pemesanan/list/post') }}",
            type: "POST",
            cache: false,
            dataType: 'json',
            data: {
                    "kamar": kamar,
                    "user_id": user_id,
                    "status": status,
            },
                success:function(response){
                    console.log(response);
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });
                
                table.draw();

                
                //clear form
                $('#kamar').val('');
                $('#user_id').val('');
                $('#status').val('');
                
                //close modal
                $('#modal-create').modal('hide');
                
                
               
        

            },
            error: function (response) {
                Swal.fire({
                    type: 'error',
                    icon: 'error',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });
                
          }

        });
            
    });

</script>