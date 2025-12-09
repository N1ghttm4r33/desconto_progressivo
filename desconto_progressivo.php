<?php
    function totalCarrinho(array $produtos): float
    {
        //verifica se o array está vazio
        if (empty($produtos)) {
            return 0.00;
        }

        //variaveis iniciais para a quantidade de produtos diferentes
        $ids = [];
        $produtos_diferentes = 0;

        //variaveis para o valor do carrinho
        $subtotal = 0.00;
        $valor_total = 0.00;
        $desconto = 0.00;

        foreach ($produtos as $produto) {
            if (!isset($produto['preco_unitario'], $produto['quantidade'], $produto['id'])) {
                echo("campos necessários faltando para o cálculo.\n");

                //aqui eu só continuei o loop, porém seria necessário tratar 
                //o erro de uma forma melhor para o caso em específico, como parar o
                //processamento e avisar o usuário, gerar uma exeção
                continue;
            }

            if (!is_numeric($produto['preco_unitario']) || !is_numeric($produto['quantidade'])) {
                echo("valores inválidos inseridos para o cálculo.\n");
                
                //aqui é a mesma coisa que disse em cima.
                continue;
            }

            $ids[] = $produto['id'];
            $subtotal += $produto['preco_unitario'] * $produto['quantidade'];
        }

        if ($subtotal == 0) {
            return 0.00;
        }

        //conta a quantidade de produtos unicos (diferentes) conforme o site do php
        $produtos_diferentes = count(array_unique($ids));

        //match nesse caso é melhor pois pode retornar numérico e atribuir a uma variável
        //retorna o valor total do desconto a ser aplicado
        $desconto = match($produtos_diferentes) {
            1 => 0.00,
            2 => $subtotal * 0.05,
            3 => $subtotal * 0.10,
            default => $subtotal * 0.15,
        };

        //o round é utilizado para formatar para duas casas decimais em tipo float
        $valor_total = round($subtotal - $desconto, 2);

        return $valor_total;
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

    $produtos = [
        ['id' => 1, 'nome' => 'Cabo USB', 'preco_unitario' => 10.00, 'quantidade' => 1],
        ['id' => 1, 'nome' => 'Cabo USB', 'preco_unitario' => 10.00, 'quantidade' => 2],
    ];

    //aparentemente mesmo retornando a função como um float de duas casas decimais
    //para printar ele arredonda o valor, por isso usei number_format, só que o 
    //number_format retorna o valor em string

    $total = totalCarrinho($produtos1);
    echo "Total do carrinho 1: R$ " . number_format($total, 2) . "\n"; 

    $total = totalCarrinho($produtos2);
    echo "Total do carrinho 2: R$ " . number_format($total, 2) . "\n"; 

    $total = totalCarrinho($produtos3);
    echo "Total do carrinho 3: R$ " . number_format($total, 2) . "\n"; 

    $total = totalCarrinho($produtos4);
    echo "Total do carrinho 4: R$ " . number_format($total, 2) . "\n"; 
?>