<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Calling the CSS files -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styleab.css"> 
    <link rel="shortcut icon" href="../Images/ABRA LOGO ONLY.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../navbar/navbar.css">
    <link rel="stylesheet" href="../home/styleab.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooking Ulam | About Menu</title>
</head>
<body></body>

<header>
    <?php include '../navbar/navbar.php'; ?>
</header>

        <!-- Main Section -->
       <div class="container">
        <!-- Group Info Section -->
        <section class="about-group">
            <img src="../Images/team.png" alt="Group Image" class="group-image">
            <h1>ABRA</h1>
            <p class="group-history">In 2022, our group came together, initially as a collection of individuals sharing common goals and interests. However, it wasn’t until 2023, during a pivotal Technopreneurship project presentation, that we formally established our identity and chose a name that would represent our shared vision and aspirations. This moment marked a significant turning point, uniting us with a clear purpose and a collective identity. Since then, our group has been dedicated to consistently completing tasks and delivering results in all our project endeavors.</p>
        </section>
        
        <!-- Team Profiles Section -->
        <section class="team-section">
            <h1>Meet Our Team</h1>
            <div class="profiles">
                <div class="profile">
                    <img src="../Images/SON.jpg" alt="Antonio, Nelson Klyde B." class="profile-pic">
                    <h2>Antonio, Nelson Klyde B.</h2>
                    <p>Lead Web Developer</p>
                </div>
                <div class="profile">
                    <img src="../Images/JC.jpg" alt="Rivera, John Carl A." class="profile-pic">
                    <h2>Rivera, John Carl A.</h2>
                    <p>Quality Assurance Engineer</p>
                </div>
                <div class="profile">
                    <img src="../Images/GEL.jpg" alt="Tubongbanua, Reingel R." class="profile-pic">
                    <h2>Tubongbanua, Reingel R.</h2>
                    <p>Front-End Developer</p>
                </div>
                <div class="profile">
                    <img src="../Images/ZAF.jpg" alt="Zafra, Paolo Dominic A." class="profile-pic">
                    <h2>Zafra, Paolo Dominic A.</h2>
                    <p>Back-End Developer</p>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>Copyright &copy;2024 ABRA | All Rights Reserved</p>
    </div>
    
    <!-- Script for the responsive menu -->
    <script src="app.js"></script>
    <script src="script.js"></script>
</body>
</html>
