/**
 * Created by wrightjt on 11/13/2015.
 */
$(function() {
    var fruitVegs = ["lettuce", "tomato", "pear", "apple", "mango", "orange"];
    var meats = ["pulled pork", "steak", "chicken", "lamb"];

    $.ajax({
        type: "GET",
        url: 'get_random_quantity.php',
        datatype: "text"
    }).done(reportFood);

    function reportFood(data) {
        console.log(data);
    }

});