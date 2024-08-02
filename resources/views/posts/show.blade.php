
@extends('layouts.nav')
@section('navcontent')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer's Voice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<style>
    .container {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        padding: 20px;
        margin-top: 50px;
    }
</style>

<body>
    <div class="container">
        <h1 style="text-align: center;">Blog Details</h1>
        <a href="{{route('export.blogs')}}"><button class="btn btn-primary mb-3">Export Excel </button></a>
        <table id="blogDetailsTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Assigned Person</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be populated by DataTables -->
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('#blogDetailsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('table.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'assigned_user',
                        name: 'assigned_user'
                    },
                ]
            })
        })
    </script> 
</body>

</html>
@endsection
