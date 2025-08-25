# PHP OOP – Encapsulation

Dalam **OOP**, **Encapsulation** adalah konsep di mana data (properti) dan perilaku (metode) digabungkan dalam satu class, serta akses ke data tersebut dibatasi menggunakan **Access Modifiers (public, private, protected)**.

Tujuan utama dari encapsulation adalah:

- Melindungi data dari akses langsung dari luar class.
- Memberikan kontrol bagaimana data diakses atau dimodifikasi.
- Membuat kode lebih aman, terstruktur, dan mudah dipelihara.

---

## 1. What is Encapsulation?

Encapsulation membungkus data di dalam class, sehingga hanya bisa diakses melalui metode yang ditentukan (getter dan setter).

```php
<?php
// Membuat class dengan enkapsulasi
class User {
    // Properti private hanya bisa diakses dalam class ini
    private string $name;

    // Constructor untuk inisialisasi data
    public function __construct(string $name) {
        $this->name = $name;
    }

    // Getter untuk mengambil nilai
    public function getName(): string {
        return $this->name;
    }

    // Setter untuk mengubah nilai
    public function setName(string $name): void {
        $this->name = $name;
    }
}

// Membuat objek
$john = new User("John Smith");

// Mengakses properti dengan getter
echo $john->getName() . "\n";

// Mengubah nilai dengan setter
$john->setName("Michael Brown");
echo $john->getName() . "\n";

// Output:
// John Smith
// Michael Brown
```

**Penjelasan Singkat:**

- `$name` disembunyikan dengan `private`.
- Akses dilakukan lewat `getName()` dan `setName()`.
- Dengan begitu, data lebih aman dari manipulasi langsung.

---

## 2. Public, Private, and Protected Properties

Tiga jenis **Access Modifiers** yang digunakan dalam encapsulation:

- **public** → Bisa diakses dari mana saja.
- **private** → Hanya bisa diakses dari dalam class itu sendiri.
- **protected** → Bisa diakses dari class itu sendiri dan class turunannya.

```php
<?php
class Employee {
    public string $position;     // Bisa diakses dari mana saja
    private float $salary;       // Hanya bisa diakses dari dalam class
    protected string $name;      // Bisa diakses oleh class ini dan turunannya

    public function __construct(string $position, float $salary, string $name) {
        $this->position = $position;
        $this->salary = $salary;
        $this->name = $name;
    }

    // Getter salary
    public function getSalary(): float {
        return $this->salary;
    }

    // Setter salary
    public function setSalary(float $salary): void {
        $this->salary = $salary;
    }
}

$anna = new Employee("Manager", 7500.00, "Anna Johnson");

// Akses public langsung
echo $anna->position . "\n";

// Akses private lewat getter
echo $anna->getSalary() . "\n";

// Mengubah salary dengan setter
$anna->setSalary(8000.00);
echo $anna->getSalary() . "\n";

// Output:
// Manager
// 7500
// 8000
```

**Penjelasan Singkat:**

- `public $position` bisa diakses langsung.
- `private $salary` hanya bisa lewat metode.
- `protected $name` hanya bisa diakses di class ini atau turunannya.

---

## 3. Encapsulation with Validation

Encapsulation juga bermanfaat untuk **validasi data sebelum disimpan**.

```php
<?php
class Product {
    private string $name;
    private float $price;

    public function __construct(string $name, float $price) {
        $this->setName($name);
        $this->setPrice($price);
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        // Validasi sederhana: nama tidak boleh kosong
        if (empty($name)) {
            throw new Exception("Product name cannot be empty");
        }
        $this->name = $name;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function setPrice(float $price): void {
        // Validasi sederhana: harga tidak boleh negatif
        if ($price < 0) {
            throw new Exception("Price cannot be negative");
        }
        $this->price = $price;
    }
}

$laptop = new Product("Laptop Dell", 1200.00);
echo $laptop->getName() . " - $" . $laptop->getPrice() . "\n";

// Mengubah harga
$laptop->setPrice(1350.00);
echo $laptop->getName() . " - $" . $laptop->getPrice() . "\n";

// Output:
// Laptop Dell - $1200
// Laptop Dell - $1350
```

**Penjelasan Singkat:**

- Dengan setter, kita bisa memvalidasi data sebelum disimpan.
- Jika nama kosong atau harga negatif, program akan error.

---

## 4. Encapsulation in Real Example

Dalam pengembangan web, misalnya untuk **sistem akun**, kita tidak ingin password diakses langsung, jadi gunakan **encapsulation**.

```php
<?php
class Account {
    private string $username;
    private string $password; // disembunyikan

    public function __construct(string $username, string $password) {
        $this->username = $username;
        $this->setPassword($password);
    }

    // Getter username
    public function getUsername(): string {
        return $this->username;
    }

    // Setter password dengan hashing
    public function setPassword(string $password): void {
        // Hash password agar lebih aman
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Method untuk verifikasi login
    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }
}

$account = new Account("michael", "secure123");

// Username bisa diakses
echo "Username: " . $account->getUsername() . "\n";

// Verifikasi password
echo $account->verifyPassword("secure123") ? "Login success\n" : "Login failed\n";

// Output:
// Username: michael
// Login success
```

**Penjelasan Singkat:**

- Password tidak bisa diakses langsung karena `private`.
- Setter `setPassword()` melakukan hashing agar aman.
- Encapsulation digunakan untuk melindungi data sensitif seperti password.

---

## Ringkasan (Summary)

- **Encapsulation** adalah proses menyembunyikan data (properti) agar tidak bisa diakses langsung dari luar class.
- Gunakan **getter** dan **setter** untuk mengontrol akses data.
- `public`, `private`, `protected` → mengatur level akses properti dan metode.
- Encapsulation memungkinkan validasi data sebelum disimpan.
- Sangat bermanfaat dalam aplikasi nyata seperti pengelolaan akun (username, password).

Dengan memahami **Encapsulation di PHP**, kita bisa membuat aplikasi lebih **aman, terkontrol, dan profesional** sesuai prinsip **OOP**.
