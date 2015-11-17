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

    //function reportFood(data) {
    //    var parsedData = JSON.parse(data);
    //
    //    string  = parsedData.name;
    //
    //    if(materials.indexOf(string) == -1) {
    //        console.log("UH OH");
    //        materials.push(string);
    //
    //        $.ajax({
    //            type: "GET",
    //            data: {'type': parsedData.type},
    //            url: 'get_random_quantity.php',
    //            datatype: "text"
    //        }).done(reportQuantity).fail(function() {console.log("Failed"); });
    //    } else {
    //        console.log("Duplicate. Erasing.");
    //    }
    //}

    function getFoodItems(data) {
        console.log(data);
        var parsedData = JSON.parse(data);

        names = parsedData.names;
        types = parsedData.types;



        _.each(names, function(name) {
            if(materials.indexOf(name) == -1) {

                console.log(name);

                materials.push(name);
            }
        });

        _.map(types, function(type, i) {
            var string = "type" + i;
            return {string: type};
        });

        $.ajax({
            type: "GET",
            data: {},
            url: 'get_random_quantity.php'
        })
    }

    function reportQuantity(data) {
        console.log(data);
        var newData = JSON.parse(data);

        ingredients[ingredientPointer] = "A " + newData.type + " of " + materials[ingredientPointer];
        $('#listOfItems').append('<li>' + ingredients[ingredientPointer] + '</li>');
        ingredientPointer++;

        if(ingredientPointer > 0 && ingredientPointer % 2 == 0) {
            $.ajax({
                type: "GET",
                url: 'get_random_step.php',
                datatype: "text"
            }).done(generateStep).fail(function () {
                console.log("Failed to generate step");
            });
        }
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