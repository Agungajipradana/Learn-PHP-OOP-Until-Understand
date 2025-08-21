# PHP OOP – Constructor 

Dalam OOP di PHP, **Constructor** adalah metode khusus dengan nama `__construct()` yang otomatis dijalankan ketika sebuah objek dibuat. Fungsi utamanya adalah untuk menginisialisasi nilai properti dalam kelas. Dengan constructor, kode lebih rapi dan efisien.

---

## 1. Simple Constructor (Konstruktor Sederhana)

Constructor digunakan untuk langsung memberikan nilai awal pada properti objek saat dibuat.

```php
<?php
// Membuat kelas Person
class Person {
    public string $name;

    // Konstruktor dijalankan otomatis ketika objek dibuat
    public function __construct(string $name) {
        $this->name = $name;
    }

    public function introduce(): string {
        return "Hi, my name is {$this->name}.";
    }
}

// Membuat objek dari kelas Person
$jack = new Person("Jack Smith");

echo $jack->introduce();

// Output: Hi, my name is Jack Smith.
```

**Penjelasan Singkat:**

- `__construct()` menerima parameter `$name` dan menyimpannya ke properti `$this->name`.
- Saat objek `$jack` dibuat, constructor langsung dipanggil otomatis.

---

## 2. Constructor with Multiple Parameters (Konstruktor dengan Banyak Parameter)

Constructor dapat memiliki lebih dari satu parameter untuk menginisialisasi banyak properti.

```php
<?php
class User {
    public string $name;
    public string $email;

    public function __construct(string $name, string $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function profile(): string {
        return "User: {$this->name}, Email: {$this->email}";
    }
}

$emily = new User("Emily Watson", "emily.watson@example.com");

echo $emily->profile();

// Output: User: Emily Watson, Email: emily.watson@example.com
```

**Penjelasan Singkat:**

- Constructor menerima dua parameter `$name` dan `$email`.
- Saat objek dibuat, data langsung terisi tanpa perlu setter manual.

---

## 3. Default Values in Constructor (Nilai Default di Konstruktor)

Constructor bisa diberi nilai default agar tetap fleksibel.

```php
<?php
class Product {
    public string $name;
    public float $price;

    public function __construct(string $name, float $price = 10.0) {
        $this->name = $name;
        $this->price = $price;
    }

    public function detail(): string {
        return "{$this->name} costs \${$this->price}";
    }
}

$laptop = new Product("Laptop", 899.99);
$mouse = new Product("Mouse"); // harga default 10.0

echo $laptop->detail(); // Output: Laptop costs $899.99
echo "\n";
echo $mouse->detail();  // Output: Mouse costs $10
```

**Penjelasan Singkat:**

- Parameter `$price` memiliki default `10.0`.
- Jika tidak diberikan saat membuat objek, nilai default otomatis dipakai.

---

## 4. Constructor with Encapsulation (Konstruktor dengan Enkapsulasi)

Constructor biasanya digunakan bersama **access modifier** (`private`, `protected`, `public`) untuk keamanan data.

```php
<?php
class BankAccount {
    private string $owner;
    private float $balance;

    public function __construct(string $owner, float $balance = 0.0) {
        $this->owner = $owner;
        $this->balance = $balance;
    }

    public function deposit(float $amount): void {
        $this->balance += $amount;
    }

    public function getSummary(): string {
        return "Owner: {$this->owner}, Balance: \${$this->balance}";
    }
}

$oliver = new BankAccount("Oliver Miller", 100);
$oliver->deposit(50);

echo $oliver->getSummary();

// Output: Owner: Oliver Miller, Balance: $150
```

**Penjelasan Singkat:**

- Properti `$owner` dan `$balance` dibuat `private` agar hanya bisa diakses melalui metode kelas.
- Constructor menginisialisasi data sejak awal.

---

## 5. Constructor Inheritance (Konstruktor Pewarisan)

Jika sebuah kelas mewarisi kelas lain, constructor juga dapat dipanggil dengan `parent::__construct()`.

```php
<?php
class Vehicle {
    protected string $brand;

    public function __construct(string $brand) {
        $this->brand = $brand;
    }
}

class Car extends Vehicle {
    private string $model;

    public function __construct(string $brand, string $model) {
        // Memanggil constructor dari parent class
        parent::__construct($brand);
        $this->model = $model;
    }

    public function info(): string {
        return "Car: {$this->brand} {$this->model}";
    }
}

$tesla = new Car("Tesla", "Model S");

echo $tesla->info();

// Output: Car: Tesla Model S
```

**Penjelasan Singkat:**

- `Car` mewarisi `Vehicle`.
- Constructor `Car` memanggil constructor `Vehicle` dengan `parent::__construct($brand)`.

---

## Ringkasan (Summary)

- **Constructor** adalah metode `__construct()` yang otomatis dijalankan saat objek dibuat.
- Bisa digunakan untuk mengisi nilai awal properti.
- Mendukung **default value**, **encapsulation**, dan **inheritance**.
- Membantu membuat kode lebih singkat, terstruktur, dan aman.

Dengan memahami constructor, kita bisa menulis kode OOP di PHP yang lebih efektif dan sesuai praktik standar.
