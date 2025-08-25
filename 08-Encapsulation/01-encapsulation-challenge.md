# PHP Encapsulation Challenges

## Easy

1. Buat class `User` dengan properti private `$name`.

   - Tambahkan `getName()` untuk mengambil nama.
   - Tambahkan `setName($name)` untuk mengubah nama.
   - Uji dengan nama awal `"John Smith"`, lalu ubah menjadi `"Michael Brown"`.

---

2. Buat class `Employee` dengan properti:

   - `public $position`

   - `private $salary`

   - `protected $name`

   - Buat getter & setter untuk `$salary`.

   - Uji dengan membuat `Employee("Manager", 7500.00, "Anna Johnson")` dan tampilkan:

     ```
     Manager
     7500
     8000
     ```

---

3. Buat class `Product` dengan properti private `$name` dan `$price`.

   - `setName($name)` harus menolak nama kosong.
   - `setPrice($price)` harus menolak harga negatif.
   - Uji dengan `"Laptop Dell", 1200.00`, lalu ubah harga menjadi `1350.00`.

---

## Medium

4. Buat class `Account` dengan properti:

   - `protected $username`

   - `private $password`

   - Buat setter untuk `setPassword($password)` yang meng-hash password.

   - Buat method `verifyPassword($password)` untuk mengecek password.

   - Buat child class `CustomerAccount` dengan method `login($password)` yang menampilkan:

     ```
     Customer {username} logged in successfully
     ```

     atau

     ```
     Login failed for {username}
     ```

---

5. Buat class `AuthUser` dengan properti private `$username` dan `$password`.

   - Buat getter `getUsername()`.
   - `setPassword($password)` harus menyimpan password dalam bentuk hash.
   - `verify($password)` untuk memeriksa kecocokan.
   - Uji dengan user `"david"` password `"securePass123"`.

---

6. Buat class `Order` dengan properti private `$id` dan `$status`.

   - Default `$status = "pending"`.
   - Buat method `setStatus($status)` yang hanya menerima `"pending"`, `"processing"`, `"completed"`. Jika nilai tidak valid, tampilkan error.
   - Uji dengan order `#1001`, ubah status ke `"processing"`, lalu `"completed"`.

---

## Hard

7. Buat sistem **Bank Account** menggunakan encapsulation:

   - Buat class `BankAccount` dengan:

     - private `$balance` (default 0).
     - `deposit($amount)` hanya boleh jika amount > 0.
     - `withdraw($amount)` hanya boleh jika balance cukup.
     - `getBalance()` untuk menampilkan saldo.

   - Uji dengan:

     ```
     Deposit 500
     Withdraw 200
     Balance: 300
     ```

---

8. Buat class `Profile` untuk user website.

   - private `$email` dan `$age`.
   - Setter untuk `setEmail($email)` harus valid mengandung `@`.
   - Setter untuk `setAge($age)` harus angka positif.
   - Uji dengan data `"emma@example.com", 25`, lalu coba set email `"invalidemail"`.

---

9. Buat class `ShoppingCart` dengan private array `$items`.

   - Method `addItem($item, $price)` menambah item ke cart.
   - Method `removeItem($item)` menghapus item jika ada.
   - Method `getTotal()` menghitung total harga.
   - Uji dengan menambah `"Laptop" (1000)`, `"Mouse" (50)`, lalu hapus `"Mouse"`.

---

10. Buat simulasi **Secure Payment** dengan encapsulation.

- Buat class `Payment` dengan:

  - private `$cardNumber`, `$cvv`, `$amount`.
  - `setCardNumber($cardNumber)` hanya menerima 16 digit.
  - `setCvv($cvv)` hanya menerima 3 digit.
  - `setAmount($amount)` hanya menerima nilai positif.
  - `process()` menampilkan:

    ```
    Processing payment of ${amount} with card ending ****{last 4 digits}
    ```

- Uji dengan card `"1234567812345678"`, cvv `"123"`, amount `250.75`.
