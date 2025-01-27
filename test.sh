#!/bin/sh 
set -e pipefail 
composer phpstan 
composer phpcs
composer test
