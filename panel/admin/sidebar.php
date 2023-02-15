<?php
function sidebar(){
    $s = <<< EOD
    <div id="sidebar">
                <a href="./create_child">Add new child</a>
                <a href="./edit_child">Edit child</a>
                <a href="./edit_parent">Edit parent</a>
                <a href="./create_group">Add new group</a>
    </div>
    EOD;
    echo $s;
}