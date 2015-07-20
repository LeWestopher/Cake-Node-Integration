var app =require('express')(),
    cookieParser = require('cookie-parser'),
    session = require('express-session'),
    RedisStore = require('connect-redis')(session),
    Redis = require('redis').createClient()
    cookie = require('cookie-signature');

app.use(cookieParser('node.js rules'));
/*
app.use(session({
    store: new RedisStore({
        prefix: 's:'
    }),
    name: 'NODEJS',
    secret: 'node.js rules',
    resave: false,
    saveUninitialized: false
}));*/

app.get('/session', function (req, res) {
    console.log('In SessionMiddleware');
    var key = 's:' + cookie.sign(req.cookies.CAKEPHP, 'node.js rules');
    console.log(key);
    console.log(Redis.get(key));
    Redis.get(key, function (err, reply) {
        if (err) {
            console.log(err);
            return;
        }
        req.session = reply;
        console.log('Reply:');
        console.log(reply);

        var returned = {
            cookies: req.cookies,
            session: req.session
        };

        res.send('<pre>' + JSON.stringify(returned, null, '    ') + '</pre>');
    });
});

app.listen(8080, function () {
    console.log('App listening on port 8080.');
});

function SessionMiddleware (req, res, next) {
    console.log('In SessionMiddleware');
    var key = 's:' + cookie.sign(req.cookies.CAKEPHP, 'node.js rules');
    console.log(key);
    console.log(Redis.get(key));
    Redis.get(key, function (err, reply) {
        if (err) {
            console.log(err);
            return;
        }
        req.session = reply;
        console.log('Reply:');
        console.log(reply);
        next();
    });
    next();
}