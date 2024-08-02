<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer's Voice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .post-content {
                display: block;
            }

            .btn-primary {
                display: none;
            }
        }

        .post-title {
            cursor: pointer;
            color: #007bff;
            transition: color 0.3s ease;
        }

        .post-title:hover {
            color: #0056b3;
        }

        h1 {
            font-size: 35px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        h2 {
            font-size: 25px;
            margin-bottom: 0;
            color: #333;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }

        .navbar {
            background: linear-gradient(90deg, rgba(0, 123, 255, 1) 0%, rgba(0, 204, 255, 1) 100%);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            color: #ffffff !important;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-brand:hover {
            color: #e9ecef !important;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            font-weight: 500;
            margin-right: 15px;
        }

        .navbar-nav .nav-link:hover {
            color: #e9ecef;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        .dropdown-menu {
            background-color: #ffffff;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dropdown-menu .dropdown-item {
            color: #343a40;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .btn-outline-light {
            color: #ffffff;
            border-color: #ffffff;
        }

        .btn-outline-light:hover {
            background-color: #ffffff;
            color: #343a40;
            border-color: #ffffff;
        }

        .navbar-toggler {
            border-color: #ffffff;
        }

        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"%3E%3Cpath stroke="%23ffffff" stroke-width="2" d="M5 7h20M5 15h20M5 23h20" /%3E%3C/svg%3E');
        }

        .content {
            padding: 20px;
        }
        #logout{
            background-color: red;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{route('about')}}">Farmer's Voice</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}#contact">Contact</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-cogs"></i> Settings
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a href="{{route('about')}}"><button class="btn">Feedback</button></a>
                        </li>
                        {{--<li>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn" >Logout</button>
                            </form>
                        </li>--}}
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="mb-4 text-center">
            <a href="{{ route('export.pdf') }}" class="btn btn-primary">Export as PDF</a>
        </div>
        <h1 class="text-center">Your Assigned Blogs</h1>
        @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-header">
                <h2 class="post-title" onclick="toggleContent('{{$post->id}}')">{{ $post->title }}</h2>
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