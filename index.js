/**
 * Created by wrightjt on 11/16/2015.
 */
$(function() {
    $('#passwordSignUp').keyup(checkPassword);

    $('#reenterPassword').keyup(checkPassword);

    $('#completeSignUp').click(function() {
        var password = $('#passwordSignUp').val();
        var username = $('#usernameSignUp').val();

        console.log("Username: ", username, " Password: ", password);

        $.ajax({
            type: "GET",
            url: 'add_new_user.php',
            data: {username: username, password: password}

        }).done(function() {
            $('#signUpModal').modal('hide');
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