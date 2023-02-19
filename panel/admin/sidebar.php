<?php
function sidebar(){
    $admin = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $admin = explode("admin", $admin);
    $admin = $admin[0]."admin";
    $s = "
    <div id='sidebar'>
                <a href='$admin/create_child'>Add new child</a>
                <a href='$admin/edit_child'>Edit child</a>
                <a href='$admin/edit_parent'>Edit parent</a>
                <a href='$admin/create_group'>Add new group</a>
                <a href='$admin/edit_group'>Edit group</a>
                
    </div>
    ";
    echo $s;
}