<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
}

function indexAction() {
    load('helper','format');
    $list_users = get_list_users();
//    show_array($list_users);
    $data['list_users'] = $list_users;
    load_view('index', $data);
}


function addAction() {
    $id = (int)$_GET['id'];
    add_cart($id);
    unset($_SESSION);
    header("location: ?mod=cart&action=show");
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
}
function showAction() {
    load_view('show');
}
function deleteAction() {
    $id = (int)$_GET['id'];
    delete_cart($id);
    header("location: ?mod=cart&action=show");
}
function delete_allAction() {
    delete_cart();
header('location: ?mod=cart&action=show');
}
function editAction() {
    $id = (int)$_GET['id'];
    $item = get_user_by_id($id);
    show_array($item);
}
