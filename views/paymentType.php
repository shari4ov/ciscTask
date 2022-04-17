<?php
include_once "header.php";
?>
	<div class="container">
		<div class="container-fluid d-flex flex-column align-items-center justify-content-center">
			<h3 class="text-center d-inline-block p-2 mt-5">Ödəniş növünü əlavə edin</h3>
			<div class="form-group">
				<form method="post" id="paymentForm">
					<select class="form-select form-control" name="type" id="selection">
						<option >Ödəniş növünü seçin</option>
						<option value="Nəğd">Nəğd</option>
						<option value="Kart">Kart</option>
					</select>
					<div class="d-flex justify-content-center">
						<button type="submit" class="btn btn-success mt-3" name="insert">Əlavə et</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function (){
			$('#paymentForm').on('submit',function (e){
				e.preventDefault();
				$.ajax({
					url: "<?php echo base_url().'savePaymentType/saveData'?>",
					type: "POST",
					data: {'name': $('#selection').val()},
					success:function (){
						console.log("Success");
					}
				})
			})
		});
	</script>
</body>
</html>
