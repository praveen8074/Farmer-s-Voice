@extends('layouts.frontend')

@section('content')
<style>
    #img {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    #img img {
        width: 100%;
        max-width: 300px;
        height: auto;
    }

    .content-section {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    #about {
        background-color: antiquewhite;
        padding: 20px;
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-start;
    }

    .feedback-form {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: relative;
        max-width: 600px;
        margin: 0 auto;
        height: auto;
    }

    .feedback-form h3 {
        text-align: center;
        margin-bottom: 12px;
    }

    .feedback-form img {
        display: block;
        margin: 0 auto 15px auto;
        width: 100px;
        height: auto;
    }

    .form-label {
        font-weight: bold;
    }
</style>

<div class="container my-5">

    <div class="text-center mb-5">
        <h1 class="display-4 text-primary">Thank You for Visiting Farmer's Voice!</h1>
        <p class="lead text-secondary">We appreciate your interest in our blog platform. At Farmer's Voice, we strive to bring you the latest and most relevant content about farming and agricultural practices. We hope you find our blogs helpful and informative.</p>
    </div>

    <div class="content-section">
        <div class="col-md-6" id="img">
            <img src="/assets/images/farmer-gratitude.jpg" alt="Farming" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col" id="about">
            <h2 class="text-primary">About Us</h2>
            <p>Farmer's Voice is dedicated to providing valuable insights and resources for farmers and agricultural enthusiasts. Our platform features a range of articles, guides, and tips to help you stay informed and make the most of your farming practices.</p>
            <p>Thank you for your support, and we look forward to seeing you again soon!</p>
            <a href="#feedback" class="btn btn-primary mt-3">Feedback</a>
        </div>
    </div>

    <!-- Feedback Form Section -->
    <div class="feedback-form mt-5" id="feedback">
        <img src="/assets/images/blog-logo.png" alt="Feedback Logo" class="form-header-img">
        <h3 class="text-primary">We Value Your Feedback</h3>
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="farmSize" class="form-label">Farm Size (acres)</label>
                <input type="number" class="form-control" id="farmSize" name="farm_size" required>
            </div>
            <div class="mb-3">
                <label for="cropType" class="form-label">Primary Crop Type</label>
                <input type="text" class="form-control" id="cropType" name="crop_type" required>
            </div>
            <div class="mb-3">
                <label for="feedback" class="form-label">Your Feedback</label>
                <textarea class="form-control" id="feedback" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@endsection