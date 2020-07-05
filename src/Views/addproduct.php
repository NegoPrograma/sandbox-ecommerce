<body>

    <form  method="post" enctype="multipart/form-data">
        Nome:
        <input type="text" name="name" required><br>
        Preço:
        <input type="text" name="price" required><br>
        Quantidade no estoque:
        <input type="text" name="in_storage" required><br>
        Categoria:
        <input type="text" name="category" required><br><!--Adicionar dropdown com as categorias existentes-->
        Imagem:
        <input type="file" name="product_image" required><br>
        <button type="submit">Adicionar produto</button>
    </form>
</body>