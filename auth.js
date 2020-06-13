app.get('Account.js', function(req, res) {
    if (req.session.loggedIn) {
        res.send(200);
    } else {
        res.render(401);
    }
})