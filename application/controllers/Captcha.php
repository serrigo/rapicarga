<?php

class Captcha extends CI_Controller {

function __construct() {
	parent::__construct();
	$this->load->helper('url');
	$this->load->helper('captcha');
	
}

// valida captcha
public function validateCaptcha($key,$value) {
	
		if (strcasecmp($key, $value) == 0) {
			return '1';
		} else {
			return '0';
		}
}

// genera captcha.
public function captcha_setting(){
	try {
		$values = array(
				'word' => '',
					'word_length' => 4,
					'img_path' => './captcha/',
					'img_url' => base_url() .'captcha/',
					'font_path' => base_url() . 'system/fonts/texb.ttf',
					'img_width' => '150',
					'img_height' => 50,
					'expiration' => 1200
		);
		$data = create_captcha($values);
		$_SESSION['captchaWord'] = $data['word'];
		return $data;
	} catch (Exception $e) {
		return $e;
	}

}

// refresca captcha.
public function captcha_refresh(){
	$values = array(
	'word' => '',
	'word_length' => 4,
	'img_path' => './captcha/',
	'img_url' => base_url() .'captcha/',
	'font_path' => base_url() . 'system/fonts/texb.ttf',
	'img_width' => '150',
	'img_height' => 50,
	'expiration' => 1200
	);
	$data = create_captcha($values);
	$_SESSION['captchaWord'] = $data['word'];
	return $data['image'];

}
}
?>


