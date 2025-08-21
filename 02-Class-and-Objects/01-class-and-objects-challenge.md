# PHP Class and Objects Challenges

## Easy

1. Buat sebuah class `User` tanpa property dan method.
2. Definisikan class `Car` dengan property `$brand` dan isi default `"Toyota"`.
3. Buat object `$car1` dari class `Car` dan tampilkan nilai `$brand`.
4. Definisikan class `Book` dengan property `$title`, isi dengan `"Clean Code"`, lalu tampilkan.
5. Buat class `Person` dengan property `$name`, lalu buat object `$peter = new Person();` dan isi `$peter->name = "Peter";`.
6. Tambahkan method `sayHello()` dalam class `Person` yang menampilkan `"Hello, my name is ..."` dan gunakan `$this->name`.
7. Buat class `Laptop` dengan property `$brand` dan method `getBrand()`. Buat object `Laptop` dan tampilkan brand.
8. Definisikan class `Student` dengan property `$name` dan `$major`. Isi nilai di object `new Student()`.
9. Buat object `Movie` dengan property `$title` dan `$year`. Cetak `"Movie: Inception (2010)"`.
10. Definisikan class `Animal` dengan method `sound()` yang return `"Some sound..."`.

---

## Medium

11. Tambahkan constructor di class `User` untuk mengisi `$name` saat object dibuat.
12. Buat class `Product` dengan property `$name` dan `$price`. Buat method `getInfo()` yang menampilkan `"Product: name - $price"`.
13. Definisikan class `Employee` dengan method `setSalary($amount)` dan `getSalary()`. Gunakan `$this->salary`.
14. Buat class `BankAccount` dengan method `deposit($amount)` dan `getBalance()`. Gunakan `$this` untuk menyimpan saldo.
15. Definisikan class `BlogPost` dengan property `$title` dan `$content`. Tambahkan method `getSummary()` yang hanya menampilkan 30 karakter pertama dari `$content`.
16. Buat class `Customer` dengan constructor untuk mengisi `$name` dan `$email`. Cetak data customer.
17. Buat class `Rectangle` dengan method `getArea()` yang menghitung panjang × lebar.
18. Definisikan class `Order` dengan method `addItem($item)` dan `getItems()`. Simpan item ke array.
19. Buat class `Library` yang punya method `addBook($title)` dan `listBooks()`.
20. Definisikan class `Teacher` yang punya property `$subject`. Buat object `new Teacher("Math")`.

---

## Hard

21. Buat class `Member` yang mengimplementasikan interface `Authenticatable` dengan method `login($email, $password)`.
22. Buat class `Admin` yang extends `Member` dan tambahkan method `manageUsers()`.
23. Buat object `$emma = new Member("Emma")` dan cek apakah `$emma instanceof Member`.
24. Buat object `$jack = new Admin("Jack")` dan cek apakah `$jack instanceof Member`.
25. Tambahkan method `isAuthenticated()` dalam `Member` yang return `true` jika login sukses.
26. Buat sistem sederhana: class `Session` untuk menyimpan user yang berhasil login. Gunakan `$this`.
27. Buat class `Post` dengan property `author` yang berisi object `User`. Tampilkan `Post by: John Doe`.
28. Buat class `Comment` yang berhubungan dengan `Post`. Tambahkan method `getPostTitle()` yang mengakses property `Post`.
29. Definisikan class `Payment` (abstract class) dengan method abstract `process()`. Buat `CreditCardPayment` yang extends `Payment`.
30. Buat sistem pengecekan role user dengan `instanceof`: jika object `Admin`, tampilkan `"Has admin privileges"`, jika `Member`, tampilkan `"Standard user"`.
