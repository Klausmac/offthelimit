<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Community Platform</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(to right, #0066cc, #003366);
            color: white;
            padding: 50px 20px;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
        }

        .hero-section p {
            font-size: 1.2rem;
        }

        .features-section {
            background-color: #f8f9fa;
            padding: 50px 20px;
        }

        .feature-card {
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: scale(1.05);
        }

        .advocates-section {
            padding: 50px 20px;
            background-color: #f0f8ff;
        }

        .advocate-card {
            border: none;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .advocate-card:hover {
            transform: translateY(-10px);
        }

        .advocate-icon {
            font-size: 3rem;
            color: #0066cc;
            margin-bottom: 15px;
        }

        .discussions-section {
            padding: 50px 20px;
        }
    </style>
</head>
<body>
    <?php session_start(); ?>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Legal Community</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#advocates">Advocates</a></li>
                    <li class="nav-item"><a class="nav-link" href="discussyourissue.php">Discussions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <?php if (isset($_SESSION['username'])): ?>
                        <li class="nav-item"><a class="nav-link" href="account.php">Account</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Welcome to the Legal Community Platform</h1>
            <p>Empowering legal advocacy, education, and networking for all.</p>
        </div>
    </section>

    <!-- Discussions Section -->
    <section id="discussions" class="discussions-section">
        <div class="container text-center">
            <h2>Discuss Your Legal Issues</h2>
            <p>Join the community to discuss and find solutions for your legal challenges.</p>
            <a href="discussyourissue.php" class="btn btn-primary">Join Discussions</a>
        </div>
    </section>

    <!-- Advocates Section -->
    <section id="advocates" class="advocates-section">
        <div class="container text-center">
            <h2>Find Specialized Advocates</h2>
            <p>Get connected with experts in different areas of law.</p>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="advocate-card p-4">
                        <div class="advocate-icon">⚖️</div>
                        <h5 class="advocate-title">Criminal Law</h5>
                        <p>Expert advocates in criminal justice.</p>
                        <a href="criminal-advocates.php" class="btn btn-primary">Find Advocates</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="advocate-card p-4">
                        <div class="advocate-icon">👨‍👩‍👧‍👦</div>
                        <h5 class="advocate-title">Family Law</h5>
                        <p>Specialists in divorce, custody, and more.</p>
                        <a href="family-advocates.php" class="btn btn-primary">Find Advocates</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="advocate-card p-4">
                        <div class="advocate-icon">🏢</div>
                        <h5 class="advocate-title">Corporate Law</h5>
                        <p>Experienced in business and corporate matters.</p>
                        <a href="corporate-advocates.php" class="btn btn-primary">Find Advocates</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Features Section -->
<section id="features" class="features-section">
        <div class="container text-center">
            <h2>Our Features</h2>
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="card feature-card">
                        <div class="card-body">
                            <h5 class="card-title">Forums</h5>
                            <p class="card-text">Engage in discussions on diverse legal topics.</p>
                            <a href="forums.php" class="btn btn-outline-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card feature-card">
                        <div class="card-body">
                            <h5 class="card-title">Resources</h5>
                            <p class="card-text">Access templates, FAQs, and case summaries.</p>
                            <a href="resources.php" class="btn btn-outline-primary">Explore</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card feature-card">
                        <div class="card-body">
                            <h5 class="card-title">Blog</h5>
                            <p class="card-text">Stay updated with legal news and educational content.</p>
                            <a href="blog.php" class="btn btn-outline-primary">Read Blog</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card feature-card">
                        <div class="card-body">
                            <h5 class="card-title">Events</h5>
                            <p class="card-text">Join webinars and community activities.</p>
                            <a href="events.php" class="btn btn-outline-primary">View Events</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="login-logic.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Legal Community Platform. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

