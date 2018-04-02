<!DOCTYPE html>
<html>
<head>
	<title>Currency</title>
</head>
<body>
	<form method="GET" action="?r=/"> <input type="submit" value="Back"></form>

	Exchange for <?php  echo $currency->date; ?>
		
	<table border="1">
		<thead>
			<tr>
				<th>Base Currency</th>
				<th>Foreighn Currency</th>
				<th>SaleRateNB</th>
				<th>PurchaseRateNB</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($currency->exchangeRate as $value) { ?>
			<tr>
				<td> <?php echo $value->baseCurrency; ?> </td>
				<td> <?php echo $value->currency; ?> </td>
				<td> <?php echo $value->saleRateNB; ?> </td>
				<td> <?php echo $value->purchaseRateNB; ?> </td>

			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>