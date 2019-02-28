<?php 
if($this->session->userdata('opcc_adminid')){
    include_once('admin_default.php');
}else{
    include_once('front_default.php');
}
//if($this->session->userdata('opc_adminid')){
//    include_once('admin_default.php');
//}
//else if($this->session->userdata('opc_userid')){
//    include_once('front_default.php');
//}

?>