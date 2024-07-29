# Projeto API

## Passos para Configuração

### 1. Clonar o Repositório
```bash
git clone <URL_DO_REPOSITORIO>
cd <NOME_DO_PROJETO>
```

### 2. Criar Arquivo .env
Crie um arquivo .env na raiz do projeto e cole as seguintes variáveis:
```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:31bLGkFHQqbqpXOifD/gurbTbXBSMd/s3vA9nwlrQu8=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_PORT=8080
APP_URL="http://localhost:${APP_PORT}"

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

FORWARD_DB_PORT=3310
DB_CONNECTION=mysql
DB_HOST=monorail.proxy.rlwy.net
DB_PORT=30958
DB_DATABASE=railway
DB_USERNAME=root
DB_PASSWORD=MITryhhIagJCPmhAjpARlPsGmXActfEO

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1


VITE_APP_NAME="${APP_NAME}"

WWWGROUP=1000
WWWUSER=1000
```
### 3. Executar Docker Compose
Na pasta do projeto, execute:
```bash
docker-compose up -d
```
### 4. Instalar Dependências
Entre no container do Sail e rode o comando para instalar as dependências:
```bash
./vendor/bin/sail shell
composer install
```
## Endpoints da API
### 1. Criar Usuário
* Rota: api/users
* Método: POST
* Descrição: Cria um novo usuário.
### 2. Login
* Rota: api/login
* Método: POST
* Descrição: Realiza o login e retorna um token Bearer.
* Parâmetros:
    * email: Email do usuário.
    * password: Senha do usuário.
### 3. CRUD de Clientes
* Rota: api/customers
* Métodos: GET, POST, PATCH, DELETE
* Descrição: Endpoints para criação, leitura, atualização e exclusão de clientes.
* Observação: Necessita estar logado.
### 4. Listar Cidades
* Rota: api/cities
* Método: GET
* Descrição: Lista todas as cidades.
* Observação: Necessita estar logado.
### 5. Listar Estados
* Rota: api/states
* Método: GET
* Descrição: Lista todos os estados.
* Observação: Necessita estar logado.
### 6. Logout
* Rota: api/logout
* Método: GET
* Descrição: Realiza o logout do usuário.
* Observação: Necessita estar logado.
