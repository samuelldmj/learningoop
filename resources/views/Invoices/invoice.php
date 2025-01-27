<?php

echo 'Invoices Receipt';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Invoice #</th>
      <th scope="col">Amount</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php foreach($invoices as $invoice): ?>
      <th scope="row"><?= $invoice->invoice_number  ?></th>
      <td><?= number_format($invoice->amount, 2) ?></td>
      <td><?= $invoice->invoice_status ?></td>
      <?php endforeach ?>
    </tr>
  </tbody>
</table>
</body>
</html>

