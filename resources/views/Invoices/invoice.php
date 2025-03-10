<?php

echo 'Invoices Receipt';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices</title>
</head>
<body>
    <h1>Invoices Receipt</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Invoice-Number #</th>
                <th scope="col">Amount</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($invoices)): ?>
                <?php foreach($invoices as $invoice): ?>
                    <tr>
                        <td><?= htmlspecialchars($invoice['invoice_number']) ?></td>
                        <td><?= number_format($invoice['amount'], 2) ?></td>
                        <td><?= htmlspecialchars($invoice['invoice_status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No invoices found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

