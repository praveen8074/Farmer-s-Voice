@extends('layouts.nav')
@section('navcontent')

<style>
    .post-content {
        display: none;
        margin-top: 10px;
    }

    .post-title {
        cursor: pointer;
        color: #007bff;
        transition: color 0.3s ease;
    }

    .post-title:hover {
        color: #0056b3;
        /* Darker shade on hover */
        text-decoration: none;
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

    .btn-assign:hover {
        background-color: #0056b3;
    }

    h2 {
        font-size: 20px;
        margin-bottom: 0;
        color: #333;
    }

    h1 {
        font-size: 35px;
        margin-bottom: 20px;
        font-weight: bold;
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
        padding: 10px 15px;
    }
</style>

<body>
    <div class="container mt-4">
        <div class="mb-4 text-center">
            <a href="{{ route('table.index') }}" class="btn btn-primary">View Post Details</a>
        </div>
        <h1 class="text-center">Knowledge Center: Explore Our Blog Posts</h1>
        @foreach($posts as $post)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="post-title" onclick="toggleContent('{{ $post->id }}')">{{ $post->title }}</h2>
                <button class="btn btn-primary btn-assign" onclick="toggleDropdown('{{ $post->id }}')">Assign User</button>
            </div>
            <div id="content-{{ $post->id }}" class="card-body post-content">
                <p>{!! $post->content !!}</p>
                @if($post->image)
                <img src="{{ asset($post->image) }}" alt="Post Image" class="img-fluid">
                @endif
                <div id="dropdown-{{ $post->id }}" class="assign-dropdown mt-4 mb-4 p-3 border rounded bg-light">
                    <form action="{{ route('posts.store-details', ['postId' => $post->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="user-{{ $post->id }}" class="form-label">Assign to</label>
                            <select name="user_id" id="user-{{ $post->id }}" class="form-select" required>
                                <option value="" selected disabled>Select User</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Assign</button>
                    </form>
                </div>
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

        function toggleDropdown(postId) {
            var dropdown = document.getElementById('dropdown-' + postId);
            var content = document.getElementById('content-' + postId);
            dropdown.style.display = dropdown.style.display === 'none' || dropdown.style.display === '' ? 'block' : 'none';
            if (content.style.display === 'none' || content.style.display === '') {
                toggleContent(postId);
            }
        }
    </script>
    @endsection