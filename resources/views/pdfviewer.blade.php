<!DOCTYPE html>
<html lang="en">
<head>
    <title>PDF Preview</title>
</head>
<body>
    <iframe 
        src="data:application/pdf;base64,{{ $base64Pdf }}" 
        width="100%" 
        height="1000px"
        style="border: none;">
    </iframe>
</body>
</html>