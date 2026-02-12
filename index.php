<?php 
require('model/database.php');
require('model/category_db.php');
require('model/product_db.php');
require('model/customer_db.php');
require('model/address_db.php');

// get action
$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
}

if ($action == null) {
    include 'home.php';
} else {
    if ($action == 'category_name') {
        $categories = get_categories();
        $category_id = filter_input(INPUT_GET, 'category_id',
        FILTER_VALIDATE_INT);
        if ($category_id == null || $category_id == false) {
            $category_id = 1;
        }
        if ($category_id == 1) {
            include 'products/guitars.php';
        } else {
            include 'home.php';
        }
    } else if ($action == 'products') {
        $categories = get_categories();
        $category_id = filter_input(INPUT_POST, 'category',
            FILTER_VALIDATE_INT);
        if ($category_id == null || $category_id == false) {
            $category_id = 1; // default category
            $category_name = get_category_name($category_id);
            $products = get_product($category_id);
        } else {
            // get category name and products
            $category_name = get_category_name($category_id);
            $products = get_product($category_id);
        }
        include 'products/product_list.php';
    } else if ($action == 'shipping') {
        $categories = get_categories();
        include 'shipping.php';
    } else if ($action == 'support') {
        $categories = get_categories();
        include 'support.php';
    } else if ($action == 'customer_register') {
        include 'customer/customer_register.php';
    } else if ($action == 'customer_register_submit') {
        $email_address = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $first_name = filter_input(INPUT_POST, 'fname');
        $last_name = filter_input(INPUT_POST, 'lname');
        $ssn = filter_input(INPUT_POST, 'ssn');
        
        // check if the email address is already registered
        $customer_info = get_customer_info_by_email_address($email_address);
        if ($customer_info != null && $customer_info != false) {
            echo '<script>alert("Email address already exists, please use a different email address");</script>';
            include 'customer/customer_register.php';
        } else {
            // register the new customer to the database
            register_customer($email_address, $password, $first_name, $last_name, $ssn);
            echo '<script>alert("Registration successful! Please login with your credentials");</script>';
            include 'customer/customer_login.php';
        }
    } else if ($action == 'customer_login') {
        include 'customer/customer_login.php';
    } else if ($action == 'customer_page') {
        $email_address = filter_input(INPUT_POST, 'email');
        if ($email_address == null || $email_address == false) {
            $email_address = filter_input(INPUT_GET, 'email');
        }
        $password = filter_input(INPUT_POST, 'password');
        if ($password == null || $password == false) {
            $password = filter_input(INPUT_GET, 'password');
        }
        
        $customer_info = login_customer($email_address, $password);
        
        if ($customer_info == null || $customer_info == false) {
            $customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
            $customer_info = get_customer_info($customer_id);
        }
        
        // check if the customer info can be found in the database
        if ($customer_info == null || $customer_info == false) {
            echo '<script>alert("Customer not found, please use valid credentials");</script>';
            include 'customer/customer_login.php';
        } else {
            // customer information here
            $fname = $customer_info['first_name'];
            $lname = $customer_info['last_name'];
            $email_address = $customer_info['email_address'];
            $password = $customer_info['password'];
            $ssn = $customer_info['ssn'];
            include 'customer/customer.php'; 
        }
    } else if ($action == 'update_customer_info') {
        $email_address = filter_input(INPUT_POST, 'email');

        if ($email_address == null || $email_address == false) {
            $email_address = filter_input(INPUT_GET, 'email');
        }
        $customer_info = get_customer_info_by_email_address($email_address);
        
        if ($customer_info == null || $customer_info == false) {
            $customer_id = filter_input(INPUT_POST, 'get_customer_id', FILTER_VALIDATE_INT);
            $customer_info = get_customer_info($customer_id);
        }

        $customer_id = $customer_info['customer_id']; 

        // get customer information from customer page
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $password = filter_input(INPUT_POST, 'password');
        $ssn = filter_input(INPUT_POST, 'ssn');
        
        // update the customer info
        update_first_name($customer_id, $fname);
        update_last_name($customer_id, $lname);
        update_email_address($customer_id, $email_address);
        update_ssn($customer_id, $ssn);
        // check if the password is not empty and update accordingly
        if ($password != null) {
            update_password($customer_id, $password);
        }
        
        include 'customer/customer.php';
    }
    else {
        include 'home.php';
    }
}
?>