วิธีใช้งานระบบอัพโหลด
หากใช้ xamp ให้ทำตามขั้นตอนนี้ก่อนใช้งาน import tutorial.sqlที่เป็น database เข้า phpmyadmin
อัพเดตไฟล์ config.php ตรง host username password database ถ้าต้องการเปลี่ยนไปใช้ชื่ออื่น
ย้ายไฟล์ php.ini ไปไว้ใน floder php
ในตัวอย่างนี้ใช้ host localhost username root password 1234 database tutorial
ต่อมาถ้าจะเปลี่ยน password ให้เป็น 1234 แล้วเจอปัญหาทำตามขั้นตอนนี้ คำเตือนให้ทำขั้นตอนนี้ก่อนแล้วค่อยเปลี่ยน password
เข้า floder php หาไฟล์ที่ชื่อ config.inc.php
หลังจากเข้ามาแล้วให้เปลี่ยนค่าตามนี้ cfg['Servers'][$i]['auth_type'] = 'config'; เปลี่ยนเป็น $cfg['Servers'][$i]['auth_type'] = 'cookie'; 
$cfg['Servers'][$i]['AllowNoPassword'] = true; เปลี่ยนเป็น $cfg['Servers'][$i]['AllowNoPassword'] = false;
แค่เปลี่ยนค่าข้างในจาก config เป็น cookie และจาก true เป็น false ไม่ต้องไปสนใจก่อนหน้า
จากนั้น login ด้วย user root password เว้นว่างไว้กด go แล้วไปหา user root กด change password เป็น 1234 แล้วเริ่มทำตามขั้นตอนนี้
1. แตกไฟล์ clips.zipให้เรียบร้อยก่อน
2. ย้าย floder clipsไปไว้ใน floder htdocs
3. เข้า browser พิมพ์ localhost/clips/index.html จะมีปุ่มให้คลิกเพื่อขยายเมนู
4. หลังจากเมนูขึ้นมาแล้วเลือกเมนูเข้าสู่ระบบอัพโหลดคลิปวิดีโอประชาสัมพันธ์มหาวิทยาลัย
5. กดปุ่มเพื่ออัพโหลดคลิป จะมีหน้าต่างโผล่ขึ้นมาให้เลือกคลิปที่เป็น mp4
6. หลังจากเลือกคลิปแล้วกดปุ่ม upload ถ้าอัพโหลดสำเร็จจะมีข้อความขึ้นว่า Upload successfully.
8. ถ้าต้องการเล่นคลิปกดปุ่มเพื่อขยายเมนู จากนั้นเข้าไปที่เมนูแสดงวิดีโอประชาสัมพันธ์มหาวิทยาลัย
9. จะมีปุ่มเล่นและปุ่มตั้งค่าวิดีโอขึ้นมา ชื่อคลิปจะอยู่ข้างล่างปุ่ม show more media controls