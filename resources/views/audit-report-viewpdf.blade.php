<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Viewer</title>
</head>

<body>
    {{-- <h1>Report {{ $audit->report_path }}</h1> --}}
    <embed src="https://www.aeee.in/wp-content/uploads/2020/08/Sample-pdf.pdf" type="application/pdf" width="100%" height="600px" />
</body>

</html>

<script>
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });

    document.addEventListener('selectstart', function(e) {
        e.preventDefault();
    });

    document.addEventListener('keydown', function(event) {
        if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'p') {
            event.preventDefault();
        }
        else if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 's') {
            event.preventDefault();
        } else if (event.key === 'S' && event.shiftKey && event.metaKey) {
            event.preventDefault();
        }
        else if (event.code === 'PrintScreen') {
            event.preventDefault();
        }
    });
</script>
