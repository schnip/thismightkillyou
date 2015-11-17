/**
 * Created by wrightjt on 11/16/2015.
 */
$(function() {
    $('#passwordSignUp').keyup(checkPassword);

    $('#reenterPassword').keyup(checkPassword);

    $('#completeSignUp').click(function() {
        $('#signUpModal').modal('hide');
    });
});

var checkPassword = function() {
    console.log("CHECKED");
    var original = $('#passwordSignUp').val();
    var check = $('#reenterPassword').val();

    if(original == check && original.length > 0 && check.length > 0) {
        $('#completeSignUp').prop('disabled', false);
    } else {
        $('#completeSignUp').prop('disabled', true);
    }
};