# Hack Lang Example Site

## Why does this site exist?

The purpose of this site is to provide examples of how to use the Hack Language. This site should help in the following ways:

1. This site is written in Hack and is open source. You can browse the source code for real world examples
2. You can clone and deploy this site yourself. This site is designed to be simple to make this as easy as possible.
3. The contents of this site consist of a Cookbook of Hack Recipes. Each Recipe is a short Hack example that solves some common, interesting typing problem.

If you haven't already, I recommend checking out the [official documentation](http://hhvm.com/manual/en/index.php).

## Is this site hosted anywhere? ##

Yes, at [cookbook.hacklang.org](http://cookbook.hacklang.org)

## Deploying the site

This site is intended to be easy to deploy. Install and configure HHVM and your webserver of choice, clone the GitHub and you should be done!

### Installing HHVM & Webserver

You can either install one of the many HHVM packages or build it from source yourself. I recommend following [this blog post](http://www.hhvm.com/blog/1817/fastercgi-with-hhvm) to set up hhvm with FastCGI. If you're adventurous, the [nightly builds](http://www.hhvm.com/blog/3203/nightly-packages) are pretty cool too.

### Cloning the hack-example-site GitHub

If you're reading this README you probably already found the source code, but the source code lives [here](https://github.com/facebook/hack-example-site).

### Example setup for HHVM + Nginx on Ubuntu 13.10

Nginx is a popular webserver and what I used when building this site. Here are instructions for how I set up my environment.

#### Clone the GitHub
You can clone it wherever you like, but for this example I'm putting it in ~/hack-example-site

    cd ~
    git clone git@github.com:hhvm/hack-example-site.git
    
#### Install Nginx

    sudo apt-get install nginx

#### Install HHVM with FastCGI

    echo deb http://dl.hhvm.com/ubuntu saucy main | sudo tee /etc/apt/sources.list.d/hhvm.list 
    sudo apt-get update
    sudo apt-get install hhvm-fastcgi

#### Copy the HHVM config file
There is a simple HHVM config in this repo, which you can use. I just overwrite the server.hdf file, since that's the config that init.d uses. You can always edit the service or start hhvm yourself if you'd rather not overwrite server.hdf

    // Assuming you cloned hack-example-site to ~/hack-example-site
    // If you don't want to overwrite server.hdf you can always point hhvm 
    // to a config elsewhere
    sudo cp ~/hack-example-site/hhvm.hdf /etc/hhvm/server.hdf

#### Set up the Nginx config

    // Assuming you cloned hack-example-site to ~/hack-example-site
    sudo cp ~/hack-example-site/nginx.conf /etc/nginx/sites-available/hack-example-site
    sudo ln -s /etc/nginx/sites-available/hack-example-site /etc/nginx/sites-enabled/hack-example-site
    // Disable the default config. Or don't. It's up to you.
    sudo rm /etc/nginx/sites-enabled/default
    // Update the root and fastcgi_param directives to point to ~/hack-example-site
    sudo vim /etc/nginx/sites-available/hack-example-site
    // Verify that the config parses
    sudo nginx -t

#### Start everything up
    sudo service hhvm-fastcgi start
    sudo service nginx start

#### Load a page in your browser!

Try going to `localhost` in your browser of choice

### Example setup for Heroku

#### Get a Heroku account and install the toolbelt

If you don't already have a Heroku account, start here: https://id.heroku.com/signup

#### Clone the repo and check out the `heroku` branch

    git clone git@github.com:pvh/hack-example-site.git
    cd hack-example-site
    git checkout -b heroku origin/heroku

#### Create a heroku app and push the code

    heroku create --buildpack https://github.com/dzuelke/heroku-buildpack-php#hhvm
    git push heroku heroku:master
    heroku open

