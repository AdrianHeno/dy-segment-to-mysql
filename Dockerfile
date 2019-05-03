FROM silintl/php7
MAINTAINER Adrian <adrian@driveyello.com>

ENV REFRESHED_AT 2015-05-11

# Copy an Apache vhost file into sites-enabled. This should map
# the document root to whatever is right for your app
COPY vhost-config.conf /etc/apache2/sites-enabled/

RUN mkdir -p /data
VOLUME ["/data"]
RUN mkdir -p /data/www/
RUN mkdir  -p /data/www/src/
RUN mkdir -p /data/www/vendor/
# Copy your application source into the image
COPY src/ /data/www/src
COPY vendor/ /data/www/vendor
COPY assets/ /data/www/assets
COPY index.php /data/www/
COPY .htaccess /data/www/

WORKDIR /data
EXPOSE 80
CMD ["apache2ctl", "-D", "FOREGROUND"]
