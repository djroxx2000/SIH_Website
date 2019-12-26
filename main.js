const admin_btn = document.getElementById('admin-btn');
const client_btn = document.getElementById('client-btn');
const lawyer_btn = document.getElementById('lawyer-btn');
const admin_div = document.getElementById('admin-div');
const client_div = document.getElementById('client-div');
const lawyer_div = document.getElementById('lawyer-div');
const test = document.getElementById('test');


function admin_form() {

    admin_div.innerHTML = '<form action="includes/login.inc.php" method="POST"> Username / Email: <input type="text" placeholder="XYZ" name="uid">Password: <input type="password" name="pwd"><input type="submit" value="Login" name="admin-login"></form><a href="admin_signup.php">Sign Up</a>'
    client_div.innerHTML = '';
    lawyer_div.innerHTML = '';
}

function lawyer_form() {
    lawyer_div.innerHTML = '<form action="includes/login.inc.php" method="POST"> Username / Email: <input type="text" placeholder="XYZ" name="uid">Password: <input type="password" name="pwd"><input type="submit" value="Login" name="lawyer-login"></form><a href="lawyer_signup.php">Sign Up</a>'
    admin_div.innerHTML = '';
    client_div.innerHTML = '';
}

function client_form() {
    client_div.innerHTML = '<form action="includes/login.inc.php" method="POST"> Username / Email: <input type="text" placeholder="XYZ" name="uid">Password: <input type="password" name="pwd"><input type="submit" value="Login" name="client-login"></form><a href="signup.php">Sign Up</a>'
    admin_div.innerHTML = '';
    lawyer_div.innerHTML = '';
}

