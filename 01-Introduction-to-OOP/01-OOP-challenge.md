# PHP OOP Challenges

Pemrograman Berorientasi Objek (OOP) di PHP memungkinkan kita menulis kode yang lebih terstruktur, mudah dipelihara, dan dapat digunakan kembali.  
Berikut ini adalah daftar tantangan untuk melatih pemahaman kamu terhadap konsep dasar hingga lanjutan dalam OOP di PHP.

---

## Easy

1. Buat class `Car` dengan property `$brand` dan isi `"Toyota"`, lalu tampilkan.
2. Tambahkan method `getBrand()` di class `Car` yang menampilkan `"The car brand is Toyota"`.
3. Buat class `Person` dengan constructor yang menerima `$name` dan `$age`, lalu buat object dengan data `"John", 25`.
4. Buat class `Book` dengan property `title` dan `author`, lalu buat object dengan data `"1984", "George Orwell"`.
5. Buat class `User` dengan method `sayHello()` yang menampilkan `"Hello, User!"`.

---

## Medium

6. Buat class `BankAccount` dengan property private `$balance` dan method `deposit($amount)` serta `getBalance()`.
7. Buat class `Member` dengan method `getRole()` yang menampilkan `"I am a Member"`, lalu buat class `Admin` yang mewarisi `Member` dan override method tersebut agar menampilkan `"I am an Admin"`.
8. Buat interface `Payment` dengan method `pay($amount)`, lalu implementasikan di class `PayPal` yang menampilkan `"Paying {amount} using PayPal"`.
9. Buat abstract class `Animal` dengan method abstract `makeSound()`, lalu buat class `Dog` dan `Cat` yang mengimplementasikan method tersebut.
10. Buat class `Product` dengan magic method `__toString()` sehingga jika object ditampilkan, akan mengembalikan `"Product: {name}, Price: {price}"`.

---

## Hard

11. Buat class `Logger` dengan static method `info($message)` yang menampilkan log seperti:  
    ```
    [INFO] 2025-08-17 - Your message here
    ```

12. Buat trait `Timestampable` yang menambahkan property `$createdAt` dengan tanggal saat object dibuat, lalu gunakan pada class `Post`.

13. Buat class `Database` dengan constructor private (singleton pattern) dan static method `getInstance()` untuk mengakses object tunggal.

14. Buat class `Shape` dengan method `getArea()`. Turunkan menjadi `Circle` (dengan radius) dan `Rectangle` (dengan width dan height). Implementasikan method `getArea()` masing-masing.

15. Simulasikan sistem sederhana:  
    - Buat class `User` dengan property `name`.  
    - Buat class `Post` dengan property `title` dan relasi ke `User`.  
    - Tampilkan `"Post: {title} by {userName}"`.

---
