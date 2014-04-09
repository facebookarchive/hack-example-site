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

This site is intended to be easy to deploy.

#### Clone the GitHub
You can clone it wherever you like, but for this example I'm putting it in ~/hack-example-site

    cd ~
    git clone git@github.com:pvh/hack-example-site.git
    
#### Create an application

    heroku create

#### Deploy the application

    git push heroku master

#### Load a page in your browser!

    heroku open

