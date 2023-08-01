# API Jornada Milhas

A API Jornada Milhas é uma aplicação web que fornece endpoints para gerenciar depoimentos de clientes. A API permite que os usuários leiam depoimentos existentes e enviem seus próprios depoimentos. Foi desenvolvida utilizando o framework Laravel.

![Badge em Desenvolvimento](http://img.shields.io/static/v1?label=STATUS&message=EM%20DESENVOLVIMENTO&color=GREEN&style=for-the-badge)

| :placard: Vitrine.Dev |     |
| -------------  | --- |
| :sparkles: Nome        | **Api Jornada Milhas**
| :label: Tecnologias | php, laravel
| :rocket: URL         | https://url-deploy.com.br
| :fire: Desafio     | [https://url-do-desafio.com.br](https://www.alura.com.br/challenges/back-end-7/semana-01-classes-relacionamentos-depoimentos)

<!-- Inserir imagem com a #vitrinedev ao final do link -->
![](https://github-production-user-asset-6210df.s3.amazonaws.com/41714117/257077735-faffa45b-768d-45ca-a8da-7e0a4b6339ff.png#vitrinedev)

## Detalhes do projeto

## Endpoints

### Obter Depoimentos Aleatórios

Recupera até 3 depoimentos aleatórios para exibir na página inicial.

- **URL:** `/api/depoimentos-home`
- **Método:** `GET`
- **Resposta de Sucesso:**
  - **Código de Status:** 200 OK
  - **Conteúdo:** Array JSON contendo até 3 depoimentos, cada um com as seguintes propriedades:
    - `id` (integer): O identificador único do depoimento.
    - `depoimento` (string): O conteúdo do depoimento.
    - `user_name` (string): O nome do usuário que enviou o depoimento.
    - `foto` (string): A URL da foto do usuário (opcional).

- **Resposta de Erro:**
  - **Código de Status:** 404 Not Found
  - **Conteúdo:** Objeto JSON com a seguinte propriedade:
    - `message` (string): "Nenhum depoimento encontrado!" (Nenhum depoimento encontrado).

### Enviar Depoimento

Permite que os usuários enviem seus próprios depoimentos.

- **URL:** `/api/depoimentos/create`
- **Método:** `POST`
- **Parâmetros de Dados:** Objeto JSON contendo as seguintes propriedades:
  - `depoimento` (string, obrigatório): O conteúdo do depoimento.
  - `nome_user` (string, obrigatório): O nome do usuário que está enviando o depoimento.

- **Resposta de Sucesso:**
  - **Código de Status:** 201 Created
  - **Conteúdo:** Objeto JSON representando o depoimento criado, com as seguintes propriedades:
    - `id` (integer): O identificador único do depoimento.
    - `depoimento` (string): O conteúdo do depoimento.
    - `user_name` (string): O nome do usuário que enviou o depoimento.
    - `foto` (string): A URL da foto do usuário (opcional).

### Atualizar Depoimento

Permite atualizar um depoimento existente.

- **URL:** `/api/depoimentos/{id}`
- **Método:** `PUT`
- **Parâmetros da URL:** `id` (integer, obrigatório): O identificador único do depoimento a ser atualizado.
- **Parâmetros de Dados:** Objeto JSON contendo os campos a serem atualizados:
  - `depoimento` (string, opcional): O conteúdo atualizado do depoimento.
  - `nome_user` (string, opcional): O nome atualizado do usuário que enviou o depoimento.

- **Resposta de Sucesso:**
  - **Código de Status:** 200 OK
  - **Conteúdo:** Objeto JSON representando o depoimento atualizado, com as seguintes propriedades:
    - `id` (integer): O identificador único do depoimento.
    - `depoimento` (string): O conteúdo atualizado do depoimento.
    - `user_name` (string): O nome atualizado do usuário que enviou o depoimento.
    - `foto` (string): A URL da foto do usuário (opcional).

### Excluir Depoimento

Permite excluir um depoimento existente.

- **URL:** `/api/depoimentos/{id}`
- **Método:** `DELETE`
- **Parâmetros da URL:** `id` (integer, obrigatório): O identificador único do depoimento a ser excluído.

- **Resposta de Sucesso:**
  - **Código de Status:** 200 OK
  - **Conteúdo:** Objeto JSON com a seguinte propriedade:
    - `message` (string): "Depoimento excluído com sucesso!" (Depoimento excluído com sucesso).

## Códigos de Status

- 200 OK: A requisição foi bem-sucedida.
- 201 Created: O recurso foi criado com sucesso.
- 404 Not Found: O recurso solicitado não foi encontrado.

Por favor, observe que esta API não implementa autenticação de usuários ou outras medidas de segurança. Versões futuras podem incluir esses recursos para garantir a integridade dos dados e a privacidade dos usuários.

### Rotas Depoimentos


![Rotas depoimentos](https://github.com/igorsimoes4/jornadamilhas/assets/41714117/faffa45b-768d-45ca-a8da-7e0a4b6339ff)

# Autor

[<img loading="lazy" src="https://avatars.githubusercontent.com/u/41714117?v=4" width=115><br><sub>Igor Simões da Silveira</sub>](https://github.com/igorsimoes4) 
