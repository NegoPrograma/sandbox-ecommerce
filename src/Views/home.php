

<?php if(isset($viewData['result'])){
    $viewData['products'] = $viewData['result'];
    $pageQueryURL = "http://local:8080/sandbox-ecommerce/products/search?page=";
    }else {
        $pageQueryURL = "http://local:8080/sandbox-ecommerce/products?page=";
    }

?>


<?php foreach($viewData['products'] as $product): ?>
    <div class="product-card">
        <img class="product-image" src=<?php echo "http://local:8080/sandbox-ecommerce/assets/images/uploads/".$product['image_path'] ?> alt="imagem do produto indisponível.">
        <p class="product-name"><?php echo $product['name'] ?></p>
        <p class="price"><?php echo $product['price'] ?></p>
        <a href=<?php echo "products/buy/".$product['id']?>><button class="product-page-button">Saiba Mais</button></a>
    </div>

<?php endforeach ?>

<?php for($index = 1;$index <= $viewData['total_pages'];$index++): ?>
    <a href=<?php echo $pageQueryURL.$index?>><?php echo $index?></a>
    <?php endfor ?>