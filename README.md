# O projeto

O projeto constitui de uma proposta de desafio, sendo a mesma descrita abaixo.

## O desafio

Uma antiga loja de vinhos gostaria de vender seus produtos também pela internet para aumentar o seu faturamento, com isso, o seu objetivo é desenvolver um pequeno e-commerce web que contemple os seguintes requisitos funcionais:

1. Cadastro de vinho com as informações de nome, tipo do vinho e peso;
2. Registrar uma venda, considerando as seguintes situações:
3. Cliente gostaria de selecionar um ou mais produtos e a quantidade desejada;
4. Informar a distancia para entrega (ex: 250km)
5. Ao fechar o pedido, deve ser informado o total geral da venda, considerando o frete.

## Requisitos do desafio

1. Ter a camada de frontend totalmente desacoplada do backend;
2. Utilizar o conceito REST, podendo utilizar qualquer framework Java que atenda o mesmo;
3. O sistema deve ser desenvolvido com backend de sua preferência (sugerimos PHP ou Java), de preferência sem framework fullstack (como ZendF, Laravel, CakePHP, etc,);
4. Atualmente utilizamos o conceito SPA (single page application), portanto será um diferencial se o front estiver desacoplado do back;
5. Não usar frameworks de HTML/CSS (como bootstrap);
6. Não há problemas em usar frameworks JS que estão em evidência no mercado (usamos React atualmente).

## Estrutura

O projeto está constituído em back-end e front-end separados, sendo:

- [api](./api) o diretório onde se encontra o back-end da aplicação com [Laravel](https://laravel.com/docs/9.x)
- [web](./web/) o diretório onde se encontra o front-end da aplicação com e [Next.js](https://nextjs.org/docs/getting-started)

## Requisitos do projeto

Para a execução do projeto é necessário ter instaladas as seguintes tecnologias:

- [node.js](https://nodejs.org/en/) || [yarn](https://yarnpkg.com/getting-started/install)
- [PHP ~7.1 || ^8.0](https://www.php.net/manual/en/install.php)
- [composer](https://getcomposer.org/download/)
- [Docker](https://docs.docker.com/engine/install/)
- [Docker Compose](https://docs.docker.com/compose/)
