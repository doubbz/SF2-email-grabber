EXAMPLE OF USE FOSRESTBUNDLE FOR EMAIL GRABBING ON UNSUBMITTED FORM
========================

This is a small project I made in order to make an example of application using
FOSRestBundle in order to create a server API. The objective is to grab the 
content of an input in a form before it is submitted (in order to grab an email
address for exemple). Using JQuery you can trigger an event before the form
is actually submitted

What's inside?
--------------

Inside this project, you will find:

  * A main Symfony SE with 1 bundle handling user registration

  * A couple of bundles such as FOSRest, FOSJSRouting and configuration for 
gedmo doctrine extensions

  * A default form for user registration overloaded for JQuery event trigger

  * A main service used to store the grabbed content of the form input


In order to test it manually
--------------

  * Install Sf2 and dependencies + create DB

  * go to url /signup

  * On form, enter at least one letter on input email. The content will be send
with POST method to server-side API which will instantiate the correct service

  * The service will store your email address. This service won't insert new
entry if the email address is already stored on DB


## Installation

This application uses Symfony 2.x and works with Composer. The main thing you 
should do when deploying this website is to install your composer dependencies.

    php composer.phar update

It also uses Doctrine 2 as the main ORM. It means you should create the schema
with the following command:

    php app/console doctrine:schema:update --force

Assetic is used to manage assets. After installing your assets from your bundle


## Changelog


_**v1.0.0**: 2015-10-08_

* First version of the application