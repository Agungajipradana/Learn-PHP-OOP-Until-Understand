# PHP Access Modifiers Challenges

## Easy

1. Buat class `User` dengan properti `public $name`.

   - Isi nilai `"John"` lalu tampilkan namanya langsung dari luar class.
   - Output contoh:

     ```
     John
     ```

2. Buat class `Account` dengan properti `private $password`.

   - Buat method `setPassword($password)` dan `getPassword()` untuk mengenkripsi password menggunakan `sha1`.
   - Output contoh:

     ```
     Encrypted: 5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8
     ```

3. Buat class `Employee` dengan properti `protected $name`.

   - Buat class `Manager` yang mewarisi `Employee` dan method `introduce()` yang menampilkan:

     ```
     I am Manager {name}
     ```

---

## Medium

4. Buat class `AuthUser` dengan kombinasi:

   - `public $username`,
   - `private $password`,
   - `protected $role`.
     Tambahkan method `login()` yang menampilkan `"{$username} logged in as {$role}"`.
     Uji dengan membuat object `new AuthUser("Emily", "123456", "Admin")`.

5. Buat class `Admin` yang mewarisi `AuthUser`.

   - Tambahkan method `showRole()` yang menampilkan `"Admin role: {role}"`.
   - Uji dengan username `"Anna"` role `"Administrator"`.

6. Buat class `ParentClass` dengan method `protected greet()`.

   - Override method ini di `ChildClass` dengan menjadikannya `public`.
   - Tampilkan `"Hello from Child"`.

---

## Hard

7. Buat class `Product` dengan constructor property promotion (PHP 8):

   - `public $name`, `private $price`, `protected $stock`.
   - Buat method `getInfo()` untuk menampilkan informasi produk.
   - Uji dengan `("Laptop", 1000, 10)`.

8. Buat class `WebUser` dengan:

   - `public $username`,
   - `private $password`,
   - `protected $role`.
   - Tambahkan method `login($password)` untuk validasi menggunakan `password_verify()`.
   - Uji dengan user `"Liam"`, password `"adminPass"`, role `"Admin"`.

9. Buat class `AdminPanel` yang mewarisi `WebUser`.

   - Tambahkan method `accessPanel()` yang menampilkan `"Access granted for role: {role}"`.
   - Uji login berhasil lalu akses panel.

10. Simulasikan **mini e-commerce system**:

    - Class `Customer` dengan `public $name`.
    - Class `Order` dengan `private $items` (array) dan method `addItem($item)`.
    - Class `Payment` dengan `protected $status` dan method `pay()`.
    - Gunakan inheritance `OnlinePayment extends Payment` untuk mengakses status dan menampilkan `"Payment successful"`.
    - Buat alur: Customer pesan produk → Order tambah item → Payment sukses.
