<?php if (isset($viewData['result'])) {
    $viewData['products'] = $viewData['result'];
    unset($viewData['total_pages']);
} ?>


<?php foreach ($viewData['products'] as $product) : ?>
    <div class="product-card">
        <img class="product-image" src=<?php echo "http://local:8080/sandbox-ecommerce/" . $product['image_path'] ?> alt="imagem do produto indisponível.">
        <p class="product-name"><?php echo $product['name'] ?></p>
        <p class="price">R$<?php echo $product['price'] ?></p>
        <a href=<?php echo "http://local:8080/sandbox-ecommerce/products/buy/" . $product['id'] ?>><button class="product-page-button">Saiba Mais</button></a>
    </div>

<?php endforeach ?>

<?php if (isset($viewData['total_pages'])) for ($index = 1; $index <= $viewData['total_pages']; $index++) : ?>
    <a href=<?php echo "?page=" . $index ?>><?php echo $index ?></a>
<?php endfor ?>