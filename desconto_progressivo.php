<?php
    function totalCarrinho(array $produtos): float
    {
        //primeiro é necessário ver se a entrada não está vazia
        //pois se estiver é desnecessário o resto do código
        if (empty($produtos)) {
            return 0.00;
        }

        //variaveis iniciais para a quantidade de produtos diferentes
        $produtos_diferentes = 0;

        //variaveis para o valor do carrinho
        $subtotal = 0.00;
        $desconto = 0.00;

        //aqui ele percorre por todos os produtos.
        //o campo nome não é utilizado nem verificado pois não é necessário pra essa função
        // a não ser por motivos de segurança
        foreach ($produtos as $produto) {
            //sanitização para campos necessários ausentes
            if (!isset($produto['preco_unitario'], $produto['quantidade'], $produto['id'])) {
                throw new Exception(
                    "Campos necessários para o processamento da compra estão ausentes"
                );
            }

            //tratamento de erro dos valores inseridos nos campos
            if (!is_numeric($produto['preco_unitario']) || !is_numeric($produto['quantidade'])) {
                throw new Exception(
                    "Valores inválidos inseridos nos campos, corrija os dados e tente novamente"
                );
            }

            $subtotal += $produto['preco_unitario'] * $produto['quantidade'];
        }

        //antes mesmo de ver o desconto, se não existe valor, não há necessidade
        //de ser calculado desconto, então retorna 0
        if ($subtotal == 0) {
            return 0.00;
        }

        //para não utilizar outros loops é utilizado o count e array_unique
        //menos uma variável necessária utilizando o array_column
        //se fosse utilizar de outra forma, teria que por exemplo declarar um vetor e
        //receber os dados dentro do foreach
        $produtos_diferentes = count(array_unique(array_column($produtos, 'id')));

        //match nesse caso é melhor pois pode retornar numérico e atribuir a uma variável
        //retorna o valor total do desconto a ser aplicado
        $desconto = match($produtos_diferentes) {
            1 => 0.00,
            2 => $subtotal * 0.05,
            3 => $subtotal * 0.10,
            default => $subtotal * 0.15,
        };

        return round($subtotal - $desconto, 2);
    }

    //entradas
    $produtos1 = [
        ['id' => 1, 'nome' => 'Cabo HDMI', 'preco_unitario' => 30.00, 'quantidade' => 2],
    ];

    $produtos2 = [
        ['id' => 1, 'nome' => 'Pen Drive', 'preco_unitario' => 25.00, 'quantidade' => 2],
        ['id' => 2, 'nome' => 'Cartão de Memória', 'preco_unitario' => 40.00, 'quantidade' => 1],
    ];

    $produtos3 = [
        ['id' => 1, 'nome' => 'HD Externo', 'preco_unitario' => 300.00, 'quantidade' => 1],
        ['id' => 2, 'nome' => 'Teclado', 'preco_unitario' => 150.00, 'quantidade' => 1],
        ['id' => 3, 'nome' => 'Mousepad', 'preco_unitario' => 20.00, 'quantidade' => 3],
    ];

    $produtos4 = [
        ['id' => 1, 'nome' => 'Notebook', 'preco_unitario' => 3500.00, 'quantidade' => 1],
        ['id' => 2, 'nome' => 'Suporte para Notebook', 'preco_unitario' => 120.00, 'quantidade' => 1],
        ['id' => 3, 'nome' => 'Hub USB', 'preco_unitario' => 80.00, 'quantidade' => 1],
        ['id' => 4, 'nome' => 'Fone de Ouvido', 'preco_unitario' => 200.00, 'quantidade' => 1],
    ];

    $produtos5 = [
        ['id' => 1, 'nome' => 'Cabo USB', 'preco_unitario' => 10.00, 'quantidade' => 1],
        ['id' => 1, 'nome' => 'Cabo USB', 'preco_unitario' => 10.00, 'quantidade' => 2],
    ];

    //aparentemente mesmo retornando a função como um float de duas casas decimais
    //para printar ele arredonda o valor, por isso usei number_format, só que o 
    //number_format retorna o valor em string

    //saídas
    $total = totalCarrinho($produtos1);
    echo "Total do carrinho 1: R$ " . number_format($total, 2) . "<br>"; 

    $total = totalCarrinho($produtos2);
    echo "Total do carrinho 2: R$ " . number_format($total, 2) . "<br>"; 

    $total = totalCarrinho($produtos3);
    echo "Total do carrinho 3: R$ " . number_format($total, 2) . "<br>"; 

    $total = totalCarrinho($produtos4);
    echo "Total do carrinho 4: R$ " . number_format($total, 2) . "<br>"; 

    $total = totalCarrinho($produtos5);
    echo "Total do carrinho 5: R$ " . number_format($total, 2) . "<br>"; 
?>