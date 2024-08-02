
@extends('layouts.nav')
@section('navcontent')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            font-size: 40px;
          
        }
    </style>
</head>
<body>
<div class="container my-5">
    <h1>Feedbacks</h1>
    <p class="lead text-bold">Here is the list of feedbacks submitted by users:</p>

    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="feedback-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Farm Size</th>
                    <th>Crop Type</th>
                    <th>Feedback</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be inserted here by AJAX -->
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#feedback-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('feedback.index') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'farm_size',
                    name: 'farm_size'
                },
                {
                    data: 'crop_type',
                    name: 'crop_type'
                },
                {
                    data: 'message',
                    name: 'message',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    });
</script>

</body>

</html>



@endsection
