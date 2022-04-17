<?php
include_once "header.php";
?>
<div class="container">
	<div class="container-fluid d-flex flex-column align-items-center justify-content-center">
		<h3 class="text-center d-inline-block p-2 mt-5">Valyuta əlavə edin</h3>
		<div class="form-group">
			<form method="post" id="currencyForm">
				<input type="text" name="nameCurrency" placeholder="Valyuta vahidi" class="form-control">
				<input type="text" name="fullNameCurrency" placeholder="Valyutanın adı" class="form-control mt-3">
				<div class="d-flex justify-content-center mt-3">
					<button type="submit" class="btn btn-success">Əlavə et</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	$(document).ready(function (){
		$('#currencyForm').on('submit',function (e){
			e.preventDefault();
			$.ajax({
				url: "<?php echo base_url().'saveCurrency/saveCurrency'?>",
				type: "POST",
				data:  $('#currencyForm').serialize(),
				success:function (res){
					console.log("Success");
				}
			})
		})
	});
</script>
</body>
</html>
