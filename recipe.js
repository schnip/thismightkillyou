    /**
 * Created by wrightjt on 11/13/2015.
 */
$(function() {

    if(Cookies.get('RecipeUser') != undefined) {
        console.log("User logged in");

        $('#login').hide();
        $('#signup').hide();

        $('#signout').show();
    }

    else {
        $('#login').show();
        $('#signup').show();
        $('#signout').hide();
    }

    //$('#likeText').hide();
    //$('#hateText').hide();

    var numberOfItems = Math.floor(Math.random() * 4) + 4;
    var materials = [];
    var instructions = [];
    var quantity = [];
    var title = "";

    var instructionPointer = 0;
    var temp = 0;

    $.ajax({
        type: "GET",
        data: {num: numberOfItems},
        url: 'get_random_food.php',
        datatype: "text"
    }).done(getFoodItems).fail(function() {console.log("CANT GET FOOD") });

    function getFoodItems(data) {
        var parsedData = JSON.parse(data);

        var names = parsedData.names;
        var types = parsedData.types;



        _.each(names, function(name) {
            if(materials.indexOf(name) == -1) {

                materials.push(name);
            }
        });

        toGive = {multi: true};
        _.each(types, function(type, i) {
            var tempString = "type" + i;
            toGive[tempString] = type;
        });

        $.ajax({
            type: "GET",
            url: 'get_random_title.php'
        }).done(function(data) {
            title = materials[0] + " " + JSON.parse(data).title + " " + types[0];
            $('#recipeName').text(title);
        });


        $.ajax({
            type: "GET",
            data: toGive,
            url: 'get_random_quantity.php'
        }).done(reportQuantity);
    }

    function reportQuantity(data) {
        var parsedData = JSON.parse(data);

        var tempQuantity = parsedData.quantity;


        _.each(tempQuantity, function(recipe, i) {
           $('#listOfItems').prepend('<li>' + recipe + " " + materials[i] + '</li>');
            quantity.push(recipe);

            $.ajax({
                type: "GET",
                url: 'get_random_step.php'
            }).done(generateStep);
        });

        console.log("Quantities: ", quantity);
        console.log("Materials: ", materials);
    }

    function generateStep(data) {
        var finalData = JSON.parse(data);

        if(temp < materials.length - 1) {
            instructions[instructionPointer] = finalData.primary_action + " " + materials[temp++] + " ";
            if (finalData.secondary_action !== null && finalData.secondary_action !== undefined) {
                instructions[instructionPointer] += finalData.secondary_action + " " + materials[temp++] + " to create " + finalData.result + ".";
            } else {
                instructions[instructionPointer] += ".";
            }
            $('#listOfInstructions').prepend('<li>' + instructions[instructionPointer] + '</li>');
        } else {
        }

        instructionPointer++;

    }

    $('#generateRecipe').click(function() {
       window.location.href = window.location.href;
    });

    $('#saveRecipe').click(function() {

        toSend = {name: title,
        username: Cookies.get('RecipeUser')};
        _.each(quantity, function(quantity, i) {
           toSend["quantity" + i] = quantity;
        });

        _.each(materials, function(material, i) {
            toSend['ingredient' + i] = material;
        });

        _.each(instructions, function(instruction, i) {
           toSend["direction" + i] = instruction;
        });


        $.ajax({
            type: "GET",
            url: "add_recipe_user.php",
            data: toSend
        });

        // Pass in name, ingredient, quantity, direction

    });
});