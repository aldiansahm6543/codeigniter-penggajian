<?php 
function view($view_path, $newdata = null)
{
    $CI = &get_instance();
    return $CI->load->view($view_path, $newdata);

}

function rupiah($angka){
	
	$hasil_rupiah = number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}