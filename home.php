<!DOCTYPE html>
<html lang="en">

<head>
    <title>Castle Hedgefund</title> 
    <link rel="stylesheet" href="styles/main.css">
</head>

<body>
    <?php include 'view/header.php'; ?>
    <?php include 'view/horizontal_nav_bar.php'; ?>
    <main>
        <section>
            <h1>Welcome to Castle Hedgefund!</h1>
            <p>Why entrust your capital to Castle Hedgefund? We manage one of the 
                most aggressive portfolios in the sector, leveraging proprietary 
                high-frequency trading algorithms and offshore tax-shielding strategies. 
                Our platform allows you to monitor your net worth in real-time, while 
                our dedicated wealth managers ensure your assets are insulated from 
                market volatility. If you are looking to maximize your alpha, our 
                advisors are just seconds away.</p>
            
            
            <p>For institutional-grade advice, you can contact our trading floor at 
                855-770-3373 or initiate a Secure Live Chat to speak with a Senior 
                Investment Associate.</p>
            
            <h2>Portfolio Highlight: Emerging Markets</h2>
            <p>Enter a portfolio code (e.g. <strong>agressive_growth</strong> to view portfolio detail)</p>
            <form action='index.php' method='get'>
                <input type='hidden' name='action' value='products'>
                <input type='text' name='portfolio' placeholder=''>
                <button type='submit'>View Analysis</button>
            </form>

          
            <h3>Our guarantee</h3>
            <p>We pride ourselves on discretion and performance. While all market 
                investments carry risk, we guarantee that our administrative fees are 
                the most competitive in the industry. 
                <strong>Your wealth, our fortress.</strong></p> 
        </section>
    </main>
    <?php include 'view/footer.php'; ?>
    <script src="scripts\date.js"></script>
</body>    
</html>