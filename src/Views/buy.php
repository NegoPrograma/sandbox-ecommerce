
<div class="product-container">
<div class="product-container-left">
    <h1 class="product-header"><?php echo $viewData['product']['name']?></h1>
    <img class="product-buy-image" src=<?php echo "../../assets/images/uploads/".$viewData['product']['image_path']?> alt="Imagem indisponível!">
</div>
<div class="product-container-right">
    <p class="product-price"><?php echo $viewData['product']['price']?></p>
    <input type="number"  id="quantity">
    <button class="add-to-cart-button" data-id=<?php echo $viewData['product']['id']?>>Adicionar ao Carrinho</button>
</div>
    
</div>

<script src="../../assets/js/add-to-cart.js"></script>