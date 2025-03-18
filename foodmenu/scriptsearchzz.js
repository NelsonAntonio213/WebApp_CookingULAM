const searchBtn = document.getElementById('search-btn');
const mealList = document.getElementById('meal');
const mealDetailsContent = document.querySelector('.meal-details-content');
const recipeCloseBtn = document.getElementById('recipe-close-btn');

// Get references to the new buttons
const searchIngredientBtn = document.getElementById('search-ingredient-btn');
const searchMealBtn = document.getElementById('search-meal-btn');

let searchType = 'ingredient'; // Default to ingredient search

// Event listeners
searchBtn.addEventListener('click', getMealList);
mealList.addEventListener('click', getMealRecipe);
recipeCloseBtn.addEventListener('click', () => {
    mealDetailsContent.parentElement.classList.remove('showRecipe');
});

// Update search type based on button click
searchIngredientBtn.addEventListener('click', () => {
    searchType = 'ingredient';
    document.getElementById('search-input').placeholder = 'Enter an ingredient...';
});

searchMealBtn.addEventListener('click', () => {
    searchType = 'meal';
    document.getElementById('search-input').placeholder = 'Enter a meal name...';
});

// Get meal list based on search type
function getMealList() {
    let searchInputTxt = document.getElementById('search-input').value.trim().toLowerCase();

    if (searchType === 'ingredient') { // Kapag search by ingredient pinili
        let searchInputTxt = document.getElementById('search-input').value.trim().toLowerCase();
        fetch(`https://www.themealdb.com/api/json/v1/1/filter.php?a=Filipino`)
        .then(response => response.json())
        .then(data => {
            let html = "";
            if(data.meals){
                // Check each meal's ingredients to see if the search term matches any
                let mealPromises = data.meals.map(meal => {
                    return fetch(`https://www.themealdb.com/api/json/v1/1/lookup.php?i=${meal.idMeal}`)
                        .then(response => response.json())
                        .then(mealData => {
                            let mealDetail = mealData.meals[0];
                        
                            // Check if any ingredient matches the search input
                            for (let i = 1; i <= 20; i++) {
                                let ingredient = mealDetail[`strIngredient${i}`];
                                if (ingredient && ingredient.toLowerCase().includes(searchInputTxt)) {
                                    return `
                                        <div class="meal-item" data-id="${mealDetail.idMeal}">
                                            <div class="meal-img">
                                                <img src="${mealDetail.strMealThumb}" alt="food">
                                            </div>
                                            <div class="meal-name">
                                                <h3>${mealDetail.strMeal}</h3>
                                                <a href="#" class="recipe-btn">Get Recipe</a>
                                            </div>
                                        </div>
                                    `;
                                }
                            }
                            return ""; // No match for this meal
                        });
                });

                // Wait for all meal details to be fetched and filtered
                Promise.all(mealPromises).then(mealHTMLArray => {
                    html = mealHTMLArray.join(""); // Combine all meal HTML
                
                    // Display message if no meals matched the ingredient
                    if (html === "") {
                        html = "Sorry, we didn't find any meal with that ingredient!";
                        mealList.classList.add('notFound');
                    } else {
                        mealList.classList.remove('notFound');
                    }

                    mealList.innerHTML = html;
                });
            } else {
                html = "Sorry, we didn't find any meal!";
                mealList.classList.add('notFound');
                mealList.innerHTML = html;
            }
        });
    }
    
        else if (searchType === 'meal') { // Kapag search by meal name pinili
            let searchInputTxt = document.getElementById('search-input').value.trim().toLowerCase();
            fetch(`https://www.themealdb.com/api/json/v1/1/filter.php?a=Filipino`)
            .then(response => response.json())
            .then(data => {
                let html = "";
                if(data.meals){
                    data.meals.forEach(meal => {
                        // Check if the ingredient is in the meal name
                        if (meal.strMeal.toLowerCase().includes(searchInputTxt)) {
                            html += `
                                <div class="meal-item" data-id="${meal.idMeal}">
                                    <div class="meal-img">
                                        <img src="${meal.strMealThumb}" alt="food">
                                    </div>
                                    <div class="meal-name">
                                        <h3>${meal.strMeal}</h3>
                                        <a href="#" class="recipe-btn">Get Recipe</a>
                                    </div>
                                </div>
                            `;
                        }
                    });
        
                    if (html === "") {
                        html = "Sorry, we didn't find any meal with that ingredient!";
                        mealList.classList.add('notFound');
                    } else {
                        mealList.classList.remove('notFound');
                    }
                } else {
                    html = "Sorry, we didn't find any meal!";
                    mealList.classList.add('notFound');
                }
        
                mealList.innerHTML = html;
            });
        }        
}

// Function to display meals in HTML
function displayMeals(data) {
    let html = "";
    if (data.meals) {
        data.meals.forEach(meal => {
            html += `
                <div class="meal-item" data-id="${meal.idMeal}">
                    <div class="meal-img">
                        <img src="${meal.strMealThumb}" alt="food">
                    </div>
                    <div class="meal-name">
                        <h3>${meal.strMeal}</h3>
                        <a href="#" class="recipe-btn">Get Recipe</a>
                    </div>
                </div>
            `;
        });
        mealList.classList.remove('notFound');
    } else {
        html = "Sorry, we didn't find any meal!";
        mealList.classList.add('notFound');
    }
    mealList.innerHTML = html;
}

// Fetch meal recipe details
function getMealRecipe(e) {
    e.preventDefault();
    if (e.target.classList.contains('recipe-btn')) {
        let mealItem = e.target.parentElement.parentElement;
        fetch(`https://www.themealdb.com/api/json/v1/1/lookup.php?i=${mealItem.dataset.id}`)
            .then(response => response.json())
            .then(data => mealRecipeModal(data.meals));
    }
}

// Display recipe in a modal
function mealRecipeModal(meal) {
    meal = meal[0];
    let html = `
        <h2 class="recipe-title">${meal.strMeal}</h2>
        <p class="recipe-category">${meal.strCategory}</p>
        <div class="recipe-instruct">
            <h3>Instructions:</h3>
            <p>${meal.strInstructions}</p>
        </div>
        <div class="recipe-meal-img">
            <img src="${meal.strMealThumb}" alt="">
        </div>
        <div class="recipe-link">
            <a href="${meal.strYoutube}" target="_blank">Watch Video</a>
        </div>
    `;
    mealDetailsContent.innerHTML = html;
    mealDetailsContent.parentElement.classList.add('showRecipe');
}



document.addEventListener("DOMContentLoaded", () => {
    const createPostBtn = document.getElementById("create-post-btn");
    const postForm = document.getElementById("post-form");
    const submitPostBtn = document.getElementById("submit-post-btn");
    const postsDisplay = document.getElementById("posts-display");

    // Toggle post form visibility
    createPostBtn?.addEventListener("click", () => {
        postForm.style.display = postForm.style.display === "none" ? "block" : "none";
    });

    // Handle post submission
    submitPostBtn?.addEventListener("click", async () => {
        const postContent = document.getElementById("post-content").value;

        if (postContent.trim() !== "") {
            const response = await fetch('create_post.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ content: postContent })
            });
            const result = await response.json();

            if (result.success) {
                document.getElementById("post-content").value = "";
                loadPosts();
            } else {
                alert("Failed to create post.");
            }
        }
    });

});