<!-- Single Product -->
<div class="col-12 col-sm-6 col-lg-4">
    <div class="single-product-wrapper">
    <input type="hidden" id="id" value="<?php echo $item['id']; ?>">
    <!-- Product Image -->
        <div class="product-img">
            <img width="30%" height="35%" src="dash/<?php echo $item['imagen'];?>" class="card-img-top" alt="">
            <!-- Hover Thumb -->
            <!--<img class="hover-img" src="img/product-img/product-2.jpg" alt="">-->
        </div>
            <!-- Product Description -->
            <div class="product-description">
                <span>A2Promo</span>
                <a href="single-product-details.html">
                    <h6 class="fw-bolder"><?php echo $item['nombre']; ?></h6>
                </a>
                <!-- Hover Content -->
                <div class="hover-content">
                    <!-- Add to Cart -->
                    <div class="add-to-cart-btn">
                        <button class="btn essence-btn btn-add">Añadir al carrito</button>
                    </div>
                </div>
            </div>
    </div>
</div>