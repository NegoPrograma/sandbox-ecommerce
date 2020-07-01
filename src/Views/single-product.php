<div class="product-container">
    <div class="product-container-left">
        <h1 class="product-header"><?php echo $viewData['product']['name'] ?></h1>
        <img class="product-buy-image" src=<?php echo "http://local:8080/sandbox-ecommerce/assets/images/uploads/" . $viewData['product']['image_path'] ?> alt="Imagem indisponível!">
    </div>
    <div class="product-container-right">
        <p class="product-price"><?php echo $viewData['product']['price'] ?></p>
        <input type="number" id="quantity">
        <button class="add-to-cart-button" data-product-id=<?php echo $viewData['product']['id'] ?>>Adicionar ao Carrinho</button>
    </div>
</div>

<div class="comment-container">
    <?php foreach ($viewData['comments'] as $comment) : ?>
        <h3 style="display:inline-block" class="username" data-user-id=<?php echo $comment['user_id'] ?>>
            <?php echo $comment['name'] ?>
            <?php echo $comment['post_date'] ?>
        </h3>
        <p class="comment" data-comment-id=<?php echo $comment['id'] ?>><?php echo $comment['content'] ?></p>
        <?php if (isset($comment['responses'])) : ?>
            <?php foreach ($comment['responses'] as $response) : ?>

                <h3 style="display:inline-block" class="username" data-user-id=<?php echo $response['user_id'] ?>>
                    <?php echo $response['name'] ?>
                    <?php echo $response['post_date'] ?>
                </h3>
                <p class="comment" ><p>RESPONSEEEEEEE!</p><?php echo $response['content'] ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['login_data'])) : ?>
            <?php if (!empty($_SESSION['login_data']) && $comment['user_id'] == $_SESSION['login_data']['id'] || $_SESSION['login_data']['is_seller']) : ?>

                <form action="http://local:8080/sandbox-ecommerce/comments/postComment" method="post">
                    <input type="text" name="comment" class="comment-input">
                    <input type="hidden" name="comment_id" value=<?php echo $comment['id'] ?>>
                    <button id="submit-comment-button" type="submit">Responder</button>
                </form>
            <?php endif ?>
        <?php endif ?>
        <hr>
    <?php endforeach ?>
</div>

<?php if (isset($_SESSION['login_data']) && !empty($_SESSION['login_data'])) : ?>

    <form action="http://local:8080/sandbox-ecommerce/comments/postComment" method="post">
        <input type="text" name="comment" class="comment-input">
        <button id="submit-comment-button" type="submit">Enviar</button>
    </form>
<?php endif ?>

<script src="../../assets/js/add-to-cart.js"></script>