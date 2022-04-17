<?php
include_once "header.php" ;
?>

<div class="container">
	<div class="container-fluid d-flex flex-column align-items-center justify-content-center mt-3">
		<h3>Ödənişi daxil edin</h3>
			<form method="post" id="paymentForm" class="form-outline">
				<div class="justify-content-center align-items-center">
					<div class="mt-5">
						<div class="w-100">
							<label for="price" class="form-label">Məbləğ</label>
							<input type="number" name="price" class="form-control" id="price" required>
						</div>
					</div>
					<div class="mt-3">
						<div class="w-100">
							<label>Kateqoriya</label>
							<select class="form-select" name="type" required>
								<option selected>Ödəniş kateqoriyası</option>
								<option value="Nəğd">Nəğd</option>
								<option value="Kart">Kart</option>
							</select>
						</div>
					</div>
					<div class="mt-3">
						<div class="w-100">
							<label class="form-label">Valyuta</label>
							<input type="text" name="currency" class="form-control" required>
						</div>
					</div>
					<div class="mt-3">
						<div class="w-100">
							<label class="form-label">Ödəniş növü</label>
							<select class="form-select" name="category" required>
								<option value="Mədaxil">Mədaxil</option>
								<option value="Məxaric">Məxaric</option>
							</select>
						</div>
					</div>
					<div class="mt-3">
						<div class="w-100 form-group">
							<label class="form-label">Rəy</label>
							<textarea class="form-control" name="review" ></textarea>
						</div>
					</div>
					<div class="mt-3 d-flex justify-content-center">
						<button class="btn btn-primary">Daxil edin</button>
					</div>
				</div>
			</form>
	</div>
</div>
<script>
	$(document).ready(function (){
		$('#paymentForm').on('submit',function (e){
			e.preventDefault();
			$.ajax({
				url: "<?php echo base_url().'savePayment/savePayment'?>",
				type: "POST",
				data:  $('#paymentForm').serialize(),
				success:function (res){
					console.log("Success");
				}
			})
		})
	});
</script>
</body>
</html>
