<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/2f7569df82.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Court Data Managament System</title>
</head>

<body>
    <header>
        <div class="title">
            <i class="fas fa-gavel fa-3x"></i>
            <h1>Court Case Information System</h1>
        </div>
        <div id="home" class="navbar">
            <a href="#Home">Home</a>
            <a href="#FAQ">FAQ</a>
            <a href="#Help">Help</a>
            <a href="#Contact">Contact</a>
        </div>
    </header>
    <div id="test"></div>
    <div class="main">
        <button class="btn-main" id="admin-btn" onclick=admin_form()>Admin</button>
        <div id="admin-div"></div>
        <button class="btn-main" id="client-btn" onclick=client_form()>Client</button>
        <div id="client-div"></div>
        <button class="btn-main" id="lawyer-btn" onclick=lawyer_form()>Lawyer</button>
        <div id="lawyer-div"></div>
    </div>
    <script src="main.js"></script>

</body>

</html>