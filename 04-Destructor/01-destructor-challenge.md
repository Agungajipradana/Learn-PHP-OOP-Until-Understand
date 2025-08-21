# PHP Destructor Challenges

## Easy

1. Buat class `Person` dengan constructor yang menerima `$name`, lalu tampilkan pesan saat object dibuat dan pesan saat object dihancurkan.

   - Output contoh:
     ```
     Object for John created.
     Object for John destroyed.
     ```

2. Buat dua object dari class `Person` (misalnya `"Emma"` dan `"Liam"`) dan perhatikan urutan destructor dipanggil (terbalik dari urutan pembuatan).

3. Buat class `Message` dengan constructor yang menampilkan `"Message created"` dan destructor yang menampilkan `"Message destroyed"`.

---

## Medium

4. Buat class `FileLogger` yang membuka file saat object dibuat, dan menutup file otomatis di destructor.

   - Gunakan method `write($message)` untuk menulis log ke file.

5. Buat class `Database` (simulasi) dengan constructor menampilkan `"Connected to Database"` dan destructor menampilkan `"Database connection closed"`.  
   Tambahkan method `query($sql)` yang menampilkan `"Executing query: {sql}"`.

6. Buat class `Session` dengan constructor yang menampilkan `"Session started for {user}"` dan destructor yang menampilkan `"Session ended for {user}"`.  
   Uji dengan membuat object untuk `"Oliver"` dan `"Sophia"`.

---

## Hard

7. Buat class `ParentClass` dan `ChildClass` dengan constructor & destructor.

   - Pastikan destructor `ChildClass` juga memanggil destructor `ParentClass`.
   - Amati urutan eksekusi constructor & destructor.

8. Buat class `TempFile` yang secara otomatis membuat file sementara ketika object dibuat, lalu menghapus file tersebut ketika object dihancurkan (simulasi upload file).

9. Buat class `ApiResponse` dengan method `toJson()`.

   - Tambahkan destructor yang menampilkan `"API Response sent and connection closed"`.
   - Simulasikan penggunaan untuk mengembalikan data user.

10. Simulasikan **mini web system**:
    - Buat class `User` dengan constructor untuk `$name`.
    - Buat class `UserLogger` yang menerima `User` dan mencatat aktivitas login.
    - Gunakan destructor pada `UserLogger` untuk menampilkan pesan otomatis `"User {name} logged out"` ketika object dihancurkan.
