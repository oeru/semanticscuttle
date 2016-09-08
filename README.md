# semanticscuttle
Our own fork of Semantic Scuttle, so we can address PHP 5.4+ compatibility issues.

This project, like the original Semantic Scuttle, is licensed under the GPL v2 - see sscuttle/doc/LICENSE.txt

Hosting stack: we're running this on an Ubuntu 14.04 server, using Nginx as the webserver (with Let's Encrypt SSL certs) and PHP5-fpm for PHP. I've included examples of the relevant configuration files in the nginx and php5 directories. 

The nginx php-handler we use below assumes that you have a specific configuration for PHP5's fpm variant, so we've included the php-handler.conf file you need. Move it to the right place:

`sudo mv php5/php-handler.php /etc/php5/fpm/pool.d`

and restart php5-fpm:

`sudo service php5-fpm restart`

You will need to move some files around after editing them to replace [yourdomain] and [path_to_SemanticScuttle_source_and_internal_www_dir]:

`sudo mv nginx/semanticscuttle.sample.conf /etc/nginx/sites-available/sscuttle`

(or pick some other file name for "sscuttle")

`sudo mv nginx/php-handler.conf /etc/nginx/conf.d # or /etc/nginx/upstream.d`

If you want to use SSL (why wouldn't you!) you'll need to install Let's Encrypt from https://letsencrypt.org and create a cert (using the "certonly" option) for [yourdomain]. For this to work with the nginx config, you'll need to make sure that /var/www/html exists (it does by default).

You'll have to link /etc/nginx/sites-available/sscuttle into sites-enabled (replace sscuttle with the name of your nginx configuration file):

`sudo ln -sf /etc/nginx/sites-available/sscuttle /etc/nginx/sites-enabled`

and then check that it's well formed:

`nginx -t`

if so, you can put it into effect:

`sudo service nginx reload`
