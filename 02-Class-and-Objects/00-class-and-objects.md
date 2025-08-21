# PHP OOP – Class and Objects 

Pemrograman Berorientasi Objek (OOP) di PHP membantu kita untuk menulis kode yang lebih terstruktur, mudah dibaca, dan mudah dipelihara. Konsep utama dalam OOP meliputi **Class**, **Objects**, **\$this**, dan **instanceof**.

---

## 1. Define a Class (Mendefinisikan Kelas)

Kelas adalah cetak biru (blueprint) untuk membuat objek. Kelas dapat memiliki properti (data) dan metode (fungsi).

```php
<?php
// Membuat kelas Person
class Person {
    public string $name;
    public string $email;

    // Konstruktor: dijalankan saat objek dibuat
    public function __construct(string $name, string $email) {
        $this->name = $name;
        $this->email = $email;
    }

    // Metode untuk perkenalan
    public function introduce(): string {
        return "Hi, I'm {$this->name}. You can reach me at {$this->email}.";
    }
}

// Membuat objek dari kelas Person
$john = new Person("John Carter", "john.carter@example.com");

echo $john->introduce();

// Output: Hi, I'm John Carter. You can reach me at john.carter@example.com.
```

---

## 2. Define Objects (Mendefinisikan Objek)

Objek adalah instance nyata dari kelas. Kita dapat membuat banyak objek dari satu kelas yang sama.

```php
<?php
class Person {
    public string $name;
    public string $email;

    public function __construct(string $name, string $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function introduce(): string {
        return "Hi, I'm {$this->name}. Email: {$this->email}.";
    }
}

// Membuat beberapa objek
$emma = new Person("Emma Johnson", "emma.johnson@example.com");
$liam = new Person("Liam Williams", "liam.williams@example.com");

echo $emma->introduce(); // Output: Hi, I'm Emma Johnson. Email: emma.johnson@example.com.
echo "\n";
echo $liam->introduce(); // Output: Hi, I'm Liam Williams. Email: liam.williams@example.com.
```

---

## 3. The \$this Keyword (Kata Kunci \$this)

Kata kunci `$this` digunakan untuk merujuk pada objek saat ini. Berguna untuk mengakses properti atau metode dalam kelas yang sama.

```php
<?php
class Account {
    private string $owner;
    private float $balance;

    public function __construct(string $owner, float $initialBalance = 0.0) {
        $this->owner = $owner;
        $this->balance = $initialBalance;
    }

    public function deposit(float $amount): self {
        $this->balance += $amount;
        return $this; // memungkinkan method chaining
    }

    public function withdraw(float $amount): self {
        if ($amount > $this->balance) {
            throw new RuntimeException("Insufficient balance");
        }
        $this->balance -= $amount;
        return $this;
    }

    public function summary(): string {
        return "Owner: {$this->owner}, Balance: {$this->balance}";
    }
}

$sophia = new Account("Sophia Brown", 100.0);

echo $sophia->deposit(50)->withdraw(30)->summary();
// Output: Owner: Sophia Brown, Balance: 120
```

---

## 4. instanceof (Operator instanceof)

Operator `instanceof` digunakan untuk memeriksa apakah sebuah objek merupakan instance dari kelas tertentu, turunan dari kelas tersebut, atau implementasi dari sebuah interface.

```php
<?php
interface CanLogin {
    public function login(string $email, string $password): bool;
}

class User implements CanLogin {
    public function login(string $email, string $password): bool {
        return $email !== '' && $password !== '';
    }
}

class Admin extends User {
    public function deleteUser(string $email): string {
        return "Deleted user: {$email}";
    }
}

$oliver = new User();
$mia = new Admin();

echo $oliver instanceof User ? "Yes\n" : "No\n";        // Yes
echo $oliver instanceof Admin ? "Yes\n" : "No\n";       // No
echo $oliver instanceof CanLogin ? "Yes\n" : "No\n";   // Yes

echo $mia instanceof User ? "Yes\n" : "No\n";          // Yes
echo $mia instanceof Admin ? "Yes\n" : "No\n";         // Yes
echo $mia instanceof CanLogin ? "Yes\n" : "No\n";     // Yes
```

---

## Ringkasan (Summary)

* **Class** adalah blueprint untuk membuat objek.
* **Objects** adalah instance nyata dari class.
* **\$this** digunakan untuk merujuk objek saat ini.
* **instanceof** digunakan untuk memeriksa hubungan objek dengan class atau interface.

Dengan memahami konsep ini, kita bisa membangun aplikasi PHP yang lebih terstruktur dan terorganisir.
