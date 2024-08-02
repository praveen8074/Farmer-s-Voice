<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer's Voice</title>
    <style>
        @page {
            margin: 20mm;
        }

        h1 {
            font-size: 35px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
            text-align: center;
            padding: 15px;
        }

        h2 {
            font-size: 25px;
            margin-bottom: 0;
            color: #333;
            padding:5px 15px;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            padding: 15px;
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .card-body img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Your Assigned Blogs</h1>
        @foreach($posts as $post)
        <div class="card">
            <div class="card-header">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="card-body">
                <p>{!! $post->content !!}</p>
                @if($post->image)
                <img src="{{ asset($post->image) }}" alt="Post Image">
                @endif
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
