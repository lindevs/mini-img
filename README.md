# MiniImg

**MiniImg** is a web-based application for compressing and optimizing PNG, JPEG, WebP, GIF, and SVG images using
various command line tools.

![MiniImg](mini-img.gif)

# Prepare environment

MiniImg requires the following packages:

* PHP 8
* Apache 2.4
* Composer
* Node.js and npm

For images compression and optimization you need to have the following tools:

* optipng
* pngquant
* jpegoptim
* cwebp
* gifsicle
* svgo

On Ubuntu, optimizers can be installed using the following commands:

```shell
sudo apt update
sudo apt install -y optipng
sudo apt install -y pngquant
sudo apt install -y jpegoptim
sudo apt install -y webp
sudo apt install -y gifsicle
sudo npm install -g svgo
```

On Windows, prebuilt binaries can be downloaded using the following links:

* [OptiPNG](https://sourceforge.net/projects/optipng/files/OptiPNG/optipng-0.7.7/optipng-0.7.7-win32.zip/download)
* [pngquant](https://pngquant.org/pngquant-windows.zip)
* [jpegoptim](https://raw.githubusercontent.com/imagemin/jpegoptim-bin/master/vendor/win32/jpegoptim.exe)
* [webp](https://storage.googleapis.com/downloads.webmproject.org/releases/webp/libwebp-1.2.1-windows-x64.zip)
* [gifsicle](https://eternallybored.org/misc/gifsicle/releases/gifsicle-1.92-win64.zip)
* svgo can be installed with command: `npm install -g svgo`

Make sure your binaries are added to PATH environment variable that allows to locate executables from the
command line.

# Install

* Download MiniImg:
  * `curl -o mini-img.tar.gz https://github.com/lindevs/mini-img/archive/master.tar.gz`

* Extract files to your www directory:
  * Linux: `sudo tar xf mini-img.tar.gz --strip-components=1 -C /var/www/html`
  * Windows: `sudo tar xf mini-img.tar.gz --strip-components=1 -C C:\wamp64\www`

* Go to MiniImg root directory:
  * Linux: `cd /var/www/html` 
  * Windows: `cd C:\wamp64\www`

* Install composer packages:
  * `composer install --optimize-autoloader --no-dev`  

* Open `.env` file and modify the following options:

```ini
APP_ENV=prod
APP_DEBUG=false
```

* Cache the bootstrap files:
  * `php artisan optimize`

* Install npm packages:
  * `npm install`

* Compile assets:
  * `npm run prod`

* Open browser and navigate to [http://localhost]()

# Development

* Go to your www directory:
  * Linux: `cd /var/www/html`
  * Windows: `cd C:\wamp64\www`

* Clone MiniImg repository:
  * `clone https://github.com/lindevs/mini-img.git`

* Install composer packages:
  * `composer install`

* Install npm packages:
  * `npm install`

* Compile assets:
  * `npm run dev`

* Run command if you want automatically recompile your assets when it detects files changes:
  * `npm run watch`

# License

The code in this repository is licensed under the [Apache License 2.0](LICENSE).
