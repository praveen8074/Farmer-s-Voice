@extends('layouts.nav')

@section('navcontent')

<div class="container mt-5">
    <div class="msg mb-4">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="row justify-content-center">
        <div class="col col-lg-8">
            <div class="card shadow-lg border-light rounded-lg">
                <div class="card-header bg-primary text-white text-center py-4">
                    <h2 class="mb-0">Blog Writing Board</h2>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control form-control-lg " placeholder="Enter post title" required>
                            @if ($errors->has('title'))
                            <div class="text-danger mt-1">{{ $errors->first('title') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control rounded-pill ckeditor" rows="6" placeholder="Enter post content" required></textarea>
                            @if ($errors->has('content'))
                            <div class="text-danger mt-1">{{ $errors->first('content') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-lg w-100 ">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        CKEDITOR.replace('content');
    });
</script>

@endsection
