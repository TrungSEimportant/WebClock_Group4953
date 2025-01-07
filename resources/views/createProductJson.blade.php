<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Product code</title>

	<!-- Load font awesome icons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
	 crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/home_products.css">

	<script src="/server-serve-products-data.js"></script>
	<script src="js/classes.js"></script>
	<script src="js/dungchung.js"></script>

	<style>
		* {
			outline: none;
			font-family: sans-serif;
		}

		table {
			padding: 5px 3px;
			border : 1px solid #333;
			margin: 10px auto;
		}
		td {
			padding: 5px 3px;
			border-bottom: 1pt solid #333;
		}
		input {
			padding: 5px 3px;
			height: 26px;
			font-size: 20px;
		}
		button {
			border-radius: 10px;
			margin: 10px auto;
			font-size: 20px;
			padding: 10px 5px;
			border: none;
			cursor: pointer;
			background: #487;
		}
		button:hover {
			background: #4a7;
		}
		textarea {
			padding: 5px 3px;
			font-size: 16px;
		}
		.homeproduct li {
			width: 250px;
		}
	</style>

	<script>
		// Thêm sản phẩm vào trang
		function addProduct(p, id) {
			promo = new Promo(p.promo.name, p.promo.value); // class Promo
			product = new Product(p.img, p.name, p.price, p.star, p.rateCount, promo); // Class product
			addToWeb(product, id);
		}
		function getResult() {
			var name = document.getElementById('name').value;
			var company = document.getElementById('company').value;
			var img = document.getElementById('img').value;
			var price = document.getElementById('price').value;
			var star = document.getElementById('star').value || 0;
			var rateCount = document.getElementById('rateCount').value || 0;
			var promoName = document.getElementById('promoName').value;
			var promoValue = document.getElementById('promoValue').value;

			if(img.indexOf('http') < 0) {
				img = "img/products/"+ img;
			}
return {
	"name": name,
	"company": company,
	"img": img,
	"price": price,
	"star": star,
	"rateCount": rateCount,
	"promo": {
		"name": promoName,
		"value": promoValue
	}
};
		}

		function saveToDatabase() {
			var r = getResult();
			if(!r.name || !r.price) {
				alert('No name or price has been entered yet');
				return;
			}

			addProduct(r, 'products');
			var textarea = document.getElementById('t_a');
			if(textarea.innerHTML == '')
				textarea.innerHTML += JSON.stringify(r, null, "\t");
			else textarea.innerHTML += ',\n'+JSON.stringify(r, null, "\t");
		}

		function valueChange() {
			document.getElementById('live').innerHTML = '';
			addProduct(getResult(), 'live');
		}

		window.onload = function() {
			var inp = document.getElementsByTagName('input');
			for(var i = 0; i < inp.length; i++) {
				inp[i].onkeyup = valueChange;
			}
			document.getElementById('company').onchange = valueChange;
		}
	</script>

</head>

<body>
	<table>
		<tr>
			<td>
				<table cellpadding="7">
					<tr>
						<td>Product Name:</td>
						<td><input id="name" type="text" onchange=""></td>
					</tr>
					<tr>
						<td>Brand Name:</td>
						<td>
							<select name="" id="company">
								<option value="Apple">Apple</option>
								<option value="Samsung">Samsung</option>
								<option value="Oppo">Oppo</option>
								<option value="Nokia">Nokia</option>
								<option value="Huawei">Huawei</option>
								<option value="Xiaomi">Xiaomi</option>
								<option value="Realme">Realme</option>
								<option value="Vivo">Vivo</option>
								<option value="Philips">Philips</option>
								<option value="Mobell">Mobell</option>
								<option value="Mobiistar">Mobiistar</option>
								<option value="Itel">Itel</option>
								<option value="Coolpad">Coolpad</option>
								<option value="HTC">HTC</option>
								<option value="Motorola">Motorola</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>File Image name</td>
						<td><input id="img" type="text"></td>
					</tr>
					<tr>
						<td>Price:</td>
						<td><input id="price" type="text"></td>
					</tr>
					<tr>
						<td>Rating (How many stars):</td>
						<td><input id="star" type="text"></td>
					</tr>
					<tr>
						<td>Number of reviews:</td>
						<td><input id="rateCount" type="text"></td>
					</tr>
					<tr>
						<td>Promotion:</td>
						<td>
							<select name="km" id="promoName" onchange="valueChange()">
								<option value="">No promotion</option>
								<option value="tragop">Installment</option>
								<option value="giamgia">Discount</option>
								<option value="moiramat">Newly released</option>
								<option value="giareonline">Cheap prices online</option>
							</select>

						</td>
					</tr>
					<tr>
						<td>Promotional value:</td>
						<td><input id="promoValue" type="text"></td>
					</tr>
				</table>
			</td>

			<td>
				<ul class="homeproduct group flexContain" id="live"></ul>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<button onclick="saveToDatabase()">Save to database</button>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<ul class="homeproduct" id="products"></ul>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<p>Result of Database:</p>
				<textarea rows="13" cols="70" id="t_a"></textarea>
			</td>
		</tr>
	</table>

</body>

</html>
