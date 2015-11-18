/**
 * Created by wrightjt on 11/16/2015.
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

    $.ajax({
        type: "GET",
        url: 'get_favorites.php',
        data: {username: Cookies.get('RecipeUser')}
    }).done(getFavorites);


    $('#passwordSignUp').keyup(checkPassword);

    $('#reenterPassword').keyup(checkPassword);

    $('#completeSignUp').click(function() {
        var password = $('#passwordSignUp').val();
        var username = $('#usernameSignUp').val();

        $.ajax({
            type: "GET",
            url: 'add_new_user.php',
            data: {username: username, password: password}

        }).done(function() {
            successfulLogin(username, password);
        });
    });
});

var checkPassword = function() {
    var original = $('#passwordSignUp').val();
    var check = $('#reenterPassword').val();

    if(original == check && original.length > 0 && check.length > 0) {
        $('#completeSignUp').prop('disabled', false);
    } else {
        $('#completeSignUp').prop('disabled', true);
    }
};

function successfulLogin(username, password) {

    $('#signUpModal').modal('hide');

    Cookies.set('RecipeUser', username);
    Cookies.set('RecipePassword', password);

    $('#login').hide();
    $('#signup').hide();

    $('logout').show();
}

function getFavorites(data) {
    var parsedData = JSON.parse(data);
    listOfRecipeIds = parsedData.upvoted;

    _.each(listOfRecipeIds, function(id) {
        $.ajax({
            type: "GET",
            data: {recipe_id: id},
            url: 'get_recipe_by_id.php'
        }).done(displayFavorites);
    });

}

function displayFavorites(data) {
    console.log(data);
    var parsedData = JSON.parse(data);

    stringToPrint = "<a href=\"oldRecipe.php\">" +
        "<div class=\"recipe\">" +
        "<div class=\"recipe-text\">" +
        "<h2>" + parsedData.name + "</h2>" +
        "<h4>Ever wonder what happens when you blend a chicken?</h4>" +
        "</div>" +
        "<div class=\"recipe-details\">" +
        "</div> " +
        "</div>" +
        "</a>";



    $('.displayed-recipes').append(stringToPrint);
}