# Projeto de Teste para a Tecnofit

Este projeto foi desenvolvido como um teste para a empresa Tecnofit. 
O objetivo principal é mostrar o ranqueamento de movimentos, mostrando as melhores performances dos usuários.

## Descrição do Projeto

O sistema avalia e classifica diferentes movimentos com base em quantidade de repetições.

## Como Rodar o Projeto

Siga os passos abaixo para configurar e executar o projeto em sua máquina:

1. **Clone o repositório:**

   ```bash
   git clone guiarduino/Tecnofit_test_guilherme_arduino_barlatti

2. **Instale as dependências**

   ```bash
   composer install

3. **Configure o arquivo .env**

   - Copie o arquivo .env na raiz do projeto e renomei para ".env"
   - Configure as seguintes variaveis no arquivo que você criou ".env":
        DATABASE_HOST='{ip_da_maquina_do_banco_de_dados}'
        DATABASE_USER='{nome_do_usuario_do_banco_de_dados}'
        DATABASE_PASSWORD='{senha_do_usuario}'
        DATABASE_NAME='{nome_da_base_de_dados}'

4. **Rodar Migrations**

   Caso não possua a estrutura de banco de dados ja correta, execute o seguinte comando para gerar a base de dados inicial:
   ```bash
   php .\app\database\createTables.php

5. **Executar localmente**

   Para executar localmente: basta entrar no diretorio raiz do projeto e executar o comando:
   ```bash
   php -S localhost:5000 -t public
   ```
   
   Com isso o projeto poderá ser executado localmente, basta entrar no navegador e acessar a url: "http://localhost:5000/"