# PHP OOP – Polymorphism

Dalam **OOP (Object-Oriented Programming)**, **Polymorphism (Polimorfisme)** berarti kemampuan sebuah metode untuk memiliki banyak bentuk.
Dengan kata lain, method yang sama bisa berperilaku berbeda tergantung pada objek yang memanggilnya.

Hal ini membuat kode lebih **fleksibel**, **mudah diperluas**, dan **lebih terorganisir**.

Polymorphism di PHP dapat dilakukan dengan beberapa cara, seperti:

- **Method Overriding** (menimpa metode dari parent class).
- **Interfaces** (implementasi method dengan cara berbeda di tiap class).
- **Abstract Classes** (class abstrak dengan method yang harus diimplementasi di child class).

---

## 1. What is Polymorphism?

Polymorphism memungkinkan sebuah method yang sama digunakan oleh objek berbeda, namun memberikan hasil yang berbeda.

```php
<?php
// Parent Class
class Person {
    public string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    // Method umum
    public function introduce(): void {
        echo "Hello, I am {$this->name}\n";
    }
}

// Child Class 1
class Teacher extends Person {
    public function introduce(): void {
        echo "Hello, I am Teacher {$this->name}\n";
    }
}

// Child Class 2
class Doctor extends Person {
    public function introduce(): void {
        echo "Hello, I am Doctor {$this->name}\n";
    }
}

// Membuat objek dengan method sama namun hasil berbeda
$john = new Teacher("John Smith");
$lisa = new Doctor("Lisa Adams");

$john->introduce();
$lisa->introduce();

// Output:
// Hello, I am Teacher John Smith
// Hello, I am Doctor Lisa Adams
```

**Penjelasan Singkat:**

- Method `introduce()` ada di `Teacher` dan `Doctor`, namun hasilnya berbeda.
- Inilah contoh dasar dari polymorphism dengan **method overriding**.

---

## 2. Polymorphism with Abstract Class

Class abstrak dapat mendefinisikan **kerangka** metode, dan child class wajib mengimplementasikannya.

```php
<?php
// Abstract Class
abstract class Animal {
    protected string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    // Abstract method harus diimplementasi oleh child
    abstract public function makeSound(): void;
}

// Child Class 1
class Dog extends Animal {
    public function makeSound(): void {
        echo "{$this->name} says: Woof!\n";
    }
}

// Child Class 2
class Cat extends Animal {
    public function makeSound(): void {
        echo "{$this->name} says: Meow!\n";
    }
}

$buddy = new Dog("Buddy");
$luna = new Cat("Luna");

$buddy->makeSound();
$luna->makeSound();

// Output:
// Buddy says: Woof!
// Luna says: Meow!
```

**Penjelasan Singkat:**

- `Animal` adalah class abstrak yang mendefinisikan method `makeSound()`.
- `Dog` dan `Cat` harus mengimplementasikan method tersebut dengan cara masing-masing.
- Inilah bentuk polymorphism menggunakan **abstract class**.

---

## 3. Polymorphism with Interface

Interface mendefinisikan kontrak method yang harus diimplementasikan oleh class.

```php
<?php
// Interface
interface PaymentMethod {
    public function pay(float $amount): void;
}

// Class 1
class CreditCard implements PaymentMethod {
    public function pay(float $amount): void {
        echo "Paid \${$amount} using Credit Card\n";
    }
}

// Class 2
class PayPal implements PaymentMethod {
    public function pay(float $amount): void {
        echo "Paid \${$amount} using PayPal\n";
    }
}

// Class 3
class Bitcoin implements PaymentMethod {
    public function pay(float $amount): void {
        echo "Paid \${$amount} using Bitcoin\n";
    }
}

// Menggunakan polymorphism
$payments = [
    new CreditCard(),
    new PayPal(),
    new Bitcoin()
];

foreach ($payments as $method) {
    $method->pay(100.50);
}

// Output:
// Paid $100.5 using Credit Card
// Paid $100.5 using PayPal
// Paid $100.5 using Bitcoin
```

**Penjelasan Singkat:**

- Semua class (`CreditCard`, `PayPal`, `Bitcoin`) mengimplementasikan interface `PaymentMethod`.
- Method `pay()` dipanggil dengan cara sama, namun hasil berbeda sesuai class.
- Inilah polymorphism dengan **interface**.

---

## 4. Real Example in Web Development

Misalnya pada sistem login, kita bisa menggunakan berbagai cara autentikasi namun dengan method yang sama.

```php
<?php
// Interface untuk Authentication
interface Auth {
    public function login(string $username, string $password): void;
}

// Login via Database
class DatabaseAuth implements Auth {
    public function login(string $username, string $password): void {
        echo "User {$username} logged in using Database\n";
    }
}

// Login via Google
class GoogleAuth implements Auth {
    public function login(string $username, string $password): void {
        echo "User {$username} logged in using Google OAuth\n";
    }
}

// Login via Facebook
class FacebookAuth implements Auth {
    public function login(string $username, string $password): void {
        echo "User {$username} logged in using Facebook OAuth\n";
    }
}

// Polymorphism in Action
$authMethods = [
    new DatabaseAuth(),
    new GoogleAuth(),
    new FacebookAuth()
];

foreach ($authMethods as $auth) {
    $auth->login("Michael", "12345");
}

// Output:
// User Michael logged in using Database
// User Michael logged in using Google OAuth
// User Michael logged in using Facebook OAuth
```

**Penjelasan Singkat:**

- Semua class punya method `login()` yang sama.
- Tapi cara kerja di balik method tersebut berbeda sesuai class.
- Ini contoh nyata polymorphism pada aplikasi web.

---

## Ringkasan (Summary)

- **Polymorphism** adalah konsep di OOP di mana method yang sama bisa memiliki perilaku berbeda.
- Cara penerapan di PHP:

  1. **Method Overriding** → menimpa method parent class.
  2. **Abstract Class** → kerangka method yang harus diimplementasikan child class.
  3. **Interface** → kontrak method yang wajib diimplementasikan class.

- Dengan polymorphism, kode lebih **modular**, **fleksibel**, dan **mudah dikelola** dalam pengembangan aplikasi.
