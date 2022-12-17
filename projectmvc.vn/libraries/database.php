<?php

// Hàm kết nối dữ liệu
function db_connect() {
    global $conn;
    $db = func_get_arg(0);
    $conn = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['database']);
    if (!$conn) {
        die("Kết nối không thành công ".mysqli_connect_error());
    }
//    mysqli_set_charset($conn, "utf8");
    
}

//Thực thi chuổi truy vấn
function db_query($query_string) {
    global $conn;
    $result = mysqli_query($conn, $query_string);
    if (!$result) {
        db_sql_error('Query Error', $query_string);
    }
    return $result;
}

// Lấy một dòng trong CSDL
function db_fetch_row($query_string) {
    global $conn;
    $result = array();
    $mysqli_result = db_query($query_string);
    $result = mysqli_fetch_assoc($mysqli_result);
    mysqli_free_result($mysqli_result);
    return $result;
}

//Lấy một mảng trong CSDL
function db_fetch_array($query_string) {
    global $conn;
    $result = array();
    $mysqli_result = db_query($query_string);
    while ($row = mysqli_fetch_assoc($mysqli_result)) {
        $result[] = $row;
    }
    mysqli_free_result($mysqli_result);
    return $result;
}
//Lấy số bản ghi
function db_num_rows($query_string) {
    global $conn;
    $mysqli_result = db_query($query_string);
	return mysqli_num_rows($mysqli_result);
}

function db_insert($table, $data) {
    global $conn;
    $fields = "(" . implode(", ", array_keys($data)) . ")";
    $values = "";
    foreach ($data as $field => $value) {
        if ($value === NULL)
            $values .= "NULL, ";
        else
            $values .= "'" . escape_string($value) . "', ";
    }
    $values = substr($values, 0, -2);
    db_query("
            INSERT INTO $table $fields
            VALUES($values)
        ");
    return mysqli_insert_id($conn);
}

function db_update($table, $data, $where) {
    $sql = "";
    foreach ($data as $field => $value) {
        if ($value === NULL)
            $sql .= "$field=NULL, ";
        else
            $sql .= "$field='" . escape_string($value) . "', ";
    }
    $sql = substr($sql, 0, -2);
    db_query("
            UPDATE $table
            SET $sql
            WHERE $where
   ");
    return mysqli_affected_rows($conn);
}

function db_delete($table, $where) {
    global $conn;
    $query_string = "DELETE FROM " . $table . " WHERE $where";
    db_query($query_string);
    return mysqli_affected_rows($conn);
}

function escape_string($str) {
    global $conn;
    return mysqli_real_escape_string($conn, $str);
}

// Hiển thị lỗi SQL

function db_sql_error($message, $query_string = "") {
    global $conn;

    $sqlerror = "<table width='100%' border='1' cellpadding='0' cellspacing='0'>";
    $sqlerror.="<tr><th colspan='2'>{$message}</th></tr>";
    $sqlerror.=($query_string != "") ? "<tr><td nowrap> Query SQL</td><td nowrap>: " . $query_string . "</td></tr>\n" : "";
    $sqlerror.="<tr><td nowrap> Error Number</td><td nowrap>: " . mysqli_errno($conn) . " " . mysqli_error($conn) . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Date</td><td nowrap>: " . date("D, F j, Y H:i:s") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> IP</td><td>: " . getenv("REMOTE_ADDR") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Browser</td><td nowrap>: " . getenv("HTTP_USER_AGENT") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Script</td><td nowrap>: " . getenv("REQUEST_URI") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Referer</td><td nowrap>: " . getenv("HTTP_REFERER") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> PHP Version </td><td>: " . PHP_VERSION . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> OS</td><td>: " . PHP_OS . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Server</td><td>: " . getenv("SERVER_SOFTWARE") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Server Name</td><td>: " . getenv("SERVER_NAME") . "</td></tr>\n";
    $sqlerror.="</table>";
    $msgbox_messages = "<meta http-equiv=\"refresh\" content=\"9999\">\n<table class='smallgrey' cellspacing=1 cellpadding=0>" . $sqlerror . "</table>";
    echo $msgbox_messages;
    exit;
}
function get_product_by_id($id){
    $list_product = db_fetch_array("SELECT * FROM `tbl_list_product` where `id` = $id");
    // $id-=1;
    // show_array($list_product);
    foreach($list_product as $item){
    if(in_array($id, $item)){
        $item['url_add_cart'] = "?mod=cart&action=add&id={$id}";
    $item['url'] = "?mod=product&action=detail&id={$id}";
     return $item;
    } 
    }
    return false;
 }
 function add_cart($id){
    $item = get_product_by_id($id);
    $qty = 1;
 if(isset($_SESSION['cart'])&& array_key_exists($id, $_SESSION['cart']['buy'])){
    $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
 }
    $_SESSION['cart']['buy'][$id] = array(
       'id' => $item['id'],
       'url' => "?mod=product&act=detail&id={$id}",
       'product_title' => $item['product_title'],
       'price' => $item['price'],
       'product_thumb' => $item['product_thumb'],
       'code' => $item['code'],
       'qty' => $qty,
       'sub_total' => $item['price'] * $qty,
    );
    update_infor_cart();
 }
 function update_infor_cart(){
    if(isset($_SESSION['cart'])){
       $num_order =0;
       $total =0;
       foreach($_SESSION['cart']['buy'] as $item){
          $num_order+=$item['qty'];
          $total+=$item['sub_total'];
       };
       $_SESSION['cart']['infor'] = array(
          'num_order' => $num_order,
          'total' => $total,
       );
          }
 };
 
 function get_list_buy_cart(){
    if(isset($_SESSION['cart'])){
       foreach($_SESSION['cart']['buy'] as &$item){
          $item['url_delete_cart'] = "?mod=cart&action=delete&id={$item['id']}";
       }
       return $_SESSION['cart']['buy'];
    }
 };
 function delete_cart($id=""){
    if(isset($_SESSION['cart'])){
       if(!empty($id)){
       unset($_SESSION['cart']['buy'][$id]);
       update_infor_cart();
    }else{
       unset($_SESSION['cart']);
    }
 }
 };
 function update_cart($qty){
    foreach($qty as $id => $item){
       $_SESSION['cart']['buy'][$id]['qty'] = $item;
       $_SESSION['cart']['buy'][$id]['sub_total'] = $_SESSION['cart']['buy'][$id]['price'] * $item;
       update_infor_cart();
    }
    redirect("?mod=cart&act=show");
 }