<?php

require 'recipe/composer.php';

//fcfiZLa#P7f/6XXx
server('producao', '191.101.9.10', 22)
	->user('root')
	->password('Nf(fv4{Ms75Av]b')
	->stage('producao')
    ->env('deploy_path', '/var/www/html/livraria_online');

set('repository', 'https://github.com/marciovennan/livraria.git');

task('deploy', [
    'deploy:prepare',
    'deploy:update_code',
]);

