<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .account-section {
            padding: 50px 20px;
            background-color: #f8f9fa;
        }

        .account-details {
            margin-bottom: 30px;
        }

        .logout-button {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        echo "<script>alert('You need to login first!'); window.location.href='index.php';</script>";
        exit;
    }
    ?>

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
                    <li class="nav-item"><a class="nav-link" href="#discussions">Discussions</a></li>
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

    <!-- Account Section -->
    <section class="account-section">
        <div class="container">
            <h2 class="text-center">Your Account</h2>

            <!-- Account Details -->
            <div class="account-details">
                <h4>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h4>
                <p>Manage your profile and settings below.</p>
            </div>

            <!-- Options -->
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Profile</h5>
                            <p class="card-text">View and edit your personal details.</p>
                            <a href="profile.php" class="btn btn-primary">Go to Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Forums</h5>
                            <p class="card-text">Participate in community discussions.</p>
                            <a href="forums.php" class="btn btn-primary">Join Forums</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Resources</h5>
                            <p class="card-text">Access legal templates and guides.</p>
                            <a href="resources.php" class="btn btn-primary">Explore Resources</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logout Button -->
            <div class="logout-button mt-5">
                <form action="logout.php" method="POST">
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>&copy; 2024 Legal Community Platform. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
