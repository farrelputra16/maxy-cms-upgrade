@extends('layout.main-v3')

@section('title', 'Edit Certificate Template')

@section('styles')
    <link
        href="https://fonts.googleapis.com/css2?family=Arial&family=Courier+New&family=Inter&family=Jakarta+Sans&family=Montserrat&family=Poppins&family=Playfair+Display&family=Times+New+Roman&display=swap"
        rel="stylesheet">

    <!-- Optional Styles for Alignment and Spacing -->
    <style>
        #certificateCanvas {
            max-width: 100%;
            background-color: #f8f9fa;
        }

        .gap-2>* {
            margin: 0.25rem 0;
        }
    </style>
@endsection

@section('content')
    <!-- Start Page Title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Overview</h4>

                <!-- Start Breadcrumb -->
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Master</a></li>
                        <li class="breadcrumb-item active">Course</li>
                    </ol>
                </div>
                <!-- End Breadcrumb -->
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Start Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Course</h4>
                    <p class="card-title-desc">
                        This page shows the list of courses. Courses will be used as the <b>default template</b> of a class.
                        You can create a new course or edit the contents of an existing course. Within course, there will be
                        <b>parent course modules</b> which represents as the <b>meeting counts</b> or <b>days</b> inside the
                        course.
                    </p>


                    <div class="form-group mb-3">
                        <label for="uploadImage" class="form-label">Upload a Background Image</label>
                        <input class="form-control" type="file" id="uploadImage" accept="image/*" />
                    </div>


                    <!-- Font Controls Row -->
                    <div class="row mb-3 d-flex">
                        <!-- Font Size Control -->
                        <div class="col-md-4">
                            <label for="fontSizeInput" class="form-label">Font Size</label>
                            <input type="number" id="fontSizeInput" class="form-control" value="24" min="8"
                                max="72">
                        </div>

                        <!-- Font Family Control -->
                        <div class="col-md-4">
                            <label for="fontFamilySelect" class="form-label">Font Style</label>
                            <select id="fontFamilySelect" class="form-control">
                                <option value="Arial">Arial</option>
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Courier New">Courier New</option>
                                <option value="Poppins">Poppins</option>
                            </select>
                        </div>

                        <!-- Font Color Control -->
                        <div class="col-md-4">
                            <label for="fontColorInput" class="form-label">Font Color</label>
                            <input type="color" id="fontColorInput" class="form-control" value="#000000">
                        </div>
                    </div>

                    <div class="row mb-3 d-flex">

                        <!-- Font Weight Control -->
                        <div class="col-md-4">
                            <label for="fontWeightSelect" class="form-label">Font Weight</label>
                            <select id="fontWeightSelect" class="form-control">
                                <option value="normal">Normal</option>
                                <option value="bold">Bold</option>
                                <!-- <option value="lighter">Light</option>
                                                                                                                                                                                                                <option value="100">100</option>
                                                                                                                                                                                                                <option value="200">200</option>
                                                                                                                                                                                                                <option value="300">300</option>
                                                                                                                                                                                                                <option value="400">400</option>
                                                                                                                                                                                                                <option value="500">500</option>
                                                                                                                                                                                                                <option value="600">600</option>
                                                                                                                                                                                                                <option value="700">700</option>
                                                                                                                                                                                                                <option value="800">800</option>
                                                                                                                                                                                                                <option value="900">900</option> -->
                            </select>
                        </div>

                        <!-- Italic Control -->
                        <div class="col-md-4 d-flex flex-column">
                            <label for="italicCheckbox" class="form-label me-2">Italic</label>
                            <input type="checkbox" id="italicCheckbox" class="form-check-input">
                        </div>

                        <!-- Underline Control -->
                        <div class="col-md-4 d-flex flex-column">
                            <label for="underlineCheckbox" class="form-label me-2">Underline</label>
                            <input type="checkbox" id="underlineCheckbox" class="form-check-input">
                        </div>
                    </div>

                    <div class="reminder-text">
                        <p class="mt-3 text-danger">
                            *<b>Certificate Number, Name,</b> and <b>Content</b> will be automatically adjusted to the
                            center of the
                            certificate horizontally.
                        </p>
                    </div>
                    <!-- End Background Selection Form -->

                    <!-- Start Row -->
                    <div class="row w-100">
                        <!-- Left Column: Controls -->
                        <div class="col-md-4">
                            <!-- Action Buttons -->
                            <div class="d-flex flex-column gap-2">
                                <button id="addNameText" class="btn btn-secondary">Add Name</button>
                                <button id="adduuidText" class="btn btn-secondary">Add Certificate Number</button>
                                <button id="addmain_contentText" class="btn btn-secondary">Add Content Text</button>

                                <!--
                                                                                <button id="addtanda_tangan_1Text" class="btn btn-secondary">Tambah Tanda Tangan 1 Image</button>
                                                                                <button id="addtanda_tangan_2Text" class="btn btn-secondary">Tambah Tanda Tangan 2 Image</button>
                                                                                <button id="addtanda_tangan_3Text" class="btn btn-secondary">Tambah Tanda Tangan 3 Image</button>
                                                                                <button id="addnama_penandatangan_1Text" class="btn btn-secondary">Tambah Nama Penandatangan 1 Text</button>
                                                                                <button id="addnama_penandatangan_2Text" class="btn btn-secondary">Tambah Nama Penandatangan 2 Text</button>
                                                                                <button id="addnama_penandatangan_3Text" class="btn btn-secondary">Tambah Nama Penandatangan 3 Text</button>
                                                                            -->

                                <!-- Delete and Save Buttons -->
                                <button id="deleteText" class="btn btn-danger mt-3">Delete Selected Item</button>
                                <button id="saveButton" class="btn btn-primary mt-2">Save Template</button>
                            </div>

                        </div>

                        <!-- Start Right Column: Canvas Area -->
                        <div class="col-md-8">

                            <!-- Canvas Area -->
                            <div id="canvas-container"
                                style="width: 100%; max-width: 800px; margin: auto; position: relative; overflow: hidden;">
                                <canvas id="certificateCanvas" class="border rounded shadow"
                                    style="width: 100% !important; height: auto !important;"></canvas>
                            </div>
                        </div>
                        <!-- End Right Column: Canvas Area -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/4.5.0/fabric.min.js"></script>

    <script>
        // Flags for tracking added text elements
        let nameTextAdded = false;
        let main_contentTextAdded = false;
        let uuidTextAdded = false;
        let tanda_tangan_1TextAdded = false;
        let tanda_tangan_2TextAdded = false;
        let tanda_tangan_3TextAdded = false;
        let nama_penandatangan_1TextAdded = false;
        let nama_penandatangan_2TextAdded = false;
        let nama_penandatangan_3TextAdded = false;

        document.addEventListener('DOMContentLoaded', () => {
            const classId = {{ $classId }};

            // Initialize Fabric.js canvas
            const canvas = new fabric.Canvas('certificateCanvas');

            const container = document.getElementById('canvas-container');

            // Initial canvas dimensions
            let originalWidth = 800; // Base width for scaling
            let originalHeight = 600; // Base height for scaling
            let scaleFactor = 1; // Scaling factor for objects

            // Initial resize
            resizeCanvas();

            // Initialize additional guideline snaps
            initCenteringGuidelines(canvas);
            initAligningGuidelines(canvas);

            // Resize the canvas when the window is resized
            window.addEventListener('resize', resizeCanvas);

            // Pass existing template data from PHP to JavaScript
            const existingTemplateData = {!! json_encode($existingTemplateData) !!}; // PHP variable to JavaScript

            if (existingTemplateData) {
                // Load the existing template data into the canvas
                canvas.loadFromJSON(existingTemplateData, () => {

                    canvas.renderAll(); // Ensure the canvas is re-rendered after loading

                    // Scale objects based on current canvas size
                    canvas.getObjects().forEach(obj => {
                        obj.originalScaleX = obj.scaleX;
                        obj.originalScaleY = obj.scaleY;
                        obj.originalLeft = obj.left;
                        obj.originalTop = obj.top;

                        obj.scaleX *= scaleFactor;
                        obj.scaleY *= scaleFactor;
                        obj.left *= scaleFactor;
                        obj.top *= scaleFactor;
                        obj.setCoords();
                    });

                    // Check if there's a background image in the template data
                    const backgroundImage = existingTemplateData.backgroundImage;

                    if (backgroundImage) { // if background image is set in the template
                        fabric.Image.fromURL(backgroundImage, (img) => {
                            const imgWidth = img.width;
                            const imgHeight = img.height;
                            const scaleFactor = Math.max(canvas.getWidth() / imgWidth, canvas
                                .getHeight() / imgHeight);

                            img.set({
                                scaleX: scaleFactor,
                                scaleY: scaleFactor,
                                originX: 'center',
                                originY: 'center',
                                left: canvas.getWidth() / 2,
                                top: canvas.getHeight() / 2,
                                selectable: false,
                            });

                            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
                        });
                    } else { // if no background image is set in the template
                        const imageUrl =
                            "{{ asset('img/placeholder-image.jpg') }}";

                        fabric.Image.fromURL(imageUrl, (img) => {
                            // Get original image dimensions
                            const imgWidth = img.width;
                            const imgHeight = img.height;

                            // Calculate scale factor to fit width or height while maintaining aspect ratio
                            const scaleFactor = Math.max(canvas.getWidth() / imgWidth, canvas
                                .getHeight() /
                                imgHeight);

                            img.set({
                                scaleX: scaleFactor,
                                scaleY: scaleFactor,
                                originX: 'center',
                                originY: 'center',
                                left: canvas.getWidth() / 2,
                                top: canvas.getHeight() / 2,
                                selectable: false,
                            });

                            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
                        });

                    }
                    console.log('Existing template data loaded successfully.');
                });
            } else { // if there's no existing template data

                // Set default background image on canvas when dropdown changes
                const imageUrl = "{{ asset('img/placeholder-image.jpg') }}";

                if (imageUrl) {
                    // Clear current background and load selected image
                    canvas.setBackgroundImage(null, canvas.renderAll.bind(canvas));

                    fabric.Image.fromURL(imageUrl, (img) => {
                        // Get original image dimensions
                        const imgWidth = img.width;
                        const imgHeight = img.height;

                        // Calculate scale factor to fit width or height while maintaining aspect ratio
                        const scaleFactor = Math.max(canvas.getWidth() / imgWidth, canvas.getHeight() /
                            imgHeight);

                        img.set({
                            scaleX: scaleFactor,
                            scaleY: scaleFactor,
                            originX: 'center',
                            originY: 'center',
                            left: canvas.getWidth() / 2,
                            top: canvas.getHeight() / 2,
                            selectable: false,
                        });

                        canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
                    });
                }
            }

            document.getElementById('uploadImage').addEventListener('change', function(event) {
                const file = event.target.files[0]; // Get the uploaded file
                if (!file) return; // Exit if no file is selected

                const formData = new FormData();
                formData.append('backgroundImage', file);
                formData.append('classId', classId)

                // Send the file to the server
                fetch('{{ route('certificate.set-bg-image') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const imageUrl = data.imageUrl; // Relative path to the uploaded image
                            fabric.Image.fromURL(imageUrl, (img) => {
                                // Calculate scale factor to fit the image within the canvas
                                const imgWidth = img.width;
                                const imgHeight = img.height;
                                const scaleFactor = Math.max(canvas.getWidth() / imgWidth,
                                    canvas.getHeight() / imgHeight);

                                // Set the image properties
                                img.set({
                                    scaleX: scaleFactor,
                                    scaleY: scaleFactor,
                                    originX: 'center',
                                    originY: 'center',
                                    left: canvas.getWidth() / 2,
                                    top: canvas.getHeight() / 2,
                                    selectable: false, // Prevent the background from being selected or moved
                                });

                                // Set the image as the canvas background
                                canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
                            });
                        } else {
                            alert('Failed to upload image.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while uploading the image.');
                    });
            });

            // Apply font size changes
            document.getElementById('fontSizeInput').addEventListener('change', function() {
                const activeObject = canvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('fontSize', parseInt(this.value, 10));
                    canvas.renderAll();
                }
            });

            // Apply font family changes
            document.getElementById('fontFamilySelect').addEventListener('change', function() {
                const activeObject = canvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('fontFamily', this.value);
                    canvas.renderAll();
                }
            });

            // Apply font color changes
            document.getElementById('fontColorInput').addEventListener('change', function() {
                const activeObject = canvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('fill', this.value);
                    canvas.renderAll();
                }
            });

            // Apply font weight changes
            document.getElementById('fontWeightSelect').addEventListener('change', function() {
                const activeObject = canvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('fontWeight', this.value);
                    canvas.renderAll();
                }
            });

            const italicCheckbox = document.getElementById('italicCheckbox');

            // Apply italic style changes
            italicCheckbox.addEventListener('change', function() {
                const activeObject = canvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('fontStyle', this.checked ? 'italic' : 'normal');
                    canvas.renderAll();
                }
            });

            // Update checkbox state when object selection changes
            canvas.on('selection:updated', updateItalicCheckbox);
            canvas.on('selection:created', updateItalicCheckbox);
            canvas.on('selection:cleared', () => italicCheckbox.checked = false);

            // Apply underline style changes
            document.getElementById('underlineCheckbox').addEventListener('change', function() {
                const activeObject = canvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    activeObject.set('underline', this.checked);
                    canvas.renderAll();
                }
            });

            // Update checkbox state when object selection changes
            canvas.on('selection:updated', updateUnderlineCheckbox);
            canvas.on('selection:created', updateUnderlineCheckbox);
            canvas.on('selection:cleared', () => underlineCheckbox.checked = false);

            document.getElementById('addNameText').addEventListener('click', () => nameTextAdded = addText(
                'addNameText', 'Andy Febrico Bintoro', 100, 100, nameTextAdded));
            document.getElementById('adduuidText').addEventListener('click', () =>
                uuidTextAdded = addText('adduuidText', 'b2595e9d5aa0b6f0be8f792ac7b8547a', 450, 100,
                    uuidTextAdded));
            document.getElementById('addmain_contentText').addEventListener('click', () => {
                main_contentTextAdded = addText(
                    'addmain_contentText',
                    'Congratulations for completing your course. Keep it up!',
                    150, 100,
                    main_contentTextAdded,
                    'center' // Menambahkan alignment center
                );
            });

            // Delete selected text
            document.getElementById('deleteText').addEventListener('click', () => {
                const activeObject = canvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    canvas.remove(activeObject);
                    canvas.discardActiveObject();
                    canvas.renderAll();
                } else {
                    alert('Please select a text object to delete.');
                }
            });

            // Save canvas as JSON
            document.getElementById('saveButton').addEventListener('click', () => {
                const backgroundImage = canvas.backgroundImage?.src ||
                    null; // Get the background image path
                const templateData = JSON.stringify(canvas.toJSON());

                fetch('{{ route('certificate.save') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            templateData,
                            backgroundImage,
                            classId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: data.message || 'Template saved successfully!',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect to the template list page after closing the success popup
                                window.location.href =
                                    '{{ route('getCourseClass') }}';
                            }
                        });
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred while saving the template.',
                            confirmButtonText: 'OK'
                        });
                        console.error('Error:', error);
                    });
            });

            // --- Functions ---
            function updateItalicCheckbox() {
                const activeObject = canvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    italicCheckbox.checked = activeObject.fontStyle === 'italic';
                } else {
                    italicCheckbox.checked = false;
                }
            }

            function updateUnderlineCheckbox() {
                const activeObject = canvas.getActiveObject();
                if (activeObject && activeObject.type === 'text') {
                    underlineCheckbox.checked = activeObject.fontStyle === 'underline';
                } else {
                    underlineCheckbox.checked = false;
                }
            }

            // Add Text to Fabric Canvas
            function addText(id, label, top, left, flag) {
                if (!flag) {
                    const text = new fabric.Text(label, {
                        left: left,
                        top: top,
                        fill: '#000000',
                        fontSize: 24,
                        selectable: true
                    });
                    canvas.add(text);
                    canvas.renderAll();
                    return true; // flag updated
                } else {
                    alert(`You can only add one ${label} Text.`);
                    return false;
                }
            }

            function addText(buttonId, text, x, y, existingText, textAlign = 'center') {
                if (existingText) return; // Jika teks sudah ada, tidak menambahkan lagi

                const contentText = new fabric.Text(text, {
                    left: x,
                    top: y,
                    fontSize: 20,
                    fontFamily: 'Arial',
                    textAlign: textAlign
                });

                canvas.add(contentText);
                canvas.renderAll();
                return contentText;
            }

            // Function to resize the canvas
            function resizeCanvas() {
                // Get the container's width
                const containerWidth = container.clientWidth;

                // Calculate the new canvas dimensions while maintaining aspect ratio
                const newWidth = containerWidth;
                const newHeight = (originalHeight / originalWidth) * newWidth;

                // Update the canvas dimensions
                canvas.setWidth(newWidth);
                canvas.setHeight(newHeight);

                // Calculate the scaling factor
                scaleFactor = newWidth / originalWidth;

                // Scale all objects on the canvas
                canvas.getObjects().forEach(obj => {
                    obj.scaleX = (obj.originalScaleX || obj.scaleX) * scaleFactor;
                    obj.scaleY = (obj.originalScaleY || obj.scaleY) * scaleFactor;
                    obj.left = (obj.originalLeft || obj.left) * scaleFactor;
                    obj.top = (obj.originalTop || obj.top) * scaleFactor;
                    obj.setCoords(); // Update object coordinates
                });

                // Re-render the canvas
                canvas.renderAll();
            }

            // Function to add centering guidelines
            function initCenteringGuidelines(canvas) {

                var canvasWidth = canvas.getWidth(),
                    canvasHeight = canvas.getHeight(),
                    canvasWidthCenter = canvasWidth / 2,
                    canvasHeightCenter = canvasHeight / 2,
                    canvasWidthCenterMap = {},
                    canvasHeightCenterMap = {},
                    centerLineMargin = 4,
                    centerLineColor = 'rgba(255,0,241,0.5)',
                    centerLineWidth = 1,
                    ctx = canvas.getSelectionContext(),
                    viewportTransform;

                for (var i = canvasWidthCenter - centerLineMargin, len = canvasWidthCenter + centerLineMargin; i <=
                    len; i++) {
                    canvasWidthCenterMap[Math.round(i)] = true;
                }
                for (var i = canvasHeightCenter - centerLineMargin, len = canvasHeightCenter +
                        centerLineMargin; i <= len; i++) {
                    canvasHeightCenterMap[Math.round(i)] = true;
                }

                function showVerticalCenterLine() {
                    showCenterLine(canvasWidthCenter + 0.5, 0, canvasWidthCenter + 0.5, canvasHeight);
                }

                function showHorizontalCenterLine() {
                    showCenterLine(0, canvasHeightCenter + 0.5, canvasWidth, canvasHeightCenter + 0.5);
                }

                function showCenterLine(x1, y1, x2, y2) {
                    ctx.save();
                    ctx.strokeStyle = centerLineColor;
                    ctx.lineWidth = centerLineWidth;
                    ctx.beginPath();
                    ctx.moveTo(x1 * viewportTransform[0], y1 * viewportTransform[3]);
                    ctx.lineTo(x2 * viewportTransform[0], y2 * viewportTransform[3]);
                    ctx.stroke();
                    ctx.restore();
                }

                var afterRenderActions = [],
                    isInVerticalCenter,
                    isInHorizontalCenter;

                canvas.on('mouse:down', function() {
                    viewportTransform = canvas.viewportTransform;
                });

                canvas.on('object:moving', function(e) {
                    var object = e.target,
                        objectCenter = object.getCenterPoint(),
                        transform = canvas._currentTransform;

                    if (!transform) return;

                    isInVerticalCenter = Math.round(objectCenter.x) in canvasWidthCenterMap,
                        isInHorizontalCenter = Math.round(objectCenter.y) in canvasHeightCenterMap;

                    if (isInHorizontalCenter || isInVerticalCenter) {
                        object.setPositionByOrigin(new fabric.Point((isInVerticalCenter ?
                            canvasWidthCenter : objectCenter.x), (isInHorizontalCenter ?
                            canvasHeightCenter : objectCenter.y)), 'center', 'center');
                    }
                });

                canvas.on('before:render', function() {
                    canvas.clearContext(canvas.contextTop);
                });

                canvas.on('after:render', function() {
                    if (isInVerticalCenter) {
                        showVerticalCenterLine();
                    }
                    if (isInHorizontalCenter) {
                        showHorizontalCenterLine();
                    }
                });

                canvas.on('mouse:up', function() {
                    // clear these values, to stop drawing guidelines once mouse is up
                    isInVerticalCenter = isInHorizontalCenter = null;
                    canvas.renderAll();
                });
            }

            // Function to add object align guidelines
            function initAligningGuidelines(canvas) {

                var ctx = canvas.getSelectionContext(),
                    aligningLineOffset = 5,
                    aligningLineMargin = 4,
                    aligningLineWidth = 1,
                    aligningLineColor = 'rgb(0,255,0)',
                    viewportTransform,
                    zoom = 1;

                function drawVerticalLine(coords) {
                    drawLine(
                        coords.x + 0.5,
                        coords.y1 > coords.y2 ? coords.y2 : coords.y1,
                        coords.x + 0.5,
                        coords.y2 > coords.y1 ? coords.y2 : coords.y1);
                }

                function drawHorizontalLine(coords) {
                    drawLine(
                        coords.x1 > coords.x2 ? coords.x2 : coords.x1,
                        coords.y + 0.5,
                        coords.x2 > coords.x1 ? coords.x2 : coords.x1,
                        coords.y + 0.5);
                }

                function drawLine(x1, y1, x2, y2) {
                    ctx.save();
                    ctx.lineWidth = aligningLineWidth;
                    ctx.strokeStyle = aligningLineColor;
                    ctx.beginPath();
                    ctx.moveTo(((x1 + viewportTransform[4]) * zoom), ((y1 + viewportTransform[5]) * zoom));
                    ctx.lineTo(((x2 + viewportTransform[4]) * zoom), ((y2 + viewportTransform[5]) * zoom));
                    ctx.stroke();
                    ctx.restore();
                }

                function isInRange(value1, value2) {
                    value1 = Math.round(value1);
                    value2 = Math.round(value2);
                    for (var i = value1 - aligningLineMargin, len = value1 + aligningLineMargin; i <= len; i++) {
                        if (i === value2) {
                            return true;
                        }
                    }
                    return false;
                }

                var verticalLines = [],
                    horizontalLines = [];

                canvas.on('mouse:down', function() {
                    viewportTransform = canvas.viewportTransform;
                    zoom = canvas.getZoom();
                });

                canvas.on('object:moving', function(e) {

                    var activeObject = e.target,
                        canvasObjects = canvas.getObjects(),
                        activeObjectCenter = activeObject.getCenterPoint(),
                        activeObjectLeft = activeObjectCenter.x,
                        activeObjectTop = activeObjectCenter.y,
                        activeObjectBoundingRect = activeObject.getBoundingRect(),
                        activeObjectHeight = activeObjectBoundingRect.height / viewportTransform[3],
                        activeObjectWidth = activeObjectBoundingRect.width / viewportTransform[0],
                        horizontalInTheRange = false,
                        verticalInTheRange = false,
                        transform = canvas._currentTransform;

                    if (!transform) return;

                    // It should be trivial to DRY this up by encapsulating (repeating) creation of x1, x2, y1, and y2 into functions,
                    // but we're not doing it here for perf. reasons -- as this a function that's invoked on every mouse move

                    for (var i = canvasObjects.length; i--;) {

                        if (canvasObjects[i] === activeObject) continue;

                        var objectCenter = canvasObjects[i].getCenterPoint(),
                            objectLeft = objectCenter.x,
                            objectTop = objectCenter.y,
                            objectBoundingRect = canvasObjects[i].getBoundingRect(),
                            objectHeight = objectBoundingRect.height / viewportTransform[3],
                            objectWidth = objectBoundingRect.width / viewportTransform[0];

                        // snap by the horizontal center line
                        if (isInRange(objectLeft, activeObjectLeft)) {
                            verticalInTheRange = true;
                            verticalLines.push({
                                x: objectLeft,
                                y1: (objectTop < activeObjectTop) ?
                                    (objectTop - objectHeight / 2 - aligningLineOffset) : (
                                        objectTop + objectHeight / 2 + aligningLineOffset),
                                y2: (activeObjectTop > objectTop) ?
                                    (activeObjectTop + activeObjectHeight / 2 +
                                        aligningLineOffset) : (activeObjectTop -
                                        activeObjectHeight / 2 - aligningLineOffset)
                            });
                            activeObject.setPositionByOrigin(new fabric.Point(objectLeft, activeObjectTop),
                                'center', 'center');
                        }

                        // snap by the left edge
                        if (isInRange(objectLeft - objectWidth / 2, activeObjectLeft - activeObjectWidth /
                                2)) {
                            verticalInTheRange = true;
                            verticalLines.push({
                                x: objectLeft - objectWidth / 2,
                                y1: (objectTop < activeObjectTop) ?
                                    (objectTop - objectHeight / 2 - aligningLineOffset) : (
                                        objectTop + objectHeight / 2 + aligningLineOffset),
                                y2: (activeObjectTop > objectTop) ?
                                    (activeObjectTop + activeObjectHeight / 2 +
                                        aligningLineOffset) : (activeObjectTop -
                                        activeObjectHeight / 2 - aligningLineOffset)
                            });
                            activeObject.setPositionByOrigin(new fabric.Point(objectLeft - objectWidth / 2 +
                                activeObjectWidth / 2, activeObjectTop), 'center', 'center');
                        }

                        // snap by the right edge
                        if (isInRange(objectLeft + objectWidth / 2, activeObjectLeft + activeObjectWidth /
                                2)) {
                            verticalInTheRange = true;
                            verticalLines.push({
                                x: objectLeft + objectWidth / 2,
                                y1: (objectTop < activeObjectTop) ?
                                    (objectTop - objectHeight / 2 - aligningLineOffset) : (
                                        objectTop + objectHeight / 2 + aligningLineOffset),
                                y2: (activeObjectTop > objectTop) ?
                                    (activeObjectTop + activeObjectHeight / 2 +
                                        aligningLineOffset) : (activeObjectTop -
                                        activeObjectHeight / 2 - aligningLineOffset)
                            });
                            activeObject.setPositionByOrigin(new fabric.Point(objectLeft + objectWidth / 2 -
                                activeObjectWidth / 2, activeObjectTop), 'center', 'center');
                        }

                        // snap by the vertical center line
                        if (isInRange(objectTop, activeObjectTop)) {
                            horizontalInTheRange = true;
                            horizontalLines.push({
                                y: objectTop,
                                x1: (objectLeft < activeObjectLeft) ?
                                    (objectLeft - objectWidth / 2 - aligningLineOffset) : (
                                        objectLeft + objectWidth / 2 + aligningLineOffset),
                                x2: (activeObjectLeft > objectLeft) ?
                                    (activeObjectLeft + activeObjectWidth / 2 +
                                        aligningLineOffset) : (activeObjectLeft -
                                        activeObjectWidth / 2 - aligningLineOffset)
                            });
                            activeObject.setPositionByOrigin(new fabric.Point(activeObjectLeft, objectTop),
                                'center', 'center');
                        }

                        // snap by the top edge
                        if (isInRange(objectTop - objectHeight / 2, activeObjectTop - activeObjectHeight /
                                2)) {
                            horizontalInTheRange = true;
                            horizontalLines.push({
                                y: objectTop - objectHeight / 2,
                                x1: (objectLeft < activeObjectLeft) ?
                                    (objectLeft - objectWidth / 2 - aligningLineOffset) : (
                                        objectLeft + objectWidth / 2 + aligningLineOffset),
                                x2: (activeObjectLeft > objectLeft) ?
                                    (activeObjectLeft + activeObjectWidth / 2 +
                                        aligningLineOffset) : (activeObjectLeft -
                                        activeObjectWidth / 2 - aligningLineOffset)
                            });
                            activeObject.setPositionByOrigin(new fabric.Point(activeObjectLeft, objectTop -
                                objectHeight / 2 + activeObjectHeight / 2), 'center', 'center');
                        }

                        // snap by the bottom edge
                        if (isInRange(objectTop + objectHeight / 2, activeObjectTop + activeObjectHeight /
                                2)) {
                            horizontalInTheRange = true;
                            horizontalLines.push({
                                y: objectTop + objectHeight / 2,
                                x1: (objectLeft < activeObjectLeft) ?
                                    (objectLeft - objectWidth / 2 - aligningLineOffset) : (
                                        objectLeft + objectWidth / 2 + aligningLineOffset),
                                x2: (activeObjectLeft > objectLeft) ?
                                    (activeObjectLeft + activeObjectWidth / 2 +
                                        aligningLineOffset) : (activeObjectLeft -
                                        activeObjectWidth / 2 - aligningLineOffset)
                            });
                            activeObject.setPositionByOrigin(new fabric.Point(activeObjectLeft, objectTop +
                                objectHeight / 2 - activeObjectHeight / 2), 'center', 'center');
                        }
                    }

                    if (!horizontalInTheRange) {
                        horizontalLines.length = 0;
                    }

                    if (!verticalInTheRange) {
                        verticalLines.length = 0;
                    }
                });

                canvas.on('before:render', function() {
                    canvas.clearContext(canvas.contextTop);
                });

                canvas.on('after:render', function() {
                    for (var i = verticalLines.length; i--;) {
                        drawVerticalLine(verticalLines[i]);
                    }
                    for (var i = horizontalLines.length; i--;) {
                        drawHorizontalLine(horizontalLines[i]);
                    }

                    verticalLines.length = horizontalLines.length = 0;
                });

                canvas.on('mouse:up', function() {
                    verticalLines.length = horizontalLines.length = 0;
                    canvas.renderAll();
                });
            }
        });
    </script>
@endsection
