<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooking Ulam | Home Menu</title>
    <link rel="shortcut icon" href="../Images/ABRA LOGO ONLY.png" type="image/x-icon">
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="../home/styleh.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<header>
    <?php include '../navbar/navbar.php'; ?>
</header>

<!-- Home Page -->
<div class="home">
    <!-- Home Page First Slide -->
    <div class="main_slide">
        <div>
            <h1>Enjoy <span>FILIPINO ULAM</span> Authentic Recipe.</h1>
            <p>Savor the rich flavors of traditional Filipino dishes and indulge in time-honored recipes, passed down through generations, featuring bold, savory, and unique tastes that celebrate the heart of Filipino cuisine.</p>
            <a href="../foodmenu/foodmenu.php" class="red_btn">
                VISIT NOW <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
        <div>
            <img src="../Images/Home Display2.png" alt="Home Display">
        </div>
    </div>

    <!-- Suggested Food Menu Heading -->
    <h2>FOOD MENU SUGGESTION</h2>

    <!-- Home Page Second Slide -->
    <div class="food-items">
        <div class="item">
            <div>
                <img src="../Images/Torta.png" alt="Torta">
            </div>
            <h3>TORTANG TALONG</h3>
            <p>Tortang talong is a Filipino eggplant omelet that is simple yet flavorful dish is often enjoyed with rice and dipping sauces.</p>
        </div>

        <div class="item">
            <div>
                <img src="../Images/Asado.png" alt="Asado">
            </div>
            <h3>BEFF ASADO</h3>
            <p>Filipino braised beef dish with Chinese influences, made by simmering tender beef a flavorful meal enjoyed at family gatherings or special occasions.</p>
        </div>

        <div class="item">
            <div>
                <img src="../Images/Caldereta.png" alt="Caldereta">
            </div>
            <h3>BEEF CALDERETA</h3>
            <p>Filipino stew made with tender beef simmered in a rich tomato-based sauce loaded with vegetables like potatoes, carrots, and bell peppers, it’s a hearty and comforting dish.</p>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="sec6">
        <div>
            <a href="../about/about.php">
                <img src="../Images/ABRA LOGO ONLY.png" alt="ABRA Logo">
            </a>
        </div>
        <div>
            <ul>
                <li>MAIN MENU</li>
                <li><a href="../home/home.php">Home</a></li>
                <li><a href="../foodmenu/foodmenu.php">Recipe Menu</a></li>
                <li><a href="../about/about.php">About</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li>INFORMATION</li>
                <li><a href="#">Contact#: +63-9069157082</a></li>
                <li><a href="#">Email: @gmail.com</a></li>
                <li><a href="#">Company: ABRA</a></li>
            </ul>
        </div>
        <div>
            <ul>
                <li>ADDRESS</li>
                <p>1234 Maplewood Crescent, Apt 123<br>
                   Greenfield Heights District<br>
                   Lakeside Park Neighborhood<br>
                   Newborn City, Northeast 98765<br>
                   Philippines</p>
            </ul>
        </div>
    </div>

    <div class="footer">
        <p>Copyright &copy;2024 ABRA | All Rights Reserved</p>
    </div>
</div>

</body>
</html>
