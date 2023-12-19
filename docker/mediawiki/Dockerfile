FROM composer:2.5.4 as composer

# Dev Stage
## this stage create the image to launch the current project locally
FROM mediawiki:1.39 as dev
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt-get update && apt-get install unzip zip wget






# Upgrade Stage (TODO)
## This stage should be able to create the image with a new mediawiki version and start it locally
## Steps to do
## - Download new mediawiki version
## - Copy mandatory files from dev stage to new mediawiki version

#WORKDIR /tmp
#RUN wget https://releases.wikimedia.org/mediawiki/1.39/mediawiki-1.39.2.tar.gz -O - | tar -xz
#COPY app/.env /tmp/custom-files/.env

# Prod Stage (TODO)
## We don’t use docker yet in production, but this stage should prepare the image for