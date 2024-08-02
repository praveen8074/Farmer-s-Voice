<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer's Voice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Open Sans', sans-serif;
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
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
            font-size: 1.75rem;
        }
        .navbar-brand:hover {
            color: #e9ecef !important;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
            font-family: 'Roboto', sans-serif;
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
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
        }

        .dropdown-menu .dropdown-item {
            color: #343a40;
            font-family: 'Open Sans', sans-serif;
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

        .show { display: block !important; }
      #dropdownMenu{
        padding: 10px;

      }
      #logout{
        background-color: red;
        color: white;
        text-align: center;
      }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{route('about')}}">Farmer's Voice</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" >
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i> Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url()->previous() }}"><i class="fas fa-arrow-left"></i> Back</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-expanded="false">
                        <i class="fas fa-cogs"></i> Settings
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropdownMenu">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('posts.index') }}">Assign Blog</a></li>
                        <li><a class="dropdown-item" href="{{ route('posts.create') }}">Create Blog</a></li>
                        <li><a class="dropdown-item" href="{{ route('feedback.index') }}">View Feedbacks</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.users.index') }}">Registrants</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;" >
                                @csrf
                                <button type="submit" class="dropdown-item" id="logout">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    @yield('navcontent')

    <!-- Custom Script for Dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dropdownToggle = document.getElementById('navbarDropdown');
            var dropdownMenu = document.getElementById('dropdownMenu');

            dropdownToggle.addEventListener('click', function() {
                if (dropdownMenu.classList.contains('show')) {
                    dropdownMenu.classList.remove('show');
                } else {
                    dropdownMenu.classList.add('show');
                }
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
    </script>
</body>

</html>
