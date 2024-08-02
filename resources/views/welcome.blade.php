<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer's Voice</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }
        .bg-image {
            background-image: url('/assets/images/pexels-kevinbidwell-1485319.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: -1;
        }
        .navbar-custom {
            background-color: rgba(0, 0, 0, 0.8);
        }
        .navbar-custom a {
            color: #fff !important;
        }
        h1,
        p {
            color: #007bff;
        }
        h2 {
            text-align: center;
            color: #343a40;
        }
        .content {
            position: relative;
            z-index: 1;
            padding: 2rem 0;
        }
        .about-section,
        .services-section,
        .contact-section {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }
        .about-section h2,
        .services-section h2,
        .contact-section h2 {
            color: #007bff;
        }

        .about-section p,
        .services-section p,
        .contact-section p {
            color: #333;
        }

        .navbar-toggler {
            background-color: white;
        }
        #nav a img {
            width: 50px;
            height: 50px;
            border-radius: 50px;
        }
        ul {
            list-style-type: none;
            padding-left: 0;
        }
        ul li {
            padding: 0.5rem 0;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .service-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 2rem 0;
            position: relative;
            z-index: 1;
        }
        .footer .footer-logo {
            width: 100px;
        }
        .footer .footer-links a {
            color: #ffffff;
            text-decoration: none;
            margin-right: 15px;
        }
        .footer .footer-links a:hover {
            text-decoration: underline;
        }
        .footer .social-icons a {
            color: #ffffff;
            margin-right: 10px;
            font-size: 1.5rem;
        }
        .footer .social-icons a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top" id="nav">
        <a class="navbar-brand" href="#"><img src="/assets/images/blog-logo.png" alt="Logo"> Farmers' Voice</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars navbar-toggler-icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}"><button class="btn btn-primary btn-sm">Login</button></a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="bg-image" id="home">
        <div class="text-center text-white">
            <h1>Greetings from Farmers' Voice</h1>
            <p>Uniting the Farming World, One Voice at a Time!</p>
        </div>
    </div>
    <div class="content">
        <div class="container" id="about">
            <div class="about-section">
                <h2>About Us</h2>
                <p>Welcome to Farmers' Voice – Your Partner in Modern Agriculture</p>
                <p>At Farmers' Voice, we are dedicated to transforming the world of farming through the power of information and technology. Our mission is to empower farmers by providing them with the latest insights, innovative practices, and advanced technologies that can enhance productivity and sustainability.</p>
                <p><strong>Our Vision</strong></p>
                <p>Our vision is to create a thriving community where farmers are at the forefront of agricultural innovation. We believe that by sharing knowledge and embracing advanced technology, we can help farmers improve their practices, increase yields, and achieve sustainable growth.</p>
                <p><strong>What We Do</strong></p>
                <ul>
                    <li><strong>In-Depth Blogs:</strong> We create comprehensive blogs on a wide range of farming topics. From advanced farming techniques and emerging technologies to practical tips and industry trends, our content is designed to keep you informed and inspired.</li>
                    <li><strong>Technology Integration:</strong> We explore and share the latest technological advancements in agriculture. Our goal is to help farmers integrate these technologies into their practices, making farming more efficient and effective.</li>
                    <li><strong>Community Engagement:</strong> At Farmers' Voice, we value the power of community. We provide a platform for farmers to share their experiences, learn from one another, and collaborate on finding solutions to common challenges.</li>
                    <li><strong>Educational Resources:</strong> We offer resources that guide farmers in implementing new techniques and technologies. Our step-by-step guides and expert insights are crafted to make complex concepts accessible and actionable.</li>
                </ul>
                <p><strong>Our Commitment</strong></p>
                <p>We are committed to supporting the agricultural community by delivering content that is both informative and actionable. Our team of experts and writers are passionate about farming and dedicated to helping you thrive in an ever-evolving industry.</p>
                <p><strong>Join Us</strong></p>
                <p>Explore our blog, engage with our content, and be part of a community that is committed to advancing the future of farming. At Farmers' Voice, we believe that together, we can shape a better and more sustainable agricultural landscape.</p>
                <p>Thank you for being a part of Farmers' Voice. Let’s grow together!</p>
            </div>
        </div>
        <div class="container mt-5" id="services">
            <div class="services-section">
                <h2 class="mb-3">Our Services</h2>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <img src="/assets/images/technology.jpg" alt="Technology Integration" class="service-image">
                        <h3 class="mt-3">Technology Integration</h3>
                        <p>We guide farmers through the latest agricultural technologies to improve efficiency and productivity. Learn about precision farming, automated systems, and drones to optimize your farming operations.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="/assets/images/soil health.jpg" alt="Soil Management" class="service-image">
                        <h3 class="mt-3">Soil Health and Management</h3>
                        <p>Discover the best practices for maintaining soil health, including soil testing, organic amendments, and erosion control. Our advice ensures you maintain fertile and productive soil for sustainable farming.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="/assets/images/organic.jpg" alt="Organic Farming" class="service-image">
                        <h3 class="mt-3">Organic Farming Practices</h3>
                        <p>Transition to organic farming with our expert guidance. Learn about composting, natural pest control, and other organic techniques that contribute to a sustainable farming environment.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="/assets/images/workshops.jpg" alt="Workshops" class="service-image">
                        <h3 class="mt-3">Educational Workshops</h3>
                        <p>Participate in our workshops and training sessions to stay updated with the latest farming techniques and technologies. Our workshops offer practical insights and hands-on experience to enhance your skills.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="/assets/images/farming-tips.jpg" alt="Workshops" class="service-image">
                        <h3 class="mt-3">Crop Management and Selection</h3>
                        <p>Choosing the right crops for your soil and climate is crucial for successful farming. Our experts offer guidance on selecting the best crops based on your region's conditions. We provide detailed information on crop rotation, pest management, and soil fertility to maximize yield and profitability.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <img src="/assets/images/profits.jpg" alt="Workshops" class="service-image">
                        <h3 class="mt-3">Profitability and Economic Analysis</h3>
                        <p>Maximizing profitability requires careful planning and analysis. We provide tools and resources to help you analyze your farming operations, evaluate costs and returns, and make informed decisions. Learn how to manage your resources efficiently, optimize input costs, and increase your overall profitability.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5" id="contact">
            <div class="contact-section">
                <h2>Contact Us</h2>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
                @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        <div class="container">
            <img src="/assets/images/blog-logo.png" alt="Footer Logo" class="footer-logo">
            <div class="footer-links mt-3">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#about">About</a>
                <a href="#contact">Contact</a>
            </div>
            <div class="social-icons mt-3">
                <a href="#" target="_blank" class="fab fa-facebook-f"></a>
                <a href="#" target="_blank" class="fab fa-twitter"></a>
                <a href="#" target="_blank" class="fab fa-instagram"></a>
                <a href="#" target="_blank" class="fab fa-linkedin-in"></a>
            </div>
            <p class="mt-3">&copy; 2024 Farmer's Voice. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>