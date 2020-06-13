define(['index.html'], function(indexView) {
    var initialize = function() {
        indexView.render();
    }
    return {
        initialize: initialize
    };
});
define([dependency1, dependency2], function(dependency1, dependency2) {
    //Internal program code 

    return {
        //Expose externally accessible functions
    }
});
define(['router'], function(router) {
    var initialize = function() {
        checkLogin(runApplication);
    };
    var checkLogin = function(callback) {
        $.ajax("authjs", {
            method: "GET",
            success: function() {
                return callback(true);
            },
            error: function(data) {
                return callback(false);
            }
        });
    };
    var runApplication = function(authenticated) {
        if (!authenticated) {
            window.location.hash = 'login';
        } else {
            window.location.hash = 'index';
        }
        Backbone.history.start();
    };
    return {
        initialize: initialize
    };
});