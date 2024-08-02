<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer's Voice</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .post-content {
            display: none;
            margin-top: 10px;
        }

        .post-title {
            cursor: pointer;
            color: #007bff;
            text-decoration: underline;
        }

        .assign-dropdown {
            display: none;
            margin-top: 10px;
        }

        .btn-assign {
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .post-title {
            text-decoration: none;
        }
        h2{
            font-size: 20px;
        }
        h1{
            font-size: 35px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
    <div class="mb-4 text-center">
            <a href="{{ route('table.index') }}" class="btn btn-primary">View Post Details</a>

        </div>
        <h1 class="mb-4" style="text-align:center">View Your Assigned Blogs </h1>
        @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="post-title" onclick="toggleContent({{ $post->id }})">{{ $post->title }}</h2>
            </div>
            <div id="content-{{ $post->id }}" class="card-body post-content">
                <p>{!! $post->content !!}</p>
                @if($post->image)
                <img src="{{ asset($post->image) }}" alt="Post Image" class="img-fluid">
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleContent(postId) {
            var content = document.getElementById('content-' + postId);
            content.style.display = content.style.display === 'none' || content.style.display === '' ? 'block' : 'none';
        }
    </script>
</body>

</html>
