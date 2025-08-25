# PHP OOP – Inheritance

Dalam **OOP (Object-Oriented Programming)**, **Inheritance (pewarisan)** adalah konsep di mana sebuah class dapat mewarisi properti dan metode dari class lain.
Hal ini membuat kode lebih **reusable**, **terstruktur**, dan **mudah diperluas**.

PHP mendukung inheritance menggunakan keyword `extends`. Class yang mewarisi disebut **Child Class (Subclass)** dan class yang diwarisi disebut **Parent Class (Superclass/Base Class)**.

---

## 1. What is Inheritance?

Inheritance memungkinkan sebuah class menggunakan properti dan metode dari class lain tanpa menulis ulang.

```php
<?php
// Membuat Parent Class
class Person {
    public string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function introduce(): void {
        echo "Hello, my name is {$this->name}\n";
    }
}

// Membuat Child Class yang mewarisi dari Person
class Student extends Person {
    public function study(): void {
        echo "{$this->name} is studying now\n";
    }
}

// Membuat objek Student
$alice = new Student("Alice Johnson");
$alice->introduce();
$alice->study();

// Output:
// Hello, my name is Alice Johnson
// Alice Johnson is studying now
```

**Penjelasan Singkat:**

- `Student` mewarisi semua properti dan metode dari `Person`.
- `introduce()` berasal dari parent class, sedangkan `study()` khusus milik child class.

---

## 2. Inheritance and the Protected Access Modifier

`protected` memungkinkan properti/metode diakses oleh class itu sendiri dan class turunannya.

```php
<?php
// Parent Class
class Employee {
    protected string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
}

// Child Class
class Manager extends Employee {
    public function introduce(): void {
        // Bisa mengakses $name karena sifatnya protected
        echo "I am Manager {$this->name}\n";
    }
}

$mark = new Manager("Mark Lee");
$mark->introduce();

// Output:
// I am Manager Mark Lee
```

**Penjelasan Singkat:**

- `$name` tidak bisa diakses dari luar secara langsung, tapi bisa digunakan oleh `Manager` karena `protected`.

---

## 3. Overriding Inherited Methods

Child class bisa **menimpa (override)** metode dari parent class untuk menambahkan atau mengubah fungsionalitas.

```php
<?php
// Parent Class
class Vehicle {
    public function start(): void {
        echo "The vehicle is starting...\n";
    }
}

// Child Class
class Car extends Vehicle {
    // Override metode start()
    public function start(): void {
        echo "The car engine is starting with a key...\n";
    }
}

$bmw = new Car();
$bmw->start();

// Output:
// The car engine is starting with a key...
```

**Penjelasan Singkat:**

- `Car` meng-override metode `start()` milik `Vehicle`.
- Hasilnya, ketika `start()` dipanggil pada `Car`, versi milik `Car` yang dijalankan.

---

## 4. The `final` Keyword

`final` digunakan untuk mencegah **pewarisan lebih lanjut** atau **override metode**.

### a. final pada Class

Jika sebuah class didefinisikan sebagai `final`, maka class tersebut **tidak dapat diwarisi**.

```php
<?php
// Final Class
final class Library {
    public function open(): void {
        echo "The library is now open\n";
    }
}

// Error jika mencoba extend
// class DigitalLibrary extends Library {}
```

**Penjelasan Singkat:**

- `Library` adalah `final`, jadi tidak bisa dibuat class turunan darinya.

---

### b. final pada Method

Jika sebuah metode didefinisikan sebagai `final`, maka metode tersebut **tidak bisa di-override** oleh child class.

```php
<?php
class Animal {
    final public function breathe(): void {
        echo "All animals breathe oxygen\n";
    }
}

class Dog extends Animal {
    // Error jika mencoba override
    // public function breathe(): void {
    //     echo "Dog breathes differently\n";
    // }
}

$buddy = new Dog();
$buddy->breathe();

// Output:
// All animals breathe oxygen
```

**Penjelasan Singkat:**

- `breathe()` tidak bisa diubah oleh class `Dog` karena didefinisikan sebagai `final`.

---

## Ringkasan (Summary)

- **Inheritance** memungkinkan child class mewarisi properti dan metode dari parent class.
- **protected** → bisa diakses di class itu sendiri dan child class.
- **Overriding** → child class dapat menimpa metode parent untuk membuat versi baru.
- **final** → digunakan untuk mencegah inheritance lebih lanjut atau override metode.

Dengan memahami **Inheritance di PHP**, kita dapat membuat kode lebih **terstruktur, reusable, dan scalable** sesuai prinsip **OOP**.
