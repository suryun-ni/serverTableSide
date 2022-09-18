<!DOCTYPE html>
<html>
<head>
    <title>sangcahaya.id</title>
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/css/coreui.min.css" rel="stylesheet" integrity="sha384-UkVD+zxJKGsZP3s/JuRzapi4dQrDDuEf/kHphzg8P3v8wuQ6m9RLjTkPGeFcglQU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
</head>
<body>
    

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>SANGCAHAYA.ID</h1>
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
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $('#table-pemesanan').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/pemesanan/list/yajra') }}",
                columns: [

                    {data: 'action', name: 'action'},
                    {data: 'id', name: 'id'},
                    {data: 'kamar', name: 'kamar'},
                    {data: 'user.nama', name: 'user.nama'},
                    {data: 'status', name: 'status'},
                ]
            });

        })
    </script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.2.0/dist/js/coreui.bundle.min.js" integrity="sha384-n0qOYeB4ohUPebL1M9qb/hfYkTp4lvnZM6U6phkRofqsMzK29IdkBJPegsyfj/r4" crossorigin="anonymous"></script>
</body>
</html>