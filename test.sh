#!/bin/sh 
set -eo pipefail 
composer phpstan 
composer phpcs
composer test
