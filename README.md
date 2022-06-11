# Installation

## PHP package requirement:
- imagemagick
- php7.3-imagick

## How to find installed version

http://{domainName}/index.php/Spécial:Version

# Deployment

To deploy the application, use the following command

    cap staging deploy
    
Current Capistrano version, see [config/deploy.rb](config/deploy.rb)

# Gemfile

- Gemfile is not part of the Mediawiki and has been added only for deployment task (using Capistrano)

- When you modify the `Gemfile`, please run `bundle update` to update automatically the `Gemfile.lock`

# Customization that have been done

- Mediawiki by default comes with `vendor` to be committed. As we know as web developer, this is not a good practice.
So I’ve added the ignorance of the `vendor` folder

- I’ve installed Symfomy DotEnv plugin to manage `.env` file

# Docker-compose file

From some time, Mediawiki comes with a docker-image (https://hub.docker.com/_/mediawiki). This is convenient to check the website is correctly working locally, before deploying it.
However, if you need to update the Mediawiki version, follow the "Updating Mediawiki" section before hurry to update the mediawiki docker image version

# Updating MediaWiki

@TODO this procedure isn’t complete

Note: 
- Composer is not installed by default in the Mediawiki container. The best is to download it by following the official documentation : https://getcomposer.org/download/. Warning, as of today, we’re still running the v1 composer
- zip and unzip package are missing in the container. Run : `apt-get update && apt-get install unzip zip` to fix it (mandatory to download some composer dependencies)

To Update Mediawiki, it’s advised to download the new archive, and unzip it in another folder (like `app-{version}`). Then, move only system files.
Everything is explained in this page: `https://www.mediawiki.org/wiki/Manual:Upgrading/fr` (section "Utiliser le paquet d’archive")

- First, we need to start locally with an up to date database from production. So start by backing up the production database and retrieve it locally (see other section in this README to do that)
- Then, rename the `docker/local/db` folder to `docker/local/old-db`
- Make sure to put the freshly downloaded backup into `docker/local/db` (which should be empty at this time)
- Then, run `docker-compose up` (without the detach mode it’s easier to see if any error occurred)
- Go to the `database` docker with `docker-compose exec database bash`
- Connect to mysql `mysql -uroot -p`
- Then make sure there is some tables in `wikidb` database: `use wikidb; show tables;`

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
- I removed the `.git` folder in the extensions
- I removed the `.gitignore` so I can commit the vendor (I know...)
- I’ve run `composer install`
- I moved the folder AWS to this project

# Backup

## DB

To backup DB run the following command on the server:

```
    mysqldump -uroot -p wikidb | gzip > backup_wikidb_$(date +%Y-%m-%d).sql.gz
```

To import backup, run the following command inside the `database` container:

```
    USING ZIPPED BACKUP FILE
    gunzip < backup_wikidb_$(date +%Y-%m-%d).sql.gz | mysql -uroot -p wikidb
    
    USING BACKUP FILE
    mysql -uroot -p wikidb < $(backup_name).sql 
```

Copy backup to S3

```
export AWS_PROFILE=wiki
aws s3 cp $file s3://wiki-xtrembaker-db-backup/$file
```