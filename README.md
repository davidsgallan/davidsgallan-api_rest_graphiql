
Pré-requisitos
-------------
Certifique-se de ter instalado em seu sistema:

PHP 8+
Composer 2.0
Docker 20.10 +
Docker-Compose 1.29.1

Instalação
-------------
No diretorio do projeto rode o comando:
1.  `$ ./vendor/bin/sail up`
2.  `$ ./vendor/bin/sail artisan migrate`
3.  `$ ./vendor/bin/sail artisan db:seed`

API Rest
-------------

Ações
-------------
- Recebe um JSON com os atributos e cadastra o produto;
- Retorna o produto pelo id;
- Retorna a lista de todos os produtos;
- Recebe um JSON com os atributos a serem atualizados;
- Remove o produto pelo id.

Requisitos
                
-------------
Faz-se necessário o uso de um intermediário para solicitar as informações.
Recomendações:
> https://www.postman.com/
                
> https://reqbin.com/
                
OBS: Toda a requisição REST deve ser acompanhada de um Bearer Token:
>b8e1b75bafb25619dc15c73f93a30783
                
Tipos de requisição
                
- Criar um novo produto: POST - "localhost/api/product/'
```javascript
{
    "name": "Nome de teste",
    "description": "Descrição de teste",
    "brand": "https://via.placeholder.com/640x480.png/008866?text=qui",
    "category": "teste",
    "price": "122,00",
    "color": "#1fb7d0",
}
```

- Editar um produto: PUT - "localhost/api/product/{id}'
```javascript
{
    "name": "Nome de teste",
    "description": "Descrição de teste",
    "brand": "https://via.placeholder.com/640x480.png/008866?text=qui",
    "category": "teste",
    "price": "122,00",
    "color": "#1fb7d0",
}
```
- Solicitar um produto por Id: GET - "localhost/api/product/{id}'
- Solicitar todos os produtos: GET - "localhost/api/products/'
- Apagar um produto: DELETE - "localhost/api/product/{id}'

API GraphQL
-------------

Ações
-------------
- Recebe um JSON com os atributos e cadastra o produto;
- Retorna o produto pelo id;
- Retorna a lista de todos os produtos;
- Recebe um JSON com os atributos a serem atualizados;
- Remove o produto pelo id.
                
Local
-------------
>"localhost/api/graphiql/
                
Tipos de requisição
                
- Listar todos os produtos:
```javascript
{
	  products{
			id
			name
			description
			brand
			category
			price
			color
			created_at
			updated_at
	  }
}
```
                
- Buscar produto por Id:
```javascript
{
	  product(id: 1){
			id
			name
			description
			brand
			category
			price
			color
			created_at
			updated_at
	  }
}
```
                
- Criar novo produto:
```javascript
mutation {
	 createProducts (
		  name: "fdhfdhdh",
		  description: "d",
		  brand: "6j",
		  category: "j",
		  price: "j",
		  color: "d",
		  created_at: "1979-10-29",
		  updated_at: "1979-10-29"
)
	 {
		  id
		  name
		  description
		  brand
		  category
		  price
		  color
		  created_at
		  updated_at
	 }
}
```

                
- Editar produto:
```javascript
mutation {
 updateProducts (id: 1,
  name: "fdhfdhdh",
  description: "d",
  brand: "6j",
  category: "j",
  price: "j",
  color: "d",
  created_at: "1979-10-29",
  updated_at: "1979-10-29"
)
	 {
	  id
	  name
	  description
	  brand
	  category
	  price
	  color
	  created_at
	  updated_at
	 }
}
```
