/**
 * Created by wrightjt on 11/13/2015.
 */
$(function() {

    $('#likeText').hide();
    $('#hateText').hide();

    var numberOfItems = Math.floor(Math.random() * 4) + 4;
    var materials = [];
    var ingredients = [];
    var instructions = [];
    var recipe;
    var string;

    var ingredientPointer = 0;
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

        toGive = {};
        _.each(types, function(type, i) {
            var tempString = "type" + i;
            toGive[tempString] = type;
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
    }

    function generateStep(data) {
        var finalData = JSON.parse(data);
        console.log(finalData);
        instructions[instructionPointer] = finalData.primary_action + " " +  materials[temp++] + " ";
        if(finalData.secondary_action !== null) {
           instructions[instructionPointer] +=  finalData.secondary_action + " " + materials[temp++] + " to create " + finalData.result + ".";
        } else {
            instructions[instructionPointer] += ".";
        }

        $('#listOfInstructions').prepend('<li>' + instructions[instructionPointer] + '</li>');
        instructionPointer++;

    }

    $('#likeIt').click(function() {
        $('#hateIt').show();
        $('#likeIt').hide();
        $('#likeText').show();
        $('#hateText').hide();
    });

    $('#hateIt').click(function() {
        $('#hateIt').hide();
        $('#likeIt').show();
        $('#likeText').hide();
        $('#hateText').show();
    });
});