# config valid only for Capistrano 3.14.1
lock '3.14.1'

set :application, 'wiki'
set :repo_url, 'https://github.com/xtrembaker/wiki.git'

# Default branch is :master
set :branch, 'master'
# ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }.call

# Default deploy_to directory is /var/www/my_app
set :deploy_to, '/home/www/wiki'

# Default value for :scm is :git
# set :scm, :git

# Default value for :format is :pretty
# set :format, :pretty

# Default value for :log_level is :debug
# set :log_level, :debug

# Default value for :pty is false
# set :pty, true

# Default value for :linked_files is []
# set :linked_files, %w{config/database.yml}

# Default value for linked_dirs is []
# set :linked_dirs, %w{bin log tmp/pids tmp/cache tmp/sockets vendor/bundle public/system}

# Default value for default_env is {}
# set :default_env, { path: "/opt/ruby/bin:$PATH" }

# Default value for keep_releases is 5
# set :keep_releases, 5

namespace :deploy do

    desc 'Copy env file'
    task :copy_env_file do
        on roles(:app), in: :sequence, wait: 5 do
            execute :cp, '~/.secrets/.env', "#{release_path}/app/.env"
        end
    end

    desc 'Run update script'
    task :run_mediawiki_update_script do
        on roles(:app), in: :sequence, wait: 5 do
            execute('php #{release_path}/app/maintenance/update.php')
        end
    end

    desc 'Restart application'
    task :restart do
        on roles(:app), in: :sequence, wait: 5 do
          # Your restart mechanism here, for example:
          execute('sudo /usr/sbin/service apache restart')
        end
    end

    after :publishing, :copy_env_file
    after :copy_env_file, :restart, :run_mediawiki_update_script
#
#   after :restart, :clear_cache do
#     on roles(:web), in: :groups, limit: 3, wait: 10 do
#       # Here we can do anything such as:
#       # within release_path do
#       #   execute :rake, 'cache:clear'
#       # end
#     end
#   end
#
end