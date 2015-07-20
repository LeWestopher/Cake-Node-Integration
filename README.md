# CakePHP && Node.js Integration

1. Clone this repository into your apache2 document root.
2. Download and install Redis.
3. Make sure the php-redis extension is downloaded and set up.
4. Make sure that php-intl is running on your web server.
5. Turn on your Redis server under the same user as your apache2 instance 'sudo -u ${apache-user-here} redis-server'
6. Navigate to http://localhost to make sure everything works.
7. Check out the Node server I'm working with in doc_root/bin/NodeServer.js.
8. Get the node server to recognize the NODEJS cookie.
