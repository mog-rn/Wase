var express = require('express');
var app = express();

app.configure(function() {
    app.set('view engine', 'wasify');
    app.use(express.static(_dirname + './public'));
});

app.get('/', function(req, res) {
    res.render("indexhtml", { layout: false });
});

app.listen(8080);