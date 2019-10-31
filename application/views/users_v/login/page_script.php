<script src="<?php echo base_url("assets/"); ?>vendors/js/base/jquery.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>vendors/js/base/core.min.js"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="<?php echo base_url("assets/"); ?>vendors/js/app/app.min.js"></script>
<!-- End Page Vendor Js -->
<script src="<?php echo base_url("assets/"); ?>js/md5.min.js"></script>
<script type="text/javascript">
	function formSubmit(){
		var user_email = document.getElementById("user_email").value;
		var user_password = md5(document.getElementById("user_password").value);
		var jsonObjects = [{email:user_email, password:user_password}];
		jQuery.ajax({
			url: "<?php echo base_url("apiCustom"); ?>",
			data: {user: JSON.stringify(jsonObjects) },
			type: "POST",
			success: function(data){
				window.location.href = "<?php echo base_url(); ?>"
			},
			error: function (){}
		});
		return true;
	}
</script>