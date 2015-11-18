<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Recipe</title>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="recipe.css"/>
    <link rel="stylesheet" type="text/css" href="nav.css" />

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/js/bootstrap.js"></script>

    <script src="underscore.js"></script>
    <script src="js-cookie.js"></script>
    <script src="nav.js"></script>
    <script src="recipe.js"></script>
</head>
<body>

    <?php include("nav.php"); ?>

    <div class="recipe container">
        <h1 id="recipeName"></h1>

        <div id="itemsNeeded" class="element">
            <h3>What you'll need</h3>
            <ul id="listOfItems">
            </ul>
        </div>


        <div id="instructions" class="element">
            <h3>Instructions</h3>
            <ul id="listOfInstructions">
                <li>Mash the rest together in a large bowl.</li>
                <li>Optionally bake at 350 degrees.</li>
            </ul>
        </div>

        <!--<div id="comments" class="row">-->
            <!--<label></label>-->
            <!--<input class="form-control" placeholder="What did you think of this recipe?"/>-->
            <!--<button id="addComment" class="btn btn-primary">Add Comment</button>-->
        <!--</div>-->

        <div class="footer">
            <button id="generateRecipe" class="btn btn-default">
                Generate New Recipe
            </button>
            OR
            <button id="saveRecipe" class="btn btn-primary">
                Save This Recipe
            </button>
        </div>


        <!--<div id="ratingsAndGeneration">-->
            <!--<div class="rating">-->
                <!--<i id="likeIt" class="fa fa-heart"><p>Like it?</p></i>-->
                <!--<p id="likeText">You like this!</p>-->
            <!--</div>-->
            <!--<div class="rating">-->
                <!--<i id="hateIt" class="fa fa-heart"><p>Hate it?</p></i>-->
                <!--<p id="hateText">You hate this!</p>-->
            <!--</div>-->
            <!--<button id="iMadeThis" class="btn btn-default rating">Made it?</button>-->
            <!--<button id="generateMeal" class="btn btn-success rating">Generate New Meal</button>-->
        <!--</div>-->
    </div>
</body>
</html>
