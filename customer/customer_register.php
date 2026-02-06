<!DOCTYPE html>
<html lang="en">

<head>
    <title>The Guitar Store</title> 
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/customer_register.css">
</head>

<body>
    <?php include 'view/header.php'; ?>
    <?php include 'view/horizontal_nav_bar.php'; ?>
    <main>
        <?php include 'view/aside.php'; ?>
        <section>
            <form action="?action=customer_register_submit" method="POST">
                <h2>Customer Register</h2>
                
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname">
                
                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname">
                
                <label for="email">Email Address:</label>
                <input type="text" id="email" name="email">
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                
                <label for="ssn">SSN:</label>
                <input type="text" id="ssn" name="ssn">
                
                <div class="button-row">
                    <input type="submit" id="register" value="Register">
                    <input type="button" id="cancel" value="Cancel">
                    <input type="button" id="login" value="Already have an account? Login here!">
                </div>
            </form>

            <!-- embedded script for invalid email address -->
            <script>
                "use strict";
                
                const $ = selector => document.querySelector(selector);
                
                const checkEmailAddress = (email) => {
                    // check if not in valid email format
                    const regex = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
                    if (!regex.test(email)) {
                        alert("Invalid email address");
                        $("#email").value = email;
                        $("#email").focus();
                        event.preventDefault();
                    }
                };

                const checkSSN = (ssn) => {
                    // check if not in valid ssn format
                    const regex = /^\d{9}$/;
                    if (!regex.test(ssn)) {
                        alert("Invalid SSN");
                        $("#ssn").value = ssn;
                        $("#ssn").focus();
                        event.preventDefault();
                    }
                };
                
                document.addEventListener("DOMContentLoaded", () => {
                    $("#register").addEventListener("click", () => {
                        const email = $("#email").value;
                        checkEmailAddress(email);
                        const ssn = $("#ssn").value;
                        checkSSN(ssn);
                    });
                    // clear all input fields
                    $("#cancel").addEventListener("click", () => {
                        $("#fname").value = "";
                        $("#lname").value = "";
                        $("#email").value = "";
                        $("#password").value = "";
                        $("#ssn").value = "";
                        $("#fname").focus();
                    });
                    // redirect to login page
                    $("#login").addEventListener("click", () => {
                        window.location.href = "?action=customer_login";
                    });
                });
            </script>
        </section>
    </main>
    <?php include 'view/footer.php'; ?>
    <script src="scripts\date.js"></script>
</body>    
</html>