<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ตรวจสอบว่ามีการส่งข้อมูลมาจากฟอร์มแก้ไขหรือไม่
    if (isset($_POST['imageData'])) {
        // รับข้อมูลภาพและขนาดใหม่จากแบบฟอร์ม
        $imageData = $_POST['imageData'];
        // ทำการตัดอัปโหลดข้อมูลของรูปภาพ
        $exploded = explode(',', $imageData);
        $encoded = $exploded[1];
        $decoded = base64_decode($encoded);
        // สร้างชื่อไฟล์ใหม่ที่ไม่ซ้ำกัน
        $filename = 'upload/' . uniqid() . '.jpg';
        // บันทึกไฟล์ภาพที่แก้ไขลงในโฟลเดอร์ upload ด้วยชื่อไฟล์ที่สร้างขึ้นใหม่
        file_put_contents($filename, $decoded);
        echo "Saved successfully!";
    } else {
        echo "Error: No image data received.";
    }
} else {
    echo "Error: Invalid request method.";
}
?>
