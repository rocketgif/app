# A nginx webserver for the Rocket Gif app
FROM debian:jessie

MAINTAINER Emeric Kasbarian, emerick42@gmail.com

# Make sure the package repository is up to date
RUN apt-get update

# Install project dependencies
RUN apt-get install -y curl git

# Install php and nginx
RUN apt-get install -y php5-cli php5-fpm php5-curl php5-mysql
RUN apt-get install -y nginx
RUN rm -v /etc/nginx/sites-enabled/default
ADD docker/nginx.conf /etc/nginx/sites-enabled/
RUN echo "daemon off;" >> /etc/nginx/nginx.conf

# Install npm and gulp
RUN curl -sL https://deb.nodesource.com/setup_0.12 | bash -
RUN apt-get install -y nodejs
RUN npm install -g gulp

# Install the project
RUN mkdir -p /var/www/project
ADD . /var/www/project
WORKDIR /var/www/project

# Set permissions for cache and logs (should be done in a better way)
RUN rm -rf app/cache/* app/logs/*
RUN chown -R www-data app/cache
RUN chown -R www-data app/logs

# Setup the symfony project
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --optimize-autoloader
RUN php app/console cache:clear --env=prod --no-debug

RUN npm install
# KEK npm best thing ever!!! https://www.youtube.com/watch?v=6hcSpSC8T0M
RUN npm rebuild node-sass
RUN gulp build

# Add the start script
ADD docker/start.sh /
RUN chmod 755 /start.sh

EXPOSE 80

CMD /start.sh
