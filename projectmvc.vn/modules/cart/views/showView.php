<?php
get_header()  ; 
?>
<?php
$product = get_list_buy_cart();
// show_array($_SESSION);



?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <h3 class="title">Giỏ hàng</h3>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <?php
        if(!empty($product)){
            ?>
             <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <form action="?mod=cart&act=update" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($product as $item){
                            ?>
                        
                        <tr>
                            <td><?php echo $item['code'] ?></td>
                            <td>
                                <a href="" title="" class="thumb">
                                    <img src="<?php echo $item['product_thumb'] ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo $item['url'] ?>" title="<?php echo $item['product_title'] ?>  " class="name-product"><?php echo $item['product_title'] ?></a>
                            </td>
                            <td><?php echo currency_format($item['price']) ?></td>
                            <td>
                                <input type="number" min="1" max="10" data-id="<?php echo $item['id']?>" name="qty[<?php echo $item['id']?>]" value="<?php echo $item['qty'] ?>" class="num_order">
                            </td>
                            <td id="sub-total-<?php echo $item['id']?>"><?php echo currency_format($item['sub_total']) ?></td>
                            <td>
                                <a href="<?php echo $item['url_delete_cart']?>" title="xoá sản phẩm" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span><?php echo currency_format($_SESSION['cart']['infor']['total']);?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <input type="submit" id="update-cart" name="btn_update" value="cập nhật giỏ hàng">
                                        <!-- <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a> -->
                                        <a href="?mod=cart&act=checkout" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            </form>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="?mod=cart&action=delete_all" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
            <?php
        }else{
            ?>
            <p>khong co san pham nao trong gio hang</p>
            <?php
        }
        ?>
       
    </div>
</div>
<?php
get_footer();
?>