# Xtrembaker MediaWiki

Official Mediawiki's docker image comes with a few drawback:
- even if they use composer (since v1.25), composer is not installed by default in the image
- It’s missing few library that are necessary for composer to work properly (zip, unzip)

So for those reasons (and others), I’ve come with creating my own image that extends both, mediawiki and composer

Moreover, I kind of tweak mediawiki a little bit, so make sure you RTFM in this README before launching the project

## How to find the current Mediawiki installed version

http://{domainName}/index.php/Spécial:Version

## PHP package requirement:
- php8.1-mbstring
- php8.1-xml
- php8.1-imagick
- php8.1-intl
- php8.1-curl

How to install those package:
`sudo apt install {packageName}`

## Custom files

Mediawiki by default comes with `vendor` in the package. As we know as web developer, this is not a good practice.
So I’ve added the ignorance of the `vendor` folder

When you update to new version, make sure you copy those files:
- .env
- .env.dist
- .gitignore

## Installed Extensions

### AWS S3 images upload

Extensions: https://www.mediawiki.org/wiki/Extension:AWS
Location: app/extensions/AWS

I’ve tweak a bit the installation, because:
- I don’t want to manage a `git submodules`
- With `git submodule` I’m losing the version control dependencies (always using master, don’t know if new version is available, can’t rollback to previous version ...)
- I would have to manage `composer install` in this submodule which I don’t want

So, to abstract all of those trouble, I first clone the extensions outside of this project and then:
- I remove the `.git` and `.github` folder in the extensions
- I remove the `.gitignore` so I can commit the vendor (I know...)
- I run `php composer.phar install`
- I move the folder AWS to this project

## Gemfile

Gemfile is not part of the Mediawiki and has been added only for deployment task (using Capistrano)

- When you modify the `Gemfile`, please run `bundle update` to update automatically the `Gemfile.lock`

# Start project

If you’d like to start the project locally, just as it is in production, run:

    docker compose up --build
    docker compose exec mediawiki composer install

Then it should be accessible on http://localhost

## Installing composer dependencies

I’ve added few PHP package that are not part of the mediawiki by default. Here is the list of those:
- `symfony/dotenv`

Once the docker is running, make sure to make a `composer install`

# Deployment

WARNING !! The PRODUCTION file has never been done, so to deploy in production, use the STAGING

WARNING !! While restarting apache2, sudo mode is required, so this part is not working and should be done manually (make sure to comment it in `config/deploy.rb` before deploying)

Steps:
- Make sure you’ve pushed the branch you want to deploy (default should be master)
- Make sure the branch is passing test on CI
- Change in the `config/deploy.rb` file the branch you’d like to deploy (if not master)

To deploy the application, use the following command

    cap staging deploy
    
Current Capistrano version, see [config/deploy.rb](config/deploy.rb)

## Docker-compose file

From some time, Mediawiki comes with a docker-image (https://hub.docker.com/_/mediawiki).
However, this image has not been built to make an upgrade from a version to another.
If you need to update the Mediawiki version, follow the "Updating Mediawiki" section before hurry

# Upgrading MediaWiki

WARNING !! The custom Docker image doesn’t yet handle the process of upgrading, so make sure to follow this section (which should be backport inside the Dockerfile, but it’s too much work)

Mediawiki's default docker image is not convenient to use for updating, it mainly exists for brand new project

To Update Mediawiki, it’s advised to download the new archive, and tweak the docker images to try it locally
Note: Despite this procedure trying to explain as much as possible what to do, you may run into error and failure trying to make running the website updated.
Main reasons can be:
- Deprecated library between old version and new version
- New tables / columns in new version which did not exists before
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
- Run `composer install` (install extra [composer dependencies](#installing-composer-dependencies))
- Reinstall / Update [installed extensions](#installed-extensions)
- Go to the `database` docker with `docker-compose exec database bash`
- Go to the folder `var/lib/mysql`, you should find your backup. Then, [import your backup](#db)
- Connect to mysql `mysql -uroot -p` 
- Then make sure there is some tables in `wikidb` database: `use wikidb; show tables;`
- Update database following the part "Exécuter le script de mise à jour" in this [page](https://www.mediawiki.org/wiki/Manual:Upgrading/fr)
- If everything looks ok, try to go to `http://locahost:8080`

- https://www.mediawiki.org/wiki/Compatibility/fr
- https://www.mediawiki.org/wiki/MediaWiki-Docker/Extension/Wikibase

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