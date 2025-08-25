# PHP OOP – Access Modifiers

Dalam OOP di PHP, **Access Modifiers (Modifier Akses)** digunakan untuk menentukan **tingkat aksesibilitas** dari properti (variabel dalam class) maupun metode (fungsi dalam class).
PHP memiliki **3 jenis access modifiers utama**:

1. **public** → Dapat diakses dari mana saja (dalam class, subclass, maupun di luar class).
2. **protected** → Hanya dapat diakses di dalam class itu sendiri dan class turunannya (inheritance).
3. **private** → Hanya dapat diakses di dalam class itu sendiri, **tidak** bisa diakses dari luar maupun oleh class turunan.

---

## 1. Public Modifier

Properti atau metode dengan `public` bisa diakses dari mana saja.

```php
<?php
// Membuat kelas Person
class Person {
    public string $name; // Properti public

    public function __construct(string $name) {
        $this->name = $name;
    }

    // Metode public
    public function introduce(): void {
        echo "Hello, my name is {$this->name}\n";
    }
}

// Membuat objek
$john = new Person("John Carter");
$john->introduce();

// Output:
// Hello, my name is John Carter
```

**Penjelasan Singkat:**

- `$name` dapat diakses dari luar class karena `public`.
- Metode `introduce()` juga dapat dipanggil dari luar class.

---

## 2. Private Modifier

`private` hanya bisa diakses di dalam class itu sendiri. Tidak bisa diakses langsung dari luar.

```php
<?php
class BankAccount {
    private float $balance; // Properti private

    public function __construct(float $initialBalance) {
        $this->balance = $initialBalance;
    }

    // Metode public untuk menambah saldo
    public function deposit(float $amount): void {
        $this->balance += $amount;
    }

    // Metode public untuk melihat saldo
    public function getBalance(): float {
        return $this->balance;
    }
}

$anna = new BankAccount(1000);
$anna->deposit(500);

echo $anna->getBalance(); // Output: 1500
```

**Penjelasan Singkat:**

- `$balance` bersifat private → tidak bisa langsung `$anna->balance`.
- Untuk mengaksesnya, digunakan metode `getBalance()`.

---

## 3. Protected Modifier

`protected` hanya dapat diakses dari **class itu sendiri** dan **class turunan**.

```php
<?php
class Employee {
    protected string $name; // Properti protected

    public function __construct(string $name) {
        $this->name = $name;
    }
}

class Manager extends Employee {
    public function introduce(): void {
        // Bisa mengakses $name karena class turunan
        echo "I am Manager {$this->name}\n";
    }
}

$mark = new Manager("Mark Lee");
$mark->introduce();

// Output:
// I am Manager Mark Lee
```

**Penjelasan Singkat:**

- `$name` adalah `protected`, jadi **tidak bisa** diakses langsung dari luar.
- Namun, class `Manager` yang merupakan turunan dari `Employee` dapat mengaksesnya.

---

## 4. Mixing Public, Private, and Protected

Contoh class dengan kombinasi berbagai access modifiers.

```php
<?php
class User {
    public string $username;     // Public
    private string $password;    // Private
    protected string $role;      // Protected

    public function __construct(string $username, string $password, string $role) {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    // Metode public
    public function login(): void {
        echo "{$this->username} logged in as {$this->role}\n";
    }

    // Metode private
    private function encryptPassword(): string {
        return sha1($this->password);
    }

    // Metode protected
    protected function getRole(): string {
        return $this->role;
    }
}

class Admin extends User {
    public function showRole(): void {
        // Bisa mengakses metode protected dari parent
        echo "Admin role: {$this->getRole()}\n";
    }
}

$emily = new Admin("EmilyClark", "secret123", "Administrator");
$emily->login();
$emily->showRole();

// Output:
// EmilyClark logged in as Administrator
// Admin role: Administrator
```

**Penjelasan Singkat:**

- `username` bisa diakses langsung dari luar.
- `password` hanya bisa digunakan di dalam class User.
- `role` bisa digunakan di class turunan.

---

## 5. Access Modifiers with Methods Override

Saat **inheritance**, metode dari parent dapat di-override dengan aturan access modifier tertentu:

- `public` bisa diubah menjadi `public` (tidak boleh lebih ketat).
- `protected` bisa diubah menjadi `protected` atau `public`.
- `private` tidak bisa diakses dari child, jadi tidak bisa di-override.

```php
<?php
class ParentClass {
    protected function greet(): void {
        echo "Hello from Parent\n";
    }
}

class ChildClass extends ParentClass {
    // Override metode protected menjadi public
    public function greet(): void {
        echo "Hello from Child\n";
    }
}

$obj = new ChildClass();
$obj->greet();

// Output:
// Hello from Child
```

**Penjelasan Singkat:**

- Metode `greet()` awalnya `protected` di `ParentClass`.
- Di `ChildClass`, bisa diubah menjadi `public` agar bisa diakses dari luar.

---

## 6. Access Modifiers in Properties Promotion (PHP 8)

Sejak PHP 8, kita bisa langsung mendefinisikan properti dengan access modifier dalam constructor (constructor property promotion).

```php
<?php
class Product {
    public function __construct(
        public string $name,
        private float $price,
        protected int $stock
    ) {}

    public function getInfo(): void {
        echo "{$this->name} costs {$this->price} and stock: {$this->stock}\n";
    }
}

$laptop = new Product("Laptop Dell", 1200, 5);
$laptop->getInfo();

// Output:
// Laptop Dell costs 1200 and stock: 5
```

**Penjelasan Singkat:**

- Access modifier langsung ditulis di parameter constructor.
- `$name` public → bisa diakses langsung.
- `$price` private → hanya di dalam class.
- `$stock` protected → bisa diakses di class turunan.

---

## Ringkasan (Summary)

- **Public** → bisa diakses dari mana saja.
- **Private** → hanya bisa diakses dalam class itu sendiri.
- **Protected** → bisa diakses dalam class itu sendiri dan class turunan.
- **Rules penting:**

  - Properti `private` tidak diwariskan.
  - Properti `protected` diwariskan ke child class.
  - Access modifiers bisa digunakan di **properties**, **methods**, maupun **constructor property promotion**.
  - Aturan overriding → tidak boleh mempersempit akses.

Dengan memahami **Access Modifiers**, kita dapat mengatur **encapsulation (enkapsulasi)** dalam OOP PHP agar kode lebih aman, terstruktur, dan profesional.
