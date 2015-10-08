# Rocket Gif

The main Rocket Gif application

### Assets

Download packages

    $ npm install

Compile assets

    # Compilation (watch & minification)
    $ gulp

    # Prod compilation (minification)
    $ gulp build

    # Dev compilation (watch & no-minification)
    $ gulp --dev

### Docker Installation

#### Varnish

Replace `$app_container_name` by the name of the main running application
container.

    docker pull jacksoncage/varnish
    docker run -d -v `pwd`/docker/varnish.vcl:/etc/varnish/default.vcl:ro -p 80 --link $app_container_name:app jacksoncage/varnish
