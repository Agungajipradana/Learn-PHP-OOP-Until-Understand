# OOP dalam PHP

**Object-Oriented Programming (OOP)** adalah paradigma pemrograman yang berfokus pada konsep **kelas** dan **objek**.
OOP membantu membuat kode lebih **terstruktur**, **mudah dipelihara**, dan **dapat digunakan kembali**.

---

## 1. Class dan Object

- **Class** adalah cetak biru (blueprint) untuk membuat objek.
- **Object** adalah instance dari sebuah class.

```php
// Membuat class
class Car {
    public $brand;
    public $color;

    public function drive() {
        return "The car is driving";
    }
}

// Membuat objek dari class Car
$myCar = new Car();
$myCar->brand = "Toyota";
$myCar->color = "Red";

echo $myCar->brand;  // Output: Toyota
echo $myCar->drive(); // Output: The car is driving
```

---

## 2. Constructor (`__construct()`)

Constructor adalah metode khusus yang otomatis dijalankan saat objek dibuat.

```php
class Person {
    public $name;
    public $age;

    // Constructor
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age  = $age;
    }

    public function introduce() {
        return "Hi, my name is $this->name and I am $this->age years old.";
    }
}

$john = new Person("John", 25);
echo $john->introduce();
// Output: Hi, my name is John and I am 25 years old.
```

---

## 3. Access Modifiers

Access modifiers mengatur akses ke properti dan metode dalam class:

- `public` → Bisa diakses dari mana saja.
- `protected` → Hanya bisa diakses dalam class itu sendiri dan turunannya.
- `private` → Hanya bisa diakses dalam class itu sendiri.

```php
class BankAccount {
    private $balance = 0;

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function getBalance() {
        return $this->balance;
    }
}

$account = new BankAccount();
$account->deposit(1000);
// echo $account->balance; // ERROR (karena private)
echo $account->getBalance(); // Output: 1000
```

---

## 4. Inheritance (Pewarisan)

Class dapat mewarisi properti dan metode dari class lain menggunakan keyword `extends`.

```php
class Animal {
    public function sound() {
        return "Some sound";
    }
}

class Dog extends Animal {
    public function sound() {
        return "Bark";
    }
}

$dog = new Dog();
echo $dog->sound(); // Output: Bark
```

---

## 5. Polymorphism

Polymorphism memungkinkan metode yang sama memiliki implementasi berbeda di class turunan.

```php
class Shape {
    public function area() {
        return 0;
    }
}

class Circle extends Shape {
    private $radius;
    public function __construct($radius) {
        $this->radius = $radius;
    }
    public function area() {
        return pi() * $this->radius * $this->radius;
    }
}

$circle = new Circle(5);
echo $circle->area(); // Output: 78.539816339745
```

---

## 6. Encapsulation

Encapsulation menyembunyikan detail internal class dan hanya menyediakan metode untuk mengakses/mengubah data.

```php
class Student {
    private $grade;

    public function setGrade($grade) {
        if($grade >= 0 && $grade <= 100) {
            $this->grade = $grade;
        }
    }

    public function getGrade() {
        return $this->grade;
    }
}

$student = new Student();
$student->setGrade(90);
echo $student->getGrade(); // Output: 90
```

---

## 7. Abstraction

Abstraction digunakan untuk menyembunyikan detail implementasi.
Di PHP, ini dilakukan dengan **abstract class** atau **interface**.

```php
abstract class Vehicle {
    abstract public function move();
}

class Bike extends Vehicle {
    public function move() {
        return "The bike is moving";
    }
}

$bike = new Bike();
echo $bike->move(); // Output: The bike is moving
```

---

## 8. Interface

Interface mendefinisikan kontrak yang harus diimplementasikan oleh class.

```php
interface Payment {
    public function pay($amount);
}

class PayPal implements Payment {
    public function pay($amount) {
        return "Paid $$amount via PayPal";
    }
}

$payment = new PayPal();
echo $payment->pay(100); // Output: Paid $100 via PayPal
```

---

## 9. Static Properties & Methods

`static` digunakan untuk properti/metode yang dimiliki class, bukan objek.

```php
class MathHelper {
    public static $pi = 3.14;

    public static function square($num) {
        return $num * $num;
    }
}

echo MathHelper::$pi; // Output: 3.14
echo MathHelper::square(5); // Output: 25
```

---

## 10. Magic Methods

Magic methods adalah metode khusus yang diawali dengan `__`, misalnya:

- `__construct()` → dipanggil saat objek dibuat.
- `__destruct()` → dipanggil saat objek dihancurkan.
- `__toString()` → dipanggil saat objek di-echo.

```php
class Book {
    public $title;

    public function __construct($title) {
        $this->title = $title;
    }

    public function __toString() {
        return "Book title: " . $this->title;
    }
}

$book = new Book("OOP in PHP");
echo $book; // Output: Book title: OOP in PHP
```

---

## 11. Data Type Check pada Object

Gunakan `instanceof` untuk mengecek apakah sebuah objek berasal dari class tertentu.

```php
$car = new Car();
var_dump($car instanceof Car); // Output: bool(true)
```
