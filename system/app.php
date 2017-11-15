<?php

// inititalize data
$key = $object->data;

// set redirect 
$redirect  = $key->redirect;

// set id_number/phonenumber
$id_number = $key->data->no;

// set message
$message   = $key->data->message;

// set pixel id
$pixel_id  = $key->pixel_ids[0]->id;

// set page event
$page_event = $key->pixel_events->page[0];

// set button event
$button_event = $key->pixel_events->button[0];

// set var for type
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

// call view layout
include __DIR__ . "/../view/layout.php";

?>
