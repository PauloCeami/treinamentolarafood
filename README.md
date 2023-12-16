webdevops/php-apache:8.2

alias sail='./vendor/bin/sail'
alias sup='sail up -d'
alias sw='sail down'
alias st='sail start'
alias sp='sail stop'
alias sco='sail artisan make:controller'
alias smo='sail artisan make:model'
alias smi='sail migrate'
alias scp='sail composer'
alias sfs='sail migrate:fresh --seed'


****************************************************************************************
UPDATE PASSWORD USER ROOT MYSQL
ALTER USER 'sail'@'%' IDENTIFIED BY '123';
FLUSH PRIVILEGES;

GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, RELOAD, SHUTDOWN, PROCESS, FILE, REFERENCES, INDEX, ALTER, SHOW DATABASES, SUPER, CREATE TEMPORARY TABLES, LOCK TABLES, EXECUTE, REPLICATION SLAVE, REPLICATION CLIENT, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, CREATE USER, EVENT, TRIGGER, CREATE TABLESPACE, CREATE ROLE, DROP ROLE ON *.* TO `sail`@`%` WITH GRANT OPTION

GRANT RELOAD ON *.* TO 'sail'@'%';

mysql> select user,host from user;
+------------------+-----------+
| user             | host      |
+------------------+-----------+
| root             | %         |
| sail             | %         |
| healthchecker    | localhost |
| mysql.infoschema | localhost |
| mysql.session    | localhost |
| mysql.sys        | localhost |
| paulo            | localhost |
| root             | localhost |
+------------------+-----------+
8 rows in set (0.00 sec)

mysql> ALTER USER 'sail'@'localhost' IDENTIFIED BY '123';
ERROR 1396 (HY000): Operation ALTER USER failed for 'sail'@'localhost'
mysql> ALTER USER 'sail'@'%' IDENTIFIED BY '123';
Query OK, 0 rows affected (0.01 sec)

mysql> FLUSH PRIVILEGES;
Query OK, 0 rows affected (0.01 sec)

mysql> GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, RELOAD, SHUTDOWN, PROCESS, FILE, REFERENCES, INDEX, ALTER, SHOW DATABASES, SUPER, CREATE TEMPORARY TABLES, LOCK TABLES, EXECUTE, REPLICATION SLAVE, REPLICATION CLIENT, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, CREATE USER, EVENT, TRIGGER, CREATE TABLESPACE, CREATE ROLE, DROP ROLE ON *.* TO `sail`@`%` WITH GRANT OPTION;
Query OK, 0 rows affected, 1 warning (0.01 sec)

mysql> GRANT RELOAD ON *.* TO 'sail'@'%';
Query OK, 0 rows affected (0.01 sec)


****************************************************************************************

    phpmyadmin:
          image: phpmyadmin/phpmyadmin
        environment:
          MYSQL_ROOT_PASSWORD: '${DB_PASSWORD}'
        ports:
          - "8888:80"
          
*****************************************************************************************  
          
    phpmyadmin:
        image: 'phpmyadmin:latest'
        ports:
            - 8081:80
        links:
            - "mysql:db"
        depends_on:
            - mysql
        networks:
            - sail
        environment:
            - PMA_ARBITRARY=1

****************************************************************************************
PINGUIM ACADEMY SAIL
https://www.youtube.com/watch?v=tM5isVtTvM0

****************************************************************************************

ENTER PROJECT SAIL
Thank you! We hope you build something incredible. Dive in with: cd treinamento-larafood && ./vendor/bin/sail up

****************************************************************************************

CREATE PROJECT LARAVEL WITH CONTAINNER DEFINED
curl -s "https://laravel.build/treinamentolarafood?with=mysql,redis&devcontainer" | bash

POR QUE O MYUSQL NAO CONECTA
https://stackoverflow.com/questions/65761142/cant-connect-to-database-laravel-sail

****************************************************************************************

edit sail alias
nano ~/.bashrc

confirm save alias sail
source ~/.bashrc

****************************************************************************************

permissao nas pastas dentro de  'cd .../storage'
sudo chmod -R 777 ./*


PERMISSAO PARA INSTALAR BIBLIOTECAS 
chmod 777 -R vendor/*

PERMISSIONS PARA RODAR ARTISAN MAKE:MODEL
chmod -R 777 app/*


docker exec -it CONTAINER bash  
root@df59b9740b05:/var/www# chmod -R 777 html/*

****************************************************************************************


EXECUTAR COMPOSER INSTALL DENTRO DO CONTAINNER RODANDO

1 - docker exec -it CONTAINNER_NAME_ID bash

2 - composer install 

INSTALL SAIL DENTRO DO CONTAINNER
3 - root@7735392bf9a0:/var/www/html# php artisan sail:install

DEPOIS 
4 - exit


DEPOIS
5 - pauloceami@pauloceami-vostro3520:~/projetos/php/treinamento-larafood$ sail


****************************************************************************************

LISTA ALL CONTAINNER ID
docker ps -qa

****************************************************************************************


mysql> CREATE USER 'sail'@'localhost' IDENTIFIED BY 'password';
Query OK, 0 rows affected (0.02 sec)

mysql> 


docker rmi $(docker images -a)

docker rm $(docker ps -a -f status=exited -q)

docker rm $(docker ps -a -f status=created -q)



O Docker fornece um único comando que limpará quaisquer recursos (imagens, contêineres, volumes e redes) que estejam pendentes (sem tags ou associado a um contêiner):
docker system prune


REMOVE ALL 
docker system prune -a --volumes


WARNING! This will remove:
    - all stopped containers
    - all networks not used by at least one container
    - all volumes not used by at least one container
    - all images without at least one container associated to them
    - all build cache
    
****************************************************************************************
Are you sure you want to continue? [y/N] y
Deleted Images:
untagged: sail-8.2/app:latest
deleted: sha256:5cd2bd2e120ac49bcad8aaab4d8073b963abb1192ae8b33dbddaa5b0237f7043
untagged: redis:alpine
untagged: redis@sha256:a3e82d34456f5d012dcbf542b564c39697c14dc4225cf3d29b3278fca041ad15
deleted: sha256:d2d4688fcebeb127fbc1e00693c3b4165ba8a02bf1e0347dd7d9ba38f6199afe
deleted: sha256:541e3fba7a152b7b7398b9f12fbafe85dc911fe5bb6cc9aa34c2cd19e3339f86
deleted: sha256:5af4f8f59b764c64c6def53f52ada809fe38d528441d08d01c206dfb3fc3b691
untagged: phpmyadmin/phpmyadmin:latest
untagged: phpmyadmin/phpmyadmin@sha256:67ba2550fd004399ab0b95b64021a88ea544011e566a9a1995180a3decb6410d
deleted: sha256:933569f3a9f631d1867bc512beedf6d6fa25a5b3a2b2638d59fe2d6f18002db9
deleted: sha256:c062055a88d0ea3518803dad689de0fd1c4d0086e69468539775c648d84bf7fe
deleted: sha256:870f0d68a84119de6dc57a04bd3132f43b124abf818ba2a17fa66b41c3dc092f
deleted: sha256:758105a8a221456937e20d794c72e88461a6a89eb42f9b1346337fcdc274ca9c
deleted: sha256:c9e443ef1d4319e2aa87ca7875be15c2f601290770936f1fee419d909970d8f9
deleted: sha256:4219c066cd8854aceb2eb63a5f76f86a9a815a9cbca7bb288fd9d9fd5e520ef1
deleted: sha256:24839d45ca455f36659219281e0f2304520b92347eb536ad5cc7b4dbb8163588
untagged: phpmyadmin:latest
untagged: phpmyadmin@sha256:f84a1dc2fc90f8e55f03d8ba4144da4fc8d4b90952b9a3571ed918a533b9a40e
deleted: sha256:323185e11c2cfc7d3c33ace413d64af548d25819c35970c2184d26b442769ae7
deleted: sha256:e53c234183096b2ca65ef7feb828b3fee63ed84399250d682b3db4cf4f746851
deleted: sha256:6ebc459bc800d55c19c664d8038d4cf31a67447d0803068e252adaadafbfe634
deleted: sha256:36695e9f6e63f790cff01b7
deleted: sha256:92770f546e065c4942829b1f0d7d1f02c2eb1e6acf0d1bc08ef0bf6be4972839
untagged: mysql/mysql-server:8.0
untagged: mysql/mysql-server@sha256:d6c8301b7834c5b9c2b733b10b7e630f441af7bc917c74dba379f24eeeb6a313
deleted: sha256:1d9c2219ff69238d2f8e576dba546bcd16baaef710babbb1f89e67bbd3530267
deleted: sha256:1436737b7e3c6e28ae669afc75f6222d137e331c9eee916666b8b0f04c9d453b
deleted: sha256:904fb564042e80400a99f3f57b88d449865acd94303f7f5a7529b56290b10756
deleted: sha256:023437eb0e6c05200a573703111fee17cbbf90f0e36b1edc9e94e9de1db9fdc0
deleted: sha256:fcc58f7739aa572e8f7d949b8df604abe48b9d74aeeea75bdd3ca2bed24eefc4
deleted: sha256:b95d8286e5565760c5248f29ef6c4908d8b460e2085b800d08303fce5ce8bd70
deleted: sha256:aac1f7e6d4e5d9eb5c90ab3560ee346285dd24732e8224eafb935ada3ea4f978
deleted: sha256:e3235af76f171c0ce79ba56cacc80695504a0db3d087a9934c296e565a83ae40

Deleted build cache objects:
qavzr2yc15xqpu3mjrl1wlmlv
edel5n00dcq1vxitdwam1boz9
7iwhs4j7hzqv16rlolsmzilrj


Total reclaimed space: 2.815GB

****************************************************************************************

REMOVE ALL CONTAINNERS  - https://www.baeldung.com/ops/remove-docker-containers#:~:text=Remove%20All%20the%20Docker%20Containers,-Consider%20a%20scenario&text=The%20command%20docker%20ps%20%2Dqa,iteratively%20remove%20the%20Docker%20containers.&text=Here%2C%20we%20use%20the%20%2Df,avoid%20the%20prompt%20for%20confirmation.
docker rm -f mycontainer

****************************************************************************************

PRINT VERSION LARAVEL
Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})



<ul class="classes" style=""><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">01 - Criar Model e Migration de Planos no Laravel</span></li><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">02 - Organizar Rota e Preparar Listagem dos Planos no Laravel</span></li><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">03 - Listar os Planos do LaraFood</span></li><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">04 - Paginar os Planos do LaraFood</span></li><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">05 - Cadastrar Novo Plano no LaraFood</span></li><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">06 - Mostrar Detalhes do Plano no LaraFood</span></li><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">07 - Deletar o Plano no LaraFood</span></li><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">08 - Pesquisar um plano no LaraFood</span></li><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">09 - Breadcrumb no LaraFood</span></li><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">10 - Melhorias no módulo de planos no LaraFood</span></li><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">11 - Atualizar o plano do LaraFood</span></li><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">12 - Validar Planos do LaraFood</span></li><li class="animate__animated animate__fadeIn"><span class="check fas fa-check active"></span><span class="nameLesson">13 - Criar Observer de Plano no LaraFood</span></li></ul>

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