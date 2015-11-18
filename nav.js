/**
 * Created by wrightjt on 11/17/2015.
 */
$(function() {
   if(Cookies.get('RecipeUser') != undefined) {
       console.log("User logged in");

       $('#login').hide();
       $('#signup').hide();

       $('#signout').show();
   }

    $('#signout').click(function() {
        console.log('clicked signout');
       Cookies.remove('RecipeUser');

        $('#login').show();
        $('#signup').show();

        $('#signout').hide();
    });


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

        $('#signout').show();

        $('#login').hide();
        $('#signup').hide();

        Cookies.set('RecipeUser', username);
        Cookies.set('RecipePassword', password);
    }