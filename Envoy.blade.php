@servers(['staging' => ['u2846@buff.elastictech.org']])

@task('deploy', ['on' => 'staging'])
    cd /home/u2846/domains/staging.annalesnikova.ru
    git fetch origin
    git checkout master
    git pull origin master
    composer install
    php artisan migrate
@endtask
