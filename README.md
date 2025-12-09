# Lógica de Carrinho de Compras com Desconto Progressivo

**Objetivo:** Você está ajudando a construir a lógica de um e-commerce e foi solicitado a desenvolver um módulo simples para cálculo do valor total do carrinho, com desconto progressivo aplicado de acordo com a quantidade de produtos diferentes.

Seu desafio é escrever uma função em PHP que calcule o valor total de um carrinho de compras com base nas seguintes regras.

### Regras do Desafio

Você deverá implementar a função:

``` php
function totalCarrinho(array $produtos): float
```

Essa função receberá como parâmetro um array de produtos, onde cada produto tem os seguintes campos:

- `id` (int): identificador único do produto
- `nome` (string): nome do produto
- `preco_unitario` (float): preço unitário do produto
- `quantidade` (int): quantidade comprada do produto

O retorno dessa função deverá ser o valor total do carrinho, considerando o desconto progressivo, se necessário.

### Regras de Desconto Progressivo
O desconto aplicado no valor total do carrinho depende da quantidade de produtos diferentes (com base no id do produto):

| Produtos Diferentes | Desconto Aplicado |
| ------------------- | ----------------- |
| 1                   | 0%                |
| 2                   | 5%                |
| 3                   | 10%               |
| 4 ou mais           | 15%               |

## entradas:

    $produtos1 = [
      ['id' => 1, 'nome' => 'Cabo HDMI', 'preco_unitario' => 30.00, 'quantidade' => 2],
    ];
    // Saída esperada: 60.00

    $produtos2 = [
      ['id' => 1, 'nome' => 'Pen Drive', 'preco_unitario' => 25.00, 'quantidade' => 2],
      ['id' => 2, 'nome' => 'Cartão de Memória', 'preco_unitario' => 40.00, 'quantidade' => 1],
    ];
    // Saída esperada: 85.50

    $produtos3 = [
      ['id' => 1, 'nome' => 'HD Externo', 'preco_unitario' => 300.00, 'quantidade' => 1],
      ['id' => 2, 'nome' => 'Teclado', 'preco_unitario' => 150.00, 'quantidade' => 1],
      ['id' => 3, 'nome' => 'Mousepad', 'preco_unitario' => 20.00, 'quantidade' => 3],
    ];
    // Saída esperada: 459.00
    
    $produtos4 = [
      ['id' => 1, 'nome' => 'Notebook', 'preco_unitario' => 3500.00, 'quantidade' => 1],
      ['id' => 2, 'nome' => 'Suporte para Notebook', 'preco_unitario' => 120.00, 'quantidade' => 1],
      ['id' => 3, 'nome' => 'Hub USB', 'preco_unitario' => 80.00, 'quantidade' => 1],
      ['id' => 4, 'nome' => 'Fone de Ouvido', 'preco_unitario' => 200.00, 'quantidade' => 1],
    ];
    // Saída esperada: 3315.00
    
    $produtos5 = [
      ['id' => 1, 'nome' => 'Cabo USB', 'preco_unitario' => 10.00, 'quantidade' => 1],
      ['id' => 1, 'nome' => 'Cabo USB', 'preco_unitario' => 10.00, 'quantidade' => 2],
    ];
    // Saída esperada: 30.00

## saídas:

    Total do carrinho 1: R$ 60.00

    Total do carrinho 2: R$ 85.50

    Total do carrinho 3: R$ 459.00

    Total do carrinho 4: R$ 3315.00

    Total do carrinho 5: R$ 30.00

# tratamento de erros

para o tratamento de erros é necessário colocar o seguinte código no iníco do php

    error_reporting(E_ALL);
    ini_set('display_errors','On');

# Referências utilizadas:

https://www.php.net/manual/en/function.array-unique.php
https://www.php.net/manual/en/function.number-format.php
https://www.php.net/manual/pt_BR/control-structures.match.php
https://www.php.net/manual/pt_BR/language.exceptions.php
https://www.php.net/manual/pt_BR/ref.errorfunc.php