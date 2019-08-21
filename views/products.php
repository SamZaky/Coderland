
<section class="section">
    <?php foreach ($req_products as $products):?>
        <div class="article">
            <img src="<?= $products['image']; ?>" class="img-product">
            <a href="../public/product?id=<?= $products['id']?>" class="articletitle"> <?= $products['name']; ?></a>
            <!--<p><?= $products['description']; ?></p>-->
        </div>
    <?php endforeach ;?>
</section>