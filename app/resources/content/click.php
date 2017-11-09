<div class="container-fluid head-bg <?php echo $class_prefix;?>-head-bg"></div>
	<div class="container">
		<!-- <div class="click-box col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2"> -->
			<div class="click-box col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="card">
				<div class="card-heading">
					<div class="panel-title"><?php echo $panel_title;?></div>
				</div>
				<div class="card-body">
					<div class="form-group">
						<label for="name" class="control-label"><?php echo $label_id_number;?></label>
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
						<button class="btn btn-default btn-md btn-block btn-wa" id="click-type-button">
							Buka <?php echo $panel_title;?>
						</button>
					</div>
					
				</div>
			</div>
		</div>
	</div>