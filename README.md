# Aplicação de cadastro de usuários - Sistemas de Informação 2023

Esse sistema foi desenvolvido em sala de aula como exemplo e NÃO conta com as melhores práticas de desenvolvimento. Ele apenas funciona (quase tudo...).

---

Foi desenvolvido usando as tecnologias:
- [PHP](https://www.php.net/) 🐘
- [MySQL](https://www.mysql.com/) 🐬
- [Bootstrap](https://getbootstrap.com.br/) 🅱
- [jQuery](https://jquery.com/) 🤢🤮

---

## Instalação e execução

Para instalar o sistema é necessário ter um servidor web (por exemplo, o [Apache](https://httpd.apache.org/)) capaz de executar scripts PHP e um servidor de banco de dados MySQL à disposição (para facilitar, todos instalados em uma mesma máquina).

A forma mais fácil de ter todos esses softwares disponíveis seria usando uma imagem em um sistema virtualizado, mas como daria mais trabalho explicar o que é isso e como funciona para vocês, o mais fácil para vocês é usando ferramentas como o [XAMPP](https://www.apachefriends.org/pt_br/index.html) que já traz tudo funcionando.

Com o XAMPP instalado, os arquivos desse repositório devem estar na pasta `htdocs` do XAMPP. Para encontrar essa pasta, basta abrir o Painel de Controle do XAMPP, clicar no botão `📁 Explorer` e buscar a pasta `htdocs`. Ao colocar estes arquivos, alguns arquivos já presentes na pasta devem ser substituídos.

Feito isso, basta abrir um navegador e acessar a página `instalar.php`. Seguindo a instalação padrão do XAMPP, essa página deverá ser encontrada em `[localhost/instalar.php](http://localhost/instalar.php)`. Esta página irá inicializar o banco de dados, chamado de `app_teste`. Após isto, a aplicação deverá poder ser acessada normalmente atrvés do `[localhost](http://localhost/)`.