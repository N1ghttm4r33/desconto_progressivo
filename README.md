entradas:

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

saídas:

    Total do carrinho 1: R$ 60.00

    Total do carrinho 2: R$ 85.50

    Total do carrinho 3: R$ 459.00

    Total do carrinho 4: R$ 3315.00

    Total do carrinho 5: R$ 30.00
