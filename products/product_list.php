<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Castle Hedgefund</title> 
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/products.css">
</head>

<body>
    <?php include 'view/header.php'; ?>
    <?php include 'view/horizontal_nav_bar.php'; ?>
    <main>
      
        <?php if($product_name != null && $product_name != false): ?>
        <?php include 'products/'.$product_name. '.php'; ?>
        <?php else: ?>
        <section>
                <p>Enter a portfolio code (e.g. <strong>agressive_growth</strong> to view portfolio detail:</p>
                <form action='index.php' method='get'>
                    <input type='hidden' name='action' value='products'>
                    <input type='text' name='portfolio' placeholder=''>
                    <button type='submit'>View Analysis</button>
                </form>
        </section>
        <?php endif; ?>
       
    </main>
    <?php include 'view/footer.php'; ?>
    <script src="scripts\date.js"></script>
    
</body>

</html>
