<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zzz</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            color: #212529;
        }
        
        .upload-container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
            padding: 24px;
            width: 90%;
            max-width: 600px;
        }
        
        h1 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 6px;
            color: #212529;
        }
        
        .description {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 20px;
            font-weight: 400;
        }
        
        .upload-area {
            border: 1px dashed #dee2e6;
            border-radius: 4px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
            background-color: #ffffff;
        }
        
        .upload-area:hover {
            border-color: #adb5bd;
            background-color: #f8f9fa;
        }
        
        .upload-area.drag-active {
            border-color: #6c757d;
            background-color: #f1f3f5;
        }
        
        .upload-icon {
            width: 24px;
            height: 24px;
            margin-bottom: 12px;
            color: #212529;
            transition: transform 0.3s ease;
        }
        
        .upload-area:hover .upload-icon {
            transform: translateY(-3px);
        }
        
        .upload-text {
            font-size: 15px;
            font-weight: 500;
            margin-bottom: 6px;
            color: #212529;
        }
        
        .upload-formats {
            font-size: 13px;
            color: #6c757d;
            font-weight: 400;
        }
        
        .file-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
            font-size: 13px;
            color: #6c757d;
        }
        
        .button-group {
            display: flex;
            gap: 8px;
        }
        
        .btn {
            border-radius: 4px;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.15s ease;
            font-family: 'Inter', sans-serif;
        }
        
        .btn-clear {
            background: #ffffff;
            border: 1px solid #dee2e6;
            color: #212529;
        }
        
        .btn-clear:hover {
            background-color: #f8f9fa;
            border-color: #ced4da;
        }
        
        .btn-upload {
            background-color: #212529;
            color: white;
            border: 1px solid #212529;
        }
        
        .btn-upload:hover {
            background-color: #343a40;
            border-color: #343a40;
        }
        
        .btn-upload:disabled {
            background-color: #495057;
            border-color: #495057;
            cursor: not-allowed;
            opacity: 0.65;
        }
        
        #fileInput {
            display: none;
        }
        
        .preview-area {
            display: none;
            margin-top: 16px;
            animation: fadeIn 0.3s ease;
            text-align: center;
        }
        
        .preview-container {
            display: inline-block;
            max-width: 100%;
            max-height: 200px;
            overflow: hidden;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        
        .preview-image {
            display: block;
            max-width: 100%;
            max-height: 200px;
            object-fit: contain;
        }
        
        .link-area {
            display: none;
            margin-top: 16px;
            padding: 12px;
            background-color: #f8f9fa;
            border-radius: 4px;
            border: 1px solid #dee2e6;
            animation: fadeIn 0.3s ease;
        }
        
        .link-title {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            color: #212529;
        }
        
        .link-container {
            display: flex;
            align-items: center;
        }
        
        .link-url {
            flex-grow: 1;
            font-size: 13px;
            color: #0d6efd;
            text-decoration: none;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding-right: 10px;
        }
        
        .copy-btn {
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 4px 8px;
            font-size: 12px;
            cursor: pointer;
        }
        
        .copy-btn:hover {
            background-color: #f8f9fa;
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(33, 37, 41, 0.4);
            }
            70% {
                box-shadow: 0 0 0 5px rgba(33, 37, 41, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(33, 37, 41, 0);
            }
        }
        
        .btn-upload:not(:disabled):active {
            animation: pulse 0.3s;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <h1>Zzz</h1>
        <p class="description">Select an image to upload. Supported formats: JPG, PNG, GIF, WebP.</p>
        
        <div class="upload-area" id="uploadArea">
            <svg class="upload-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="17 8 12 3 7 8"></polyline>
                <line x1="12" y1="3" x2="12" y2="15"></line>
            </svg>
            <p class="upload-text">Drag & drop or click to upload</p>
            <p class="upload-formats">JPG, PNG, GIF, WebP up to 10MB</p>
            <input type="file" id="fileInput" accept=".jpg,.jpeg,.png,.gif,.webp">
        </div>
        
        <div class="preview-area" id="previewArea">
            <div class="preview-container">
                <img class="preview-image" id="previewImage" src="" alt="Preview">
            </div>
        </div>
        
        <div class="link-area" id="linkArea">
            <p class="link-title">Image Link:</p>
            <div class="link-container">
                <a href="#" class="link-url" id="imageLink" target="_blank"></a>
                <button class="copy-btn" id="copyBtn">Copy</button>
            </div>
        </div>
        
        <div class="file-info">
            <span>Max file size: 10MB</span>
            <div class="button-group">
                <button class="btn btn-clear" id="clearBtn">Clear</button>
                <button class="btn btn-upload" id="uploadBtn" disabled>Upload</button>
            </div>
        </div>
    </div>

    <script>
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const previewArea = document.getElementById('previewArea');
        const previewImage = document.getElementById('previewImage');
        const uploadBtn = document.getElementById('uploadBtn');
        const clearBtn = document.getElementById('clearBtn');
        const linkArea = document.getElementById('linkArea');
        const imageLink = document.getElementById('imageLink');
        const copyBtn = document.getElementById('copyBtn');

        uploadArea.addEventListener('click', () => fileInput.click());

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            uploadArea.classList.add('drag-active');
        }

        function unhighlight() {
            uploadArea.classList.remove('drag-active');
        }

        uploadArea.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            if (files.length > 0) {
                fileInput.files = files;
                handleFileSelect();
            }
        }

        fileInput.addEventListener('change', handleFileSelect);

        function handleFileSelect() {
            const file = fileInput.files[0];
            if (file) {
                if (file.size > 10 * 1024 * 1024) {
                    alert('File size exceeds 10MB limit');
                    clearFile();
                    return;
                }
                
                if (file.type.match('image.*')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewArea.style.display = 'block';
                        uploadBtn.disabled = false;
                        linkArea.style.display = 'none';
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('Please select an image file (JPG, PNG, GIF, WebP)');
                    clearFile();
                }
            }
        }
        
        clearBtn.addEventListener('click', clearFile);
        
        function clearFile() {
            fileInput.value = '';
            previewArea.style.display = 'none';
            linkArea.style.display = 'none';
            uploadBtn.disabled = true;
        }
        
        uploadBtn.addEventListener('click', uploadFile);
        
        function uploadFile() {
            const formData = new FormData();
            formData.append('image', fileInput.files[0]);

            uploadBtn.disabled = true;
            uploadBtn.textContent = 'Uploading...';

            fetch('upload.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    imageLink.href = data.link;
                    imageLink.textContent = data.shortLink;
                    linkArea.style.display = 'block';
                } else {
                    alert(`Error: ${data.error}`);
                }
                uploadBtn.textContent = 'Upload';
                uploadBtn.disabled = false;
            })
            .catch(error => {
                alert(`Error: ${error}`);
                uploadBtn.textContent = 'Upload';
                uploadBtn.disabled = false;
            });
        }
        
        copyBtn.addEventListener('click', () => {
            navigator.clipboard.writeText(imageLink.href)
                .then(() => {
                    const originalText = copyBtn.textContent;
                    copyBtn.textContent = 'Copied!';
                    setTimeout(() => {
                        copyBtn.textContent = originalText;
                    }, 2000);
                })
                .catch(err => {
                    console.error('Failed to copy: ', err);
                });
        });
    </script>
</body>
</html>