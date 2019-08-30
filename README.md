# Model View Controller principle for PHP

This MVC is a Model View Controller principle for PHP 7.
Thus PHP becomes an object-oriented programming language.

## Getting Started

Download the latest version of our project under releases and extract the ZIP file into your project folder.

Have a look around first.
The following files/folders are important:
- config.inc.php
- index.php
* controller/
* model/
* templates/
* views/

Under views/ you can find the current default template loader.
It replaces the following string in an HTML document: "[[KEY]]".

Templates can be found in the templates/ folder.
For example, if you don't want to use HTML as output, you can create your own view or edit the existing one instead.

Under controller/ is the main part.
There all models are addressed and actions are executed.
As a little thought support, there should already be a sample controller under controller/.

The model/ folder is used to execute certain actions, e.g. a MySQL query. It does not "think" itself.

The index file actually does the least.
It should be edited as once as possible and then everything should only be done with controllers and models.

The config.inc.php is used for the central storage of e.g. user data like MySQL data. Let your imagination run wild ^^.


### Prerequisites

Please use at least a PHP version of 7.0.
Only PHP7 should be installed.

### Installing

To download the project, go to the [releases](https://github.com/Tobstr02/modelviewcontroller-php/releases). and download the latest ZIP file.

Now unzipping all files into your project directory.
And that's it!
Have fun with tinkering.

**Yeah**, it's right that a direct error is displayed.
It's because the connection to the MySQL server was faulty.

## Versioning

We use normal version names like v1.0.
Just download the newest ZIP.
To find out if the version you want to download is still supported, you can view [Security.md](https://github.com/Tobstr02/modelviewcontroller-php/blob/master/SECURITY.md) here.

The following PHP versions have been tested and run without problems under the version:
- 7.0
- 7.1
- 7.2
- 7.3

## Documentation
To view some documentation about this PHP-MVC, visit the [Wiki](https://https://github.com/Tobstr02/modelviewcontroller-php/wiki) page of this repository.


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

