<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="./"><i class="bi bi-bus-front"></i> PPN EXPRESS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php if (isset($_SESSION['user_name'])) {
                ?>
                    <a class="nav-link active" aria-current="page" href="logout.php"><?php echo $_SESSION['user_name']; ?></a>
                    <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                <?php
                } else { ?>
                    <a class="nav-link" href="login.php">Login</a>
                <?php } ?>
                <a class="nav-link" aria-current="page" href="signup.php">Signup</a>
            </div>
        </div>
    </div>
</nav>

<body>