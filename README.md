# Cirici Code Sniffer [![Build Status](https://travis-ci.org/cakephp/cakephp-codesniffer.png?branch=master)](http://travis-ci.org/cakephp/cakephp-codesniffer)

This code works with [phpcs](http://pear.php.net/manual/en/package.php.php-codesniffer.php)
and checks code against the coding standards used in Cirici Thinking Digital PHP projects.

## Installation

You should install this codesniffer with composer:

	composer require ciricihq/cirici-codesniffer
	vendor/bin/phpcs --config-set installed_paths /path/to/your/app/vendor/ciricihq/cirici-codesniffer

The second command lets `phpcs` know where to find your new sniffs. Ensure that
you do not overwrite any existing `installed_paths` value.

## Usage

Depending on how you installed the code sniffer changes how you run it. If you have
installed phpcs, and this package with PEAR, you can do the following:

	vendor/bin/phpcs --standard=Cirici /path/to/code

:warning: Warning when these sniffs are installed with composer, ensure that
you have configured the CodeSniffer `installed_paths` setting.

## License

    The MIT License (MIT)

    CakePHP(tm) : The Rapid Development PHP Framework (http://cakephp.org)
    Copyright (c) 2005-2013, Cake Software Foundation, Inc.
    Cirici Thinking Digital (http://cirici.com)
    Copyright (c) 2015, Cirici Thinking Digital

    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:

    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.

    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
    THE SOFTWARE.
