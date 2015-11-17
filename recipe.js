/**
 * Created by wrightjt on 11/13/2015.
 */
$(function() {

    $('#likeText').hide();
    $('#hateText').hide();

    var numberOfItems = Math.floor(Math.random() * 4) + 4;
    var materials = [];
    var instructions = [];

    var instructionPointer = 0;
    var temp = 0;

    $.ajax({
        type: "GET",
        data: {num: numberOfItems},
        url: 'get_random_food.php',
        datatype: "text"
    }).done(getFoodItems).fail(function() {console.log("CANT GET FOOD") });

    function getFoodItems(data) {
        console.log(data);
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
        }).done(function(data) {$('#recipeName').text(materials[0] + " " + JSON.parse(data).title + " " + types[0]);
        });


        $.ajax({
            type: "GET",
            data: toGive,
            url: 'get_random_quantity.php'
        }).done(reportQuantity);
    }

    function reportQuantity(data) {
        var parsedData = JSON.parse(data);

        var quantity = parsedData.quantity;

        console.log(quantity);

        _.each(quantity, function(recipe, i) {
           $('#listOfItems').prepend('<li>' + recipe + " " + materials[i] + '</li>');

            $.ajax({
                type: "GET",
                url: 'get_random_step.php'
            }).done(generateStep);
        });
    }

    function generateStep(data) {
        var finalData = JSON.parse(data);
        console.log(finalData);
        if(temp < materials.length) {
            instructions[instructionPointer] = finalData.primary_action + " " + materials[temp++] + " ";
            if (finalData.secondary_action !== null && finalData.secondary_action !== undefined) {
                instructions[instructionPointer] += finalData.secondary_action + " " + materials[temp++] + " to create " + finalData.result + ".";
            } else {
                instructions[instructionPointer] += ".";
            }
            $('#listOfInstructions').prepend('<li>' + instructions[instructionPointer] + '</li>');
        } else {
            console.log("filled");
        }

        instructionPointer++;

    }

    $('#generateRecipe').click(function() {
       window.location.href = window.location.href;
    });
});