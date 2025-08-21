# PHP Constructor Challenges

## Easy

1. Buat class `Person` dengan constructor yang menerima `$name`, lalu tampilkan `"Hello, my name is {name}"`.
2. Buat class `User` dengan constructor yang menerima `$name` dan `$email`, lalu tampilkan `"User: {name}, Email: {email}"`.
3. Buat class `Car` dengan constructor yang menerima `$brand` dan `$model`, lalu buat object dengan data `"Toyota", "Corolla"`.
4. Buat class `Book` dengan constructor yang memiliki default parameter untuk `$author = "Unknown"`, lalu tampilkan data `"1984"` tanpa mengisi author.
5. Buat class `Product` dengan constructor yang menerima `$name` dan `$price`, lalu buat object `"Laptop", 1200` dan tampilkan hasilnya.

---

## Medium

6. Buat class `Cart` dengan constructor yang menerima array `$items`, lalu buat method `showItems()` yang menampilkan semua item.
7. Buat class `Member` dengan constructor `$name`, lalu buat class `Admin` yang mewarisi `Member` dan menambahkan property `$role = "Admin"`.
8. Buat interface `Payment` dengan method `pay($amount)`. Buat class `CreditCard` dengan constructor `$cardNumber`, implementasikan `pay($amount)` agar menampilkan `"Paying {amount} using card {cardNumber}"`.
9. Buat abstract class `Animal` dengan constructor `$name`, lalu buat class `Dog` dan `Cat` yang override method `makeSound()`.
10. Buat class `Response` dengan constructor `$status`, `$message`, `$data` lalu buat method `toJson()` yang mengembalikan response JSON.

---

## Hard

11. Buat class `Logger` dengan constructor yang menerima `$channel`, lalu buat static method `info($message)` yang menampilkan:

    ```
    [INFO] 2025-08-21 - {channel}: {message}
    ```

12. Buat trait `Timestampable` yang otomatis memberi `$createdAt` saat object dibuat melalui constructor, lalu gunakan pada class `Post`.

13. Buat class `Database` dengan constructor **private** (singleton pattern) dan static method `getInstance()`, pastikan hanya satu object database yang bisa dibuat.

14. Buat class `Shape` dengan constructor untuk parameter umum. Turunkan ke `Circle` (constructor menerima `$radius`) dan `Rectangle` (constructor menerima `$width`, `$height`). Implementasikan method `getArea()`.

15. Simulasikan sistem sederhana:

    - Buat class `User` dengan constructor `$name`.
    - Buat class `Post` dengan constructor `$title` dan relasi ke `User`.
    - Tampilkan `"Post: {title} by {userName}"`.
