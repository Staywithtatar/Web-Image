document.getElementById('fileInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();
    reader.onload = function(e) {
        var img = document.getElementById('uploadedImage');
        img.src = e.target.result;
        img.onload = function() {
            document.getElementById('widthInput').value = img.width;
            document.getElementById('heightInput').value = img.height;
        }
    };
    reader.readAsDataURL(file);
});

function saveChanges() {
    var newWidth = document.getElementById('widthInput').value;
    var newHeight = document.getElementById('heightInput').value;
    var img = document.getElementById('uploadedImage');
    img.style.width = newWidth + 'px';
    img.style.height = newHeight + 'px';
    
    // รับข้อมูลรูปภาพในรูปแบบของ Base64
    var imageData = img.src.split(',')[1];
    
    // ส่งข้อมูลไปยังไฟล์ PHP ด้วย XMLHttpRequest
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save_image.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // แสดงข้อความที่ได้รับจากไฟล์ PHP
            } else {
                console.error('Error:', xhr.status);
            }
        }
    };
    xhr.send("imageData=" + encodeURIComponent(imageData));
}

