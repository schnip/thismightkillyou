<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$rows = $db->query('select * from recipes where id = ' . $_GET['recipe_id'] . ';');
foreach ($rows as $row) {
    $recipe_id = $row['id'];
    $recipe_name = $row['name'];
}
$rows = $db->query("select * from directions where recipe_id=" . $recipe_id . ';');
$directions = array();
foreach ($rows as $row) {
    array_push($directions, $row['d_text']);
}
?>
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
</head>
<body>

    <?php include("nav.php"); ?>

    <div class="recipe container">
        <h1 id="recipeName" class="jumbotron"><?php echo $recipe_name; ?></h1>

        <div id="itemsNeeded" class="element">
            <h3>What you'll need</h3>
            <ul id="listOfItems">
            <?php
                $rows = $db->query("select * from ingredients where recipe_id=" . $recipe_id . ';');
                foreach ($rows as $row) {
                    echo '<li>';
                    echo $row['name'];
                    echo ' ';
                    echo $row['quantity'];
                    echo '</li>';
                    //array_push($ingredients, array('name' => $row['name'], 'quantity' => $row['quantity']));
                }
            ?>
            </ul>
        </div>


        <div id="instructions" class="element">
            <h3>Instructions</h3>
            <ul id="listOfInstructions">
                <?php
                    $rows = $db->query("select * from directions where recipe_id=" . $recipe_id . ';');
                    $directions = array();
                    foreach ($rows as $row) {
                        echo '<li>';
                        echo $row['d_text'];
                        echo '</li>';
                        //array_push($directions, $row['d_text']);
                    }
                ?>
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
            <a href="recipe.php">
            <button id="generateRecipe" class="btn btn-default">
                Generate New Recipe
            </button>
            </a>
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
