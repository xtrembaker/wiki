# Installation

## PHP package requirement:
- php8.1-mbstring
- php8.1-xml
- php8.1-imagick
- php8.1-intl
- php8.1-curl

How to install those package:
`sudo apt install {packageName}`

## How to find installed version

http://{domainName}/index.php/Spécial:Version

## Installing Composer

Composer is not installed by default in the Mediawiki container, despite Mediawiki's using composer since the version 1.25.

To install composer, you first need to know which composer version should be installed according to your Mediawiki version.
Please find more information about composer's version need to be installed [here](https://www.mediawiki.org/wiki/Composer)

Mediawiki <= 1.35.1 => composer v1
Mediawiki >= 1.35.2 => composer v2

To install the latest version using the official documentation: https://getcomposer.org/download/

To install composer v1 (or any specific version different than the latest one), first install the latest version, then do:
`composer.phar self-update {version}`

## Installing required library

Zip and unzip package are missing in the container. Run : 
`apt-get update && apt-get install unzip zip` 
to fix it (mandatory to download some composer dependencies)

## Installing composer dependencies

I’ve tweak a little bit the project, so I’m using some dependencies that are not part of the original mediawiki.
Run those command once the docker started:
- `php composer.phar require symfony/dotenv`

# Deployment

WARNING !! The production file has never been done, so the PRODUCTION IS the STAGING
WARNING !! While restarting apache2, sudo mode is required, so this part is not working and should be done manually (make sure to comment it in `config/deploy.rb` before deploying)

Steps:
- Make sure you’ve pushed the branch
- Make sure the branch is passing test on CI
- Change in the `config/deploy.rb` file the branch you’d like to deploy

To deploy the application, use the following command

    cap staging deploy
    
Current Capistrano version, see [config/deploy.rb](config/deploy.rb)

## Gemfile

- Gemfile is not part of the Mediawiki and has been added only for deployment task (using Capistrano)

- When you modify the `Gemfile`, please run `bundle update` to update automatically the `Gemfile.lock`

## Custom files

- Mediawiki by default comes with `vendor` to be committed. As we know as web developer, this is not a good practice.
So I’ve added the ignorance of the `vendor` folder

When you update to new version, make sure you copy those files:
- .env
- .env.dist
- .gitignore

## Docker-compose file

From some time, Mediawiki comes with a docker-image (https://hub.docker.com/_/mediawiki). This is convenient to check the website is correctly working locally, before deploying it.
However, if you need to update the Mediawiki version, follow the "Updating Mediawiki" section before hurry to update the mediawiki docker image version

# Updating MediaWiki

Mediawiki has a docker image, but it’s not convenient to use for updating, it mainly exists for brand new project

To Update Mediawiki, it’s advised to download the new archive, and tweak the docker images to try it locally
Note: Despite this procedure trying to explain as much as possible what to do, you may run into error or failure trying to make running the website updated.
Main reasons can be:
- Deprecated library
- New tables / columns in recent Mediawiki which did not exists before
- ...

Steps to follow:
- Download the latest mediawiki archive and unzip it into `app-{version}` folder 
- Backup the production DB and import it locally see [DB section](#db)
- Then, rename the `docker/local/db` folder to `docker/local/old-db`
- Put the freshly downloaded backup into `docker/local/db`. Just put the .sql.gz file, Mediawiki will automatically unzip it when starting docker.
- Follow the section "Utiliser les paquets d’archives" sur cette [page](https://www.mediawiki.org/wiki/Manual:Upgrading/fr), et lisez bien les différents points qui peuvent suivre cette partie
- Don’t forget to copy [custom files](#custom-files) 
- In the docker-compose.yml file, modify the volume named `app` to `app-{version}`, and upgrade the `image: mediawiki:{version}`
- Start docker using `docker compose up` (without the detach mode it’s easier to see if any error occurred)
- Go inside the docker running `docker compose exec mediawiki bash`
- Install [required library](#installing-required-library) inside the docker
- Install composer according to the version mandatory by Mediawiki [Installing composer](#installing-composer)
- Don’t forget to reinstall extra [Composer dependencies](#installing-composer-dependencies)
- Reinstall / Update [installed extensions](#installed-extensions)
- Go to the `database` docker with `docker-compose exec database bash`
- Go to the folder `var/lib/mysql`, you should find your backup. Then, [import your backup](#db)
- Connect to mysql `mysql -uroot -p` 
- Then make sure there is some tables in `wikidb` database: `use wikidb; show tables;`
- Update database following the part "Exécuter le script de mise à jour" in this [page](https://www.mediawiki.org/wiki/Manual:Upgrading/fr)
- If everything looks ok, try to go to `http://locahost:8080`

- https://www.mediawiki.org/wiki/Compatibility/fr
- https://www.mediawiki.org/wiki/MediaWiki-Docker/Extension/Wikibase

# Installed Extensions

## AWS S3 images upload

Extensions: https://www.mediawiki.org/wiki/Extension:AWS
Location: app/extensions/AWS

I’ve tweak a bit the installation, because:
- I don’t want to manage a `git submodules`
- With `git submodule` I’m losing the version control dependencies (always using master, don’t know if new version is available, can’t rollback to previous version ...)
- I would have to manage `composer install` in this submodule which I don’t want

So, to abstract all of those trouble, I first clone the extensions outside of this project and then:
- I removed the `.git` and `.github` folder in the extensions
- I removed the `.gitignore` so I can commit the vendor (I know...)
- I’ve run `php composer.phar install`
- I moved the folder AWS to this project

# Backup

## DB

To back up DB run the following command on the server:

```
    mysqldump -uroot -p wikidb | gzip > backup_wikidb_$(date +%Y-%m-%d).sql.gz
```

To import back up, run the following command inside the `database` container:

```
    USING ZIPPED BACKUP FILE
    gunzip < backup_wikidb_$(date +%Y-%m-%d).sql.gz | mysql -uroot -p wikidb
    
    USING BACKUP FILE
    mysql -uroot -p wikidb < $(backup_name).sql 
```

Copy backup (from server to S3)

```
export AWS_PROFILE=wiki
aws s3 cp $file s3://wiki-xtrembaker-db-backup/$file
```

Import db backup (from local from S3)
First, fetch the S3 URI of the backup (either from the AWS console or from the URL which was given previously when you export the backup from server to s3)
```
export AWS_PROFILE=wiki
aws s3 cp {S3_URI} docker/local/db
```