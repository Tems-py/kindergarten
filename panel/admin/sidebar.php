<?php
function sidebar(): void
{
    $admin = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $admin = explode("admin", $admin);
    $admin = $admin[0]."admin";
    $s = "
    <div id='sidebar'>
                <span></span>
                <a href='$admin/create_child'>Add new child</a>
                <a href='$admin/edit_child'>Edit child</a>
                <a href='$admin/delete_child'>Delete child</a>
                <span></span>
                <a href='$admin/edit_account'>Edit account</a>
                <a href='$admin/delete_account'>Delete account</a>
                <span></span>
                <a href='$admin/create_group'>Add new group</a>
                <a href='$admin/edit_group'>Edit group</a>
                <a href='$admin/delete_group'>Delete group</a>
                <span></span>
                <a href='$admin/add_payment'>Request payment</a>
                <a href='$admin/payments'>View payments</a>
    </div>
    ";
    echo $s;
}