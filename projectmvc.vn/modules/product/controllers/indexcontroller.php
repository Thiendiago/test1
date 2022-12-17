<?php
function construct(){
    load_model('index');
}
function indexAction(){
    // echo "hien thi danh sach";
     load_view('index');

}
function mainAction(){
    // echo "hien thi danh sach";
     load_view('index');

}
function detailAction(){
    // echo "hien thi danh sach";
     load_view('detail');

}

function addAction(){

$id = (int)$_GET['id'];
add_cart($id);
header("location: ?mod=cart&action=show");
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

}
function showAction(){
    // echo "hien thi danh sach";
     load_view('show');

}

function updateAction(){
   var_dump($_POST);
      $id = $_POST['id'];
    //   echo $id;
    // echo "hien thi danh sach";
    //  load_view('index');
    

}