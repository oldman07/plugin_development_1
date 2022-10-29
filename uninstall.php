<?php
defined ('ABSPATH')|| die("canot acess directly");

function pwspk_register_uninstall_hook(){
    delete_option('updated_title');
}