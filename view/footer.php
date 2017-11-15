	<script>
		var data = {
			platform: "<?php echo $type;?>",
			redirect: "<?php echo $redirect;?>",
			idNumber: "<?php echo $id_number;?>",
			pixel: "<?php echo $pixel_id;?>",
			event: {
				page: "<?php echo $page_event;?>",
				button: "<?php echo $button_event;?>",
			}
		};
	</script>

	<!-- scripts -->
	<script  src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>
	<script src="../view/assets/js/main.js"></script>
</body>
</html>