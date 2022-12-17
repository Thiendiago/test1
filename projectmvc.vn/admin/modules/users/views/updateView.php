<?php
get_header('users');
?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?mod=users&action=add" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <?php
        get_sidebar('users');
        ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" action="">
                        <label for="display-name">Tên hiển thị</label>
                        <input type="text" name="display_name" id="display-name" value="">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="" class="read-only" placeholder="" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" value="">
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"></textarea>
                        <button type="submit" name="btn_update_info_account" id="btn-submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer('users');
?>