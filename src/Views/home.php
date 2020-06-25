


<?php foreach($viewData['products'] as $product): ?>
    <div class="product-card">
        <img class="product-image" src=<?php echo "/assets/images/uploads/"."{$product['image_path']}" ?> alt="imagem do produto indisponível.">
        <p class="product-name"><?php echo $product['name'] ?></p>
        <p class="price"><?php echo $product['price'] ?></p>
    </div>

<?php endforeach ?>

<?php for($index = 1;$index <= $viewData['total_pages'];$index++): ?>
    <a href=<?php echo "products?page=".$index?>><?php echo $index?></a>
    <?php endfor ?>