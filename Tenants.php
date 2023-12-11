<?php
session_start();
include 'db.php';

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $user_id = $_SESSION['user_id'];

    // Fetch the user's name from the database
    $sql = "SELECT name FROM user WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $userName = $user['name'];
    } else {
        // Handle the case where the user's data couldn't be retrieved
        $userName = "User";
    }
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentEasy Dashboard</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">
            <img src="logo2.png" alt="RentEasy Logo" height="100">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="Tenants.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="viewlease_Tenant.html">View All Agreements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq_Tenant.html">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Landlord</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dispute.html">Dispute</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Profile
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.html">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="row">
        <div class="col-12">
            <div class="jumbotron">
                <h1 class="display-4">Welcome <?php echo $userName; ?></h1>
                <p class="lead">Trusted property and housing agreements who often helps clients to get their dream home
                    without any hassle.</p>
            </div>
        </div>
        <!-- Additional sections -->
    </div>

    <!-- Include Bootstrap JS and its dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script>
    window.botpressWebChat.init({
        composerPlaceholder: "Chat with bot",
        botConversationDescription: "This chatbot was built surprisingly fast with Botpress",
        botId: "026ba25e-ce52-423e-b179-1d1d0c003096",
        hostUrl: "https://cdn.botpress.cloud/webchat/v1",
        messagingUrl: "https://messaging.botpress.cloud",
        clientId: "026ba25e-ce52-423e-b179-1d1d0c003096",
        webhookId: "882c4b5b-0ef3-44b2-ad4f-6642c017499b",
        lazySocket: true,
        themeName: "prism",
        frontendVersion: "v1",
        showPoweredBy: true,
        theme: "prism",
        themeColor: "#2563eb",
    });
    </script>
    <script src="main.js"></script>
</body>

</html>