<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <table id="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Report Name</th>
                <th>Description</th>
                <th>Complaint</th>
                <th>progress</th>
                <th>Date Report</th>
            </tr>
        </thead>
    </table>
</body>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            ajax: '{!! route('dataLaporan') !!}',
            processing: true,
            serverSide: true,
            columns:
            [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'nama_laporan',
                    name: 'nama_laporan'
                },
                {
                    data: 'deskripsi',
                    name: 'deskripsi'
                },
                {
                    data: 'keluhan',
                    name: 'keluhan'
                },
                {
                    data: 'progres',
                    name: 'progres'
                },
                {
                    data: 'tgl_laporan',
                    name: 'tgl_laporan'
                },
            ]
        });
    });
</script>

</html>