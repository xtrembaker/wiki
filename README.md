# Installation

## PHP package requirement:
- imagemagick
- php7.3-imagick

# Deployment

To deploy the application, use the following command

    cap staging deploy
    
Current Capistrano version, see [config/deploy.rb](config/deploy.rb)

# Gemfile

- Gemfile is not part of the Mediawiki and has been added only for deployment task (using Capistrano)

- When you modify the `Gemfile`, please run `bundle update` to update automatically the `Gemfile.lock`

# Customization that have been done

- Mediawiki by default comes with `vendor` to be committed. As we know as web developer, this is not a good behavior.
So I’ve added the ignorance of the `vendor` folder

- I’ve installed Symfomy DotEnv plugin to manage `.env` file

# Installed Extensions

## AWS S3 images upload

Extensions: https://www.mediawiki.org/wiki/Extension:AWS
Location: app/extensions/AWS

I’ve tweak a bit the installation, because:
- I don’t want to manage a `git submodules`
- With `git submodule` I’m losing the version control dependencies (always using master, don’t know if new version is available, can’t rollback to previous version ...)
- I would have to manager `composer install` in this submodule which I don’t want

So, to abstract all of those trouble, I first clone the extensions outside of this project and then:
- I removed the `.git` folder in the extensions
- I removed the `.gitignore` so I can commit the vendor (I know...)
- I’ve run `composer install`
- I moved the folder AWS to this project