<?php
get_header()  ;
?>
<?php
$info_cat_mobile = db_fetch_row("SELECT * FROM `tbl_list_cart` where `id` = 1");
$info_cat_macbook = db_fetch_row("SELECT * FROM `tbl_list_cart` where `id` = 2");
$list_mobile = db_fetch_array("SELECT * FROM `tbl_list_product` where `cat_id` = 1");
$list_macbook = db_fetch_array("SELECT * FROM `tbl_list_product` where `cat_id` = 2");
// show_array($info_cat_mobile);

?>
<div id="main-content-wp" class="home-page">
<?php
get_sidebar()   
?>
        <div id="content" class="fl-right">
            <div class="section list-cat">
                <div class="section-head">
                    <a class="section-title" href="<?php echo $info_cat_mobile['url']?>"><?php echo $info_cat_mobile['cat_title']?></a>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <?php
                        foreach($list_mobile as $item){
                            ?>
                        
                        <li>
                            <a href="?mod=product&action=detail&id=<?php echo $item['id']?>" title="" class="thumb">
                                <img src="<?php echo $item['product_thumb']?>" alt="">
                            </a>
                            <a href="?mod=product&action=detail&id=<?php echo $item['id']?> " title="" class="title"><?php echo $item['product_title']?></a>
                            <p class="price"><?php echo currency_format($item['price'])?></p>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title"><?php echo $info_cat_macbook['cat_title']?></h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                    <?php
                        foreach($list_macbook as $item){
                            ?>
                        
                        <li>
                            <a href="?mod=product&action=detail&id=<?php echo $item['id']?>" title="" class="thumb">
                                <img src="<?php echo $item['product_thumb']?>" alt="">
                            </a>
                            <a href="?mod=product&action=detail&id=<?php echo $item['id']?>" title="" class="title"><?php echo $item['product_title']?></a>
                            <p class="price"><?php echo currency_format($item['price'])?></p>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="section list-cat">
                <div class="section-head">
                    <h3 class="section-title">Máy tính bảng</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-product.png" alt="">
                            </a>
                            <a href="?page=detail_product" title="" class="title">Lenovo IdeaPad 100S</a>
                            <p class="price">5.000.000đ</p>
                        </li>
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-product.png" alt="">
                            </a>
                            <a href="?page=detail_product" title="" class="title">Lenovo IdeaPad 100S</a>
                            <p class="price">5.000.000đ</p>
                        </li>
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-product.png" alt="">
                            </a>
                            <a href="?page=detail_product" title="" class="title">Lenovo IdeaPad 100S</a>
                            <p class="price">5.000.000đ</p>
                        </li>
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-product.png" alt="">
                            </a>
                            <a href="?page=detail_product" title="" class="title">Lenovo IdeaPad 100S</a>
                            <p class="price">5.000.000đ</p>
                        </li>
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-product.png" alt="">
                            </a>
                            <a href="?page=detail_product" title="" class="title">Lenovo IdeaPad 100S</a>
                            <p class="price">5.000.000đ</p>
                        </li>
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-product.png" alt="">
                            </a>
                            <a href="?page=detail_product" title="" class="title">Lenovo IdeaPad 100S</a>
                            <p class="price">5.000.000đ</p>
                        </li>
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-product.png" alt="">
                            </a>
                            <a href="" title="" class="title">Lenovo IdeaPad 100S</a>
                            <p class="price">5.000.000đ</p>
                        </li>
                        <li>
                            <a href="?page=detail_product" title="" class="thumb">
                                <img src="public/images/img-product.png" alt="">
                            </a>
                            <a href="" title="" class="title">Lenovo IdeaPad 100S</a>
                            <p class="price">5.000.000đ</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer()
?>