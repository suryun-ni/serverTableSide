<!DOCTYPE html>
<html>
<head>
    <title>sangcahaya.id</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-UkVD+zxJKGsZP3s/JuRzapi4dQrDDuEf/kHphzg8P3v8wuQ6m9RLjTkPGeFcglQU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.min.css'>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
</head>
<body>
    

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>TableServer</h2>
                <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-post">TAMBAH</a>
                <div class="table-responsive">
                    <table class="table table-hover" id="table-pemesanan">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>ID</th>
                                <th>Nama Kamar</th>
                                <th>User ID</th>
                                <th>Status</th>
                                
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>
           <!-- Modal
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
</div> -->
    @include('components.modal-create')
    @include('components.modal-update')
    @include('components.modal-delete')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
      
      
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
           var table = $('#table-pemesanan').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/pemesanan/list/yajra')}}",
                columns: [

                    {data: 'action', name: 'action'},
                    {data: 'id', name: 'id'},
                    {data: 'kamar', name: 'kamar'},
                    {data: 'user.nama', name: 'user.nama'},
                    {data: 'status', name: 'status'},
                ]
            });

            // $('body').on('click', '#btn-create-post', function () {
            // $('#modal-create').modal('show');
            // });
            
            // //action create post
            // $('#store').click(function(e) {
            // e.preventDefault();
            
            // //define variable
            // var kamar   = $('#kamar').val();
            // var user_id = $('#user_id').val();
            // var status = $('#status').val();
            // //ajax
            // $.ajax({
            //     url: "{{ url('/pemesanan/list/post') }}",
            //     type: "post",
            //     dataType: 'json',
            //     cache: false,
            //     data: {
            //         "kamar": kamar,
            //         "user_id": user_id,
            //         "status": status,

            //     },
            //     success:function(data){
            //         //show success message
            //         Swal.fire({
            //             type: 'success',
            //             icon: 'success',
            //             title: `${data.message}`,
            //             showConfirmButton: false,
            //             timer: 3000
            //         });
            //         //data post
            //         table.draw();
            //         //clear form
            //     $('#kamar').val('');
            //     $('#user_id').val('');
            //     $('#status').val('');

            //     //close modal
            //     $('#modal-create').modal('hide');
                

            //                  },
            //                 });
    // });   
    </script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/js/coreui.bundle.min.js" integrity="sha384-n0qOYeB4ohUPebL1M9qb/hfYkTp4lvnZM6U6phkRofqsMzK29IdkBJPegsyfj/r4" crossorigin="anonymous"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> -->
</body>
</html>