<?php include './modules/header.php'; ?>
<?php include './modules/show_obj.php'; ?>
<script>
    // Generate QR code for each row in the table
    var rows = document.querySelectorAll('tbody tr');
    rows.forEach(function (row) {
        var text = row.cells[0].innerText + ' - ' + row.cells[1].innerText + ' - ' + row.cells[2].innerText+ ' - ' + row.cells[3].innerText; // Combine cell values
        var qrCode = document.createElement('img');
        qrCode.src = 'https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=' + text;
        row.appendChild(qrCode);
    });
</script>
<?php include './modules/footer.php'; ?>