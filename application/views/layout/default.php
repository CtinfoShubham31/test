<?php 
//echo $seg = $this->uri->segment('1');
if($this->session->userdata('ks_admin_id') && $this->uri->segment('1') == 'ks_admin'){
    include_once('admin_default.php');
}
else{
    include_once('front_default.php');
}
//if($this->session->userdata('opc_adminid')){
//    include_once('admin_default.php');
//}
//else if($this->session->userdata('opc_userid')){
//    include_once('front_default.php');
//}

?>