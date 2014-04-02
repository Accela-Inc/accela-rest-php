# PHP Class Library for the Accela API (v3)

## Installation

Make sure you have [Composer](https://getcomposer.org/) installed. After cloning the repo, run the following to install dependencies:

    php composer.phar install

## Using the test file

1. Create a new app in the [Accela Developer Portal](https://developer.accela.com/).
2. Provision a new authorization token (see below). 
3. Enter app credentials and auth token in appropriate fields of test file.

Then run,

    php test.php

## Provisioning an API test token:

1. Go to the API v3 [reference page](https://developer.accela.com/Resource/Index).
2. On the lower left, click on [Get an API Test Token](https://developer.accela.com/TestToken/Index).
3. Enter the agency name (Islandton for testing).
4. Enter the scope for the test token - this is a space delimited list of scope identifiers from the [API reference page](https://developer.accela.com/Resource/ApisAbout).