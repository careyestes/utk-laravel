# config valid only for current version of Capistrano
lock '3.4.0'

SSHKit.config.command_map[:composer] = "/usr/sbin/composer"

set :application, "utk" 
set :repo_url,  "git@github.com:UniversityOfTennessee/utk.git"
set :deploy_to, "/data/utk/docs"
set :tmp_dir, "/data/utk/tmp"
set :user, "webteam"

 
namespace :deploy do
     
    desc "Build"
    after :updated, :build do
        on roles(:app) do
            within release_path  do
                execute :composer, "install --no-dev --quiet" 
                execute "cp #{deploy_to}/../components/.env #{release_path}"
                execute "cp #{deploy_to}/../components/config.php #{release_path}/public/packages/ckfinder"
                execute :chmod, "755 public/packages/ckfinder/config.php"
                execute :chmod, "u+x artisan" 
                execute :php, "artisan migrate --force"
                execute :chmod, "-R 777 storage/"
                execute :chmod, "-R 777 vendor/"
            end
        end
    end
 
    desc "Restart"
    task :restart do
        on roles(:app) do
            within release_path  do
                execute :chmod, "-R 777 storage/"
                execute :chmod, "-R 777 vendor/"
            end
        end
    end
 
end
