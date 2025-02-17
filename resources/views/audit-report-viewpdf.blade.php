<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>

<style>
    #pdf-viewer canvas {
        margin-bottom: 10px;
        border: 1px solid #ddd;
    }
</style>

<body>
    {{-- <embed src="{{ url("") }}/{{$audit->report_path}}" type="application/pdf" width="100%" height="600px" /> --}}
    <div id="pdf-viewer" style="width: 100%; height: 95vh; overflow: auto; display: grid; justify-content: center;"></div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script>
    const pdfUrl = `{{ url("") }}/{{$audit->report_path}}`;
    console.log(pdfUrl);
    const pdfViewer = document.getElementById('pdf-viewer');

    const pdfjsLib = window['pdfjs-dist/build/pdf'];

    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

    pdfjsLib.getDocument(pdfUrl).promise.then(pdf => {
        for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
            pdf.getPage(pageNum).then(page => {
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                const viewport = page.getViewport({
                    scale: 1.5
                });

                canvas.width = viewport.width;
                canvas.height = viewport.height;

                pdfViewer.appendChild(canvas);

                page.render({
                    canvasContext: context,
                    viewport: viewport
                });
            });
        }
    }).catch(err => {
        console.error('Error loading PDF:', err);
    });
</script>


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
        } else if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 's') {
            event.preventDefault();
        } else if (event.key === 'S' && event.shiftKey && event.metaKey) {
            event.preventDefault();
        } else if (event.code === 'PrintScreen') {
            event.preventDefault();
        }
    });
</script>
