<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Editor</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
       #imageContainer {
        margin-top: 20px;
        text-align: center; /* จัดให้อยู่กึ่งกลางตามแนวนอน */
    }

    #uploadedImage {
        max-width: 100%; /* กำหนดให้ภาพไม่เกินขอบเขตของ div */
        max-height: 400px; /* กำหนดความสูงสูงสุดของภาพ */
        border-radius: 5px; /* เพิ่มขอบมนเข้าไปให้กับภาพ */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* เพิ่มเงาใต้ภาพ */
    }

        #editForm {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }
        .loading-spinner {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        margin: 0 auto;
        margin-top: 20px;
        }

        @keyframes spin {
        0% { transform: rotate(0deg); }
        
        100% { transform: rotate(3600deg); }
        }
        #loading {
        position: fixed; /* ตำแหน่งแบบแนวตั้งและแนวนอนจะถูกตรวจสอบจาก top และ left */
        top: 50%; /* ตำแหน่งที่ 50% ของความสูงของหน้าจอ */
        left: 50%; /* ตำแหน่งที่ 50% ของความกว้างของหน้าจอ */
        transform: translate(-50%, -50%); /* เพื่อย้าย loadingspinner ไปที่ตำแหน่งกึ่งกลางของหน้าจอ */
}
    </style>
</head>
<body>
    <form id="myForm">
    <div id="editForm" class="container mt-4" data-aos="fade-up">
        <div class="row">
            <div class="col-md-6">
                <label for="widthInput">Width:</label>
                <input type="number" id="widthInput" class="form-control"><br>
            </div>
            <div class="col-md-6">
                <label for="heightInput">Height:</label>
                <input type="number" id="heightInput" class="form-control"><br>
            </div>
            <div class="col-md-12">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fileInput">
                    <label class="custom-file-label" for="fileInput">Choose file</label>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <button onclick="saveChanges()" type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        <div id="imageContainer">
        <img id="uploadedImage" src="<?php echo $filename; ?>" alt="Uploaded Image">
        </div>
    </div>
    </form>
    <div id="loading" class="text-center" style="display: none;">
    <div class="loading-spinner"></div>
    <p>กำลังประมวลผล...</p>
    </div>
    <script src="script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <script>
    document.querySelector('#myForm').addEventListener('submit', function(event) {
        event.preventDefault(); // ป้องกันการส่งฟอร์มเนื่องจากการรีเฟรชหน้า
        document.getElementById('loading').style.display = 'block'; // แสดง loading spinner
        setTimeout(function() {
            document.getElementById('loading').style.display = 'none'; // ซ่อน loading spinner หลังจาก 2.5 วินาที
        }, 2500);
    });
</script>
</body>
</html>
