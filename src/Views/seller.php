<body>
    <?php if(isset($_SESSION['login_data'])): 
        if($_SESSION['login_data']['is_seller'] == 1): ?>
    <h1>O que deseja fazer?</h1>

    <h2>Produtos:</h2>
    <ul>
        <li><a href="http://local:8080/sandbox-ecommerce/admin/addproduct"><button>Adicionar Novo Produto</button></a></li>
        <li><a href=""><button>Remover Produto</button></a></li>
        <li><a href=""><button>Atualizar Informações de um Produto</button></a></li>
    </ul>
    <h2>Pedidos:</h2>
    <ul>
        <li><a href=""><button>Ver todos os pedidos</button></a></li>
        <li><a href=""><button>Pesquisa personalizada de pedidos</button></a></li>
    </ul>
    <h2>Suporte:</h2>
    <ul>
        <li><a href=""><button>Checar chamados de suporte</button></a></li>
    </ul>
        <?php endif;?>
    <?php else: ?>
    <form  method="post">
        <input type="text" placeholder="e-mail" name="email">
        <input type="password" placeholder="senha" name="password">
        <button class="login_button" type="submit">Login</button>
    </form>
    <?php endif;?>
</body>