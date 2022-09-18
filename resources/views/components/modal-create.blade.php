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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
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
        let kamar   = $('#kamar').val();
        let user_id = $('#user_id').val();
        let status = $('#status').val();
        let status   = $("meta[name='csrf-token']").attr("status");
        //ajax
        $.ajax({

            url: `/posts`,
            type: "POST",
            cache: false,
            data: {
                "kamar": kamar,
                "user_id": user_id,
                "status": status,
                "_token": token
            },
            success:function(response){

                //show success message
                Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                //data post
                let post = `
                    <tr id="index_${response.data.id}">
                        <td>${response.data.kamar}</td>
                        <td>${response.data.user_id}</td>
                        <td>${response.data.status}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#table-posts').prepend(post);
                
                //clear form
                $('#title').val('');
                $('#content').val('');

                //close modal
                $('#modal-create').modal('hide');
                

            },
            error:function(error){
                
                if(error.responseJSON.title[0]) {

                    //show alert
                    $('#alert-title').removeClass('d-none');
                    $('#alert-title').addClass('d-block');

                    //add message to alert
                    $('#alert-title').html(error.responseJSON.title[0]);
                } 

                if(error.responseJSON.content[0]) {

                    //show alert
                    $('#alert-content').removeClass('d-none');
                    $('#alert-content').addClass('d-block');

                    //add message to alert
                    $('#alert-content').html(error.responseJSON.content[0]);
                } 

            }

        });

    });

</script>