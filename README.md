  Sistema de Gestão Hospitalar
 
  Descrição
 Este projeto é um sistema de gestão hospitalar desenvolvido em PHP com MySQL, que permite o cadastro de funcionários e pacientes. Os funcionários podem acessar o sistema via login, cadastrar receitas médicas e registrar a administração de remédios. O sistema é executado em um servidor local utilizando o XAMPP.

  Tecnologias Utilizadas
- **Linguagem de Programação:** PHP
- **Banco de Dados:** MySQL
- **Front-end:** HTML, CSS e JavaScript (opcional)
- **Servidor Local:** XAMPP

  Funcionalidades
- Cadastro de funcionários (com permissões de acesso)
- Cadastro de pacientes
- Login de funcionários
- Cadastro de receitas médicas
- Registro da administração de remédios aos pacientes

 Requisitos para Execução
1. Instalar o [XAMPP](https://www.apachefriends.org/pt_br/index.html)
2. Ativar os serviços do Apache e MySQL no XAMPP
3. Criar o banco de dados e tabelas (arquivo SQL fornecido)
4. Configurar as credenciais de acesso ao banco no arquivo de configuração

 Instalação
1. Clone este repositório:
   ```sh
   git clone https://github.com/seu-usuario/sistema-hospitalar.git
   ```
2. Mova a pasta do projeto para o diretório do XAMPP (geralmente `C:\xampp\htdocs\` no Windows)
3. Importe o banco de dados:
   - Acesse `http://localhost/phpmyadmin/`
   - Crie um banco de dados chamado `hospital`
   - Importe o arquivo `hospital.sql` localizado na pasta do projeto
4. Atualize as credenciais de conexão com o banco de dados no arquivo `config.php`:
   ```php
   $host = 'localhost';
   $user = 'root';
   $password = '';
   $database = 'hospital';
   ```
5. Inicie o servidor Apache e MySQL no XAMPP
6. Acesse o sistema pelo navegador em: `http://localhost/sistema-hospitalar`



