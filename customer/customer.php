<!DOCTYPE html>
<html lang="en">

<head>
    <title>Castle Hedgefund</title> 
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/customer.css">
</head>

<body>
    <?php include 'view/header.php'; ?>
    <?php include 'view/horizontal_nav_bar.php'; ?>
    <main>
        <?php include 'view/aside.php'; ?>
        <section>
            <div class="customer-info">
                <div class="profile-layout">
                    
                    <div class="form-container">
                        <h2>Employee Information</h2>
                        <form action="?action=update_customer_info" method="POST">
                            <input type="hidden" value="<?php echo htmlspecialchars($customer_info['customer_id']); ?>" name="get_customer_id">
                            <p>
                                <label for="fname">First Name:</label>
                                <input type="text" id="fname" value="<?php echo htmlspecialchars($fname); ?>" name="fname">
                            </p>
                            <p>
                                <label for="lname">Last Name:</label>
                                <input type="text" id="lname" value="<?php echo htmlspecialchars($lname); ?>" name="lname">
                            </p>
                            <p>
                                <label for="email">Email Address:</label>
                                <input type="text" id="email" value="<?php echo htmlspecialchars($email_address); ?>" name="email">
                            </p>
                            <p>
                                <label for="password">Password:</label>
                                <input type="password" id="password" value="<?php echo htmlspecialchars($password); ?>" name="password">
                            </p>
                            <p>
                                <label for="ssn">SSN:</label>
                                <input type="text" id="ssn" value="<?php echo htmlspecialchars($ssn); ?>" name="ssn">
                            </p>
                        </form>
                    </div>

                    <div class="support-container">
                        <a href="#" id="support-link">Need technical support?</a>
                    </div>
                </div>

                <?php if ($customer_info['isAdmin'] == 1) include 'view/user_search.php'; ?>
            </div>
        </section>

        <div id="support-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h3>Technical Support Contact</h3>
                <p>Name: Carter Briggs</p>
                <p>Role: System Administrator</p>
                <p>Email: carter@castlehedgefund.com</p>
            </div>
        </div>

    </main>
    <?php include 'view/footer.php'; ?>
    <script src="scripts\date.js"></script>
    <script src="scripts\customer.js"></script>
</body>    
</html>