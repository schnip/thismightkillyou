<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>This Might Kill You</title>

    <!-- CSS libraries -->
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="index.css"/>
    <link rel="stylesheet" type="text/css" href="nav.css" />

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/js/bootstrap.js"></script>

    <script src="js-cookie.js"></script>
    <script src="nav.js"></script>
    <script src="index.js"></script>

</head>
<body>

    <?php include("nav.php"); ?>


    <div class="content container">
        <div class="row header-row">
        <div class="headers col-md-4 col-md-offset-4">
            <h1>This Might Kill You</h1>
            <h4>The site where you can try the recipe, but we can't guarantee your safety.</h4>
            <a href="recipe.php">
                <button id="generateRecipe" class="btn btn-info">
                    Generate New Recipe
                </button>
            </a>
        </div>
            </div>

            <div class="displayed-recipes row">
                <h2>Top Ten Weekly Recipes</h2>
                <!-- This will be dynamically generated through queries -->
                <a href="#">
                    <div class="recipe">
                        <div class="recipe-text">
                        <h2>Chicken A La Blended</h2>
                        <h4>Ever wonder what happens when you blend a chicken?</h4>
                        </div>
                        <div class="recipe-details">
                            <i class="fa fa-birthday-cake">
                                <div class="counter bday-counter">6</div>
                            </i>
                            <i class="fa fa-heart">
                                <div class="counter heart-counter">+4</div>
                            </i>
                        </div>
                    </div>

                </a>
            </div>
        </div>
</body>
</html>
