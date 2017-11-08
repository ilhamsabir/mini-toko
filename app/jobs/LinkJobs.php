<?php

$base_url = 'http://localhost/toko-link';

// required varible
$type   = $_GET['type'];
$slug   = $_GET['slug'];

// init data controller
$data   = new Data();

// set callback data request
$DOM    = $data->getData($type, $slug);

// decode
$object = json_decode($DOM);

$key = $object->data;

$redirect  = $key->redirect;

$id_number = $key->data->no;

$message   = $key->data->message;

$pixel_id  = $key->pixel_ids[0]->id;

$page_event = $key->pixel_events->page[0];

$button_event = $key->pixel_events->button[0];

switch ($type) {
	case 'wa':
		
		$title           = "Whatsapp";
		$class_prefix    = "wa";
		$panel_title     = "Kontak Whatsapp";
		$label_id_number = "Phone Number";

		break;
	
	case 'sms':
		
		$title           = "SMS";
		$class_prefix    = "sms";
		$panel_title     = "Kontak SMS";
		$label_id_number = "Phone Number";

		break;

	case 'bbm':
		
		$title           = "BBM";
		$class_prefix    = "bbm";
		$panel_title     = "Kontak BBM";
		$label_id_number = "BBM Pin";

		break;

	case 'telegram':
		
		$title           = "Telegram";
		$class_prefix    = "telegram";
		$panel_title     = "Kontak Telegram";
		$label_id_number = "Telegram ID";

		break;
	
	default:
		# code...
		break;
}

?>