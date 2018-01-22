<?php
	ob_start();
	$this->load->view('aheader_view');
	$this->load->view($content_view);
	$this->load->view('afooter_view');
?>