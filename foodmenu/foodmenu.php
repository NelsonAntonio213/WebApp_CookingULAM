<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Find Meal For Your Ingredients</title>
  <link rel="shortcut icon" href="../Images/ABRA LOGO ONLY.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
  <link rel = "stylesheet" href = "stylefm.css">
  <link rel = "stylesheet" href = "../navbar/navbar.css">
</head>
<body>
  <!-- Header Section -->
  <header>
    <?php include '../navbar/navbar.php'; ?>
  </header>

 
  <div class = "container">
    <div class = "meal-wrapper">
      <div class="meal-search">
          <h2 class="title">Search Meals by Ingredients or Name</h2>
    
          <div class="search-options">
              <button id="search-ingredient-btn" class="btn">Search Ingredient Name</button>
              <button id="search-meal-btn" class="btn">Search Meal Name</button>
          </div>

          <div class="meal-search-box">
              <input type="text" class="search-control" placeholder="Choose between two options above..." id="search-input">
              <button type="submit" class="search-btn btn" id="search-btn">
                  <i class="fas fa-search"></i>
              </button>
          </div>
     </div>

      <div class = "meal-result">
        <div id= "meal">
        </div>
      </div>

      <div class = "meal-details">
        <!-- recipe close btn -->
        <button type = "button" class = "btn recipe-close-btn" id = "recipe-close-btn">
          <i class = "fas fa-times"></i>
        </button>

        <!-- meal content -->
        <div class = "meal-details-content">
        </div>
      </div>
    </div>
  </div>
        

  <script src = "scriptsearchzz.js"></script>
</body>
</html>