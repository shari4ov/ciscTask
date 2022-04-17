<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<title>Document</title>
</head>
<body>
<div class="container mw-100 p-0">
	<div class="container-fluid p-0">
		<nav class="navbar navbar-expand navbar-expand-sm navbar-expand-md p-2 navbar-dark bg-dark">
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link aria-current="page" href="<?php echo base_url(); ?>">Ödəniş növü</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url();?>currency">Valyuta</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url();?>payment">Ödəniş etmək</a>
					</li>
					<li>
						<a class="nav-link" href="<?php echo base_url();?>table">Ödənişlərin siyahısı</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<div class="container mb-5 mt-3 w-50">
	<div class="container-fluid w-50">
		<form class="form-control" id="currencyOptForm">
			<select id="currencyOptions" class="form-select form-control" name="currencyOption">
				<option>Valyuta Növünü seçin</option>
			</select>
		</form>
	</div>
</div>
<div class="container">
	<div class="table-responsive">
		<table id="userData">
			<thead>
				<tr>
					<th>Rəy</th>
					<th>Məxaric</th>
					<th>Mədaxil</th>
					<th>Valyuta</th>
					<th>Qalıq</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
</body>
</html>
<script>

	function myFunc(){
		let dataTable=$('#userData').DataTable({
			"order":[],
			"ajax":{
				url:"<?php echo base_url().'fetchData/fetch_data'?>",
				type:"GET"
			},
			"columns":[
				{data : "review"},
				{data : "withdrawal"},
				{data : "cashin"},
				{data : "currency"}
			]
		});

	}
	myFunc();
	$.ajax({
		url: "<?php echo base_url().'fetchData/fetch_currency' ?>",
		type:"GET",
		success: function (data){
			console.log(data);
			let datas=JSON.parse(data);
			let newArray=[];
			$.each(datas,function (key,value){
				let exists=false;
				$.each(newArray,function (k,val2){
					if(value.name==val2.name){exists=true}
				});
				if(exists==false && value.name!=""){newArray.push(value)}
			})
			$.each(newArray,function (key,name){
				let option=new Option(name['name'],name['name']);
				$(option).html(name['name']);
				$("#currencyOptions").append(option);
			})
		}
	})
	$('#currencyOptions').on('change',function (){
		let matchValue = $(this).val();
		$.ajax({
			url:"<?php echo base_url().'fetchData/fetch_data'?>",
			type:"post",
			data: {
				'currency':matchValue
			},
			success:function(data){
				console.log(data);
			}
		})

	})



</script>
