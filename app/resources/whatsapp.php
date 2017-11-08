<?php

require '../controllers/LinkController.php';

// required varible
$type   = "wa";
$slug   = $_GET['query'];

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

include "partial/header.php";

?>


<!-- redirect true -->
<?php if ($redirect == "true") { ?>

	<div class="container">
		<div class="redirect-box col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="redirect-title">Whatsapp Redirect</div>
			<div class="card wa-top-border">
				<div class="card-body">

					<div class="loader-content">
						<div class="initial-loading-wrapper">
							<div>
								<div class="initial-loading-spinner"></div>
							</div>
						</div>
					</div>

					<div class="message">
						<p>
							Halaman ini akan secara otomatis mengarahkan anda ke id
							<b><?php echo $id_number; ?></b> melalui aplikasi Whatsapp
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>

<!-- redirect false -->
<?php } else { ?>

	<div class="container-fluid head-bg wa-head-bg"></div>
	<div class="container">
		<!-- <div class="click-box col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2"> -->
			<div class="click-box col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="card">
				<div class="card-heading">
					<div class="panel-title">Kontak Whatsapp</div>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="name" class="control-label">Phone Number</label>
					   	<div class="input-group">
			               	<input type="text" class="form-control input" id="input-id" value="<?php echo $id_number ?>">
			               	<span class="input-group-btn">
			                  	<button class="btn btn-default" type="button" id="button-clipboard" data-clipboard-target="#input-id">
			                     	<i class="fa fa-clone" aria-hidden="true"></i>
			                  	</button>
			               	</span>
			            </div>
					</div>

					<div class="form-group">
						<label for="name" class="control-label">Message</label>
		               	<textarea class="form-control input all-input-link valid" type="text" name="message" rows="7" id="input-message" aria-invalid="false">
		               		<?php echo $message ?>
		               	</textarea>
					</div>

					<div class="form-group">
						<button class="btn btn-default btn-md btn-block btn-wa" id="click-type-button">Buka Whatsapp</button>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	
<?php } ?>

	<div id="link" 
		 data-redirect="<?php echo $redirect;?>"
		 data-number="<?php echo $id_number; ?>"
		 data-platform="<?php echo $type; ?>"
		 data-pixel="<?php echo $pixel_id;?>"
		 data-pageevent="<?php echo $page_event;?>"
		 data-buttonevent="<?php echo $button_event; ?>"
	></div>

<?php include "partial/footer.php"; ?>
