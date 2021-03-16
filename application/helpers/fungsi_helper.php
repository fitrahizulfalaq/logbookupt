<?php

function check_already_login() {
	$ci =& get_instance();
	$user_session = $ci->session->userdata('username');
	if ($user_session) {
		redirect('dashboard');
	}
}

function check_not_login() {
	$ci =& get_instance();
	$user_session = $ci->session->userdata('username');
	if (!$user_session) {
		redirect('auth/login');
	}
}

function check_super_user($tipe_user, $previllage) {	
	if ($tipe_user < $previllage) {
		redirect('auth/login');
	}
}

function check_right_user($id_login, $user_id) {	
	$ci =& get_instance();
	if ($id_login != $user_id) {
		$ci->session->set_flashdata('warning','Hanya bisa mengedit yang miliknya');
		redirect('dashboard');
	}
}

function check_right_user_edit($id_edit, $user_id) {	
	$ci =& get_instance();
	if ($id_edit != $user_id) {
		$ci->session->set_flashdata('danger','Hanya bisa mengedit yang miliknya');
		redirect('dashboard');
	}
}

?>