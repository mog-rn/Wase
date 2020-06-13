define(['login.html'], function(login) {
    var loginView = Backbone.View.extend({
        el: $('#content'),
        events: {
            "submit form": "login"
        },
        login: function() {
            $.post('/login', {
                email: $('input[name=email]').val(),
                password: $('input[name=password]').val()
            }, function(data) {
                console.log(data);
            }).error(function() {
                $("#error").text('Unable to login.');
                $("#error").slideDown();
            });
            return false;
        },
        render: function() {
            this.$el.html(login);
            $("#error").hide();
        }
    });
    return loginView;
});