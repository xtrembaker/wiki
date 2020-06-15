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
