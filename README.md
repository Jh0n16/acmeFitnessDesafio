Considerações:

    - A versão do PHP utilizada foi a 8.3 e a versão do Laravel foi a 11
    - Utilizei um banco de dados do tipo sqlite por ser mais leve e rápido para os testes
    - Existem factories que populam o banco de dados atomaticamente (exceto para as vendas), para ativa-las basta digitar o comando php artisan db:seed
    - Caso o ocorra algum erro com o banco de dados basta digitar o comando php artisan migrate:fresh para zerar o banco
    - Para criar o banco de dados pela primeira vez basta digitar php artisan migrate

As rotas da API são:

    Clientes => 
        (GET) http://localhost:8000/api/cliente/ -> Lista todos os clientes
        (POST) http://localhost:8000/api/cliente/ -> Adiciona novos clientes
        (GET) http://localhost:8000/api/cliente/{id} -> Exibe somente o cliente que tenha o id igual ao passado na URL
        (PUT) http://localhost:8000/api/cliente/{id} -> Atualiza o cliente de id igual ao que foi passado na URL
        (DELETE) http://localhost:8000/api/cliente/{id} -> Exclui o cliente de id igual ao que foi passado na URL
    
    Endereços => 
        (GET) http://localhost:8000/api/endereco/ -> Lista todos os endereços
        (POST) http://localhost:8000/api/endereco/ -> Adiciona novos endereços
        (GET) http://localhost:8000/api/endereco/{id} -> Exibe somente o endereço que tenha o id igual ao passado na URL
        (PUT) http://localhost:8000/api/endereco/{id} -> Atualiza o endereço de id igual ao que foi passado na URL
        (DELETE) http://localhost:8000/api/endereco/{id} -> Exclui o endereço de id igual ao que foi passado na URL
    
    Categorias => 
        (GET) http://localhost:8000/api/categoria/ -> Lista todas as categorias
        (POST) http://localhost:8000/api/categoria/ -> Adiciona novas categorias
        (GET) http://localhost:8000/api/categoria/{id} -> Exibe somente a categoria que tenha o id igual ao passado na URL
        (PUT) http://localhost:8000/api/categoria/{id} -> Atualiza a categoria de id igual ao que foi passado na URL
        (DELETE) http://localhost:8000/api/categoria/{id} -> Exclui a categoria de id igual ao que foi passado na URL
    
    Produtos => 
        (GET) http://localhost:8000/api/produto/ -> Lista todos os produtos
        (POST) http://localhost:8000/api/produto/ -> Adiciona novos produtos
        (GET) http://localhost:8000/api/produto/{id} -> Exibe somente o produto que tenha o id igual ao passado na URL
        (PUT) http://localhost:8000/api/produto/{id} -> Atualiza o produto de id igual ao que foi passado na URL
        (DELETE) http://localhost:8000/api/produto/{id} -> Exclui o produto de id igual ao que foi passado na URL
    
    Estoques => 
        (GET) http://localhost:8000/api/estoque/ -> Lista todos os estoques
        (POST) http://localhost:8000/api/estoque/ -> Adiciona novos estoques
        (GET) http://localhost:8000/api/estoque/{id} -> Exibe somente o estoque que tenha o id igual ao passado na URL
        (PUT) http://localhost:8000/api/estoque/{id} -> Atualiza o estoque de id igual ao que foi passado na URL
        (DELETE) http://localhost:8000/api/estoque/{id} -> Exclui o estoque de id igual ao que foi passado na URL
    
    Vendas => 
        (GET) http://localhost:8000/api/venda/ -> Lista todas as vendas
        (POST) http://localhost:8000/api/venda/ -> Adiciona novas vendas
        (GET) http://localhost:8000/api/venda/{id} -> Exibe somente a venda que tenha o id igual ao passado na URL
        (PUT) http://localhost:8000/api/venda/{id} -> Atualiza a venda de id igual ao que foi passado na URL
        (DELETE) http://localhost:8000/api/venda/{id} -> Exclui a venda de id igual ao que foi passado na URL
        (GET) http://localhost:8000/api/produtosMaisVendidos/ -> Lista os produtos mais vendidos

Os campos esperados nas rotas POST e PUT são:

    Clientes =>
        'nomeCompleto' -> String
        'cpf' -> String
        'dataDeNascimento' -> Data no formato: Y-m-d

    Endereços =>
        'logradouro' -> String
        'cidade' -> String
        'bairro' -> String
        'numero' -> Inteiro
        'cep' -> String
        'complemento' -> String
        'cliente_id' -> Primary Key da tabela clientes

    Categorias =>
        'nome' -> String
        'descricao' -> String

    Produtos =>
        'nome' -> String
        'cor' -> String
        'imagem' -> Binary
        'preco' -> Float
        'descricao' -> String
        'peso' -> Float
        'categoria_id' -> Primary Key da tabela categorias

    Estoques =>
        'tamanho' -> Inteiro
        'precoDeVenda' -> Float
        'quantidadeDoEstoque' -> Inteiro
        'produto_id' -> Primary Key da tabela produtos

    Vendas =>
        'dataDaVenda' -> Data no formato: Y-m-d
        'variacoesDosProdutos' -> JSON semelhante a esse:
            {
                "item": {
                    "estoque_id": 1,
                    "precoDeVenda": 12.99,
                    "quantidade": 5
                },
                "item2": {
                    "estoque_id": 5,
                    "precoDeVenda": 19.99,
                    "quantidade": 10
                }
            }
        'formaDePagamento' -> Um dos seguintes valores: "pix", "boleto" ou "cartao"
        'cliente_id' -> Primary Key da tabela clientes
        'endereco_id' -> Primary Key da tabela enderecos
