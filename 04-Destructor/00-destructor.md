# PHP OOP – Destructor 

Dalam OOP di PHP, **Destructor** adalah metode khusus dengan nama `__destruct()` yang otomatis dijalankan ketika sebuah objek dihancurkan atau keluar dari scope. Destructor biasanya digunakan untuk **membersihkan resource**, menutup koneksi database, atau menampilkan pesan terakhir sebelum objek tidak lagi digunakan.

---

## 1. Simple Destructor 

Destructor digunakan untuk menjalankan sebuah aksi ketika objek dihancurkan.

```php
<?php
// Membuat kelas Person
class Person {
    public string $name;

    // Konstruktor untuk inisialisasi nama
    public function __construct(string $name) {
        $this->name = $name;
        echo "Object for {$this->name} is created.\n";
    }

    // Destruktor otomatis dijalankan ketika objek dihancurkan
    public function __destruct() {
        echo "Object for {$this->name} is destroyed.\n";
    }
}

// Membuat objek
$john = new Person("John Carter");

// Output:
// Object for John Carter is created.
// Object for John Carter is destroyed.
```

**Penjelasan Singkat:**

- `__construct()` dipanggil saat objek dibuat.
- `__destruct()` dipanggil saat objek dihancurkan, biasanya di akhir script.

---

## 2. Destructor with File Handling 

Contoh penggunaan destructor untuk menutup file setelah digunakan.

```php
<?php
class Logger {
    private $file;

    public function __construct(string $filename) {
        $this->file = fopen($filename, "a");
        echo "File {$filename} opened.\n";
    }

    public function write(string $message): void {
        fwrite($this->file, $message . "\n");
    }

    // Destruktor digunakan untuk menutup file
    public function __destruct() {
        fclose($this->file);
        echo "File closed automatically.\n";
    }
}

// Membuat objek Logger
$logger = new Logger("log.txt");
$logger->write("User Emily logged in.");

// Output di console:
// File log.txt opened.
// File closed automatically.

// File "log.txt" berisi:
// User Emily logged in.
```

**Penjelasan Singkat:**

- File dibuka di constructor.
- File otomatis ditutup di destructor, sehingga aman meski developer lupa menutup file.

---

## 3. Destructor with Database Connection 

Destructor bisa digunakan untuk menutup koneksi database setelah selesai.

```php
<?php
class Database {
    private $connection;

    public function __construct() {
        // Simulasi koneksi database
        $this->connection = "Connected to MySQL";
        echo $this->connection . "\n";
    }

    public function query(string $sql): void {
        echo "Executing query: {$sql}\n";
    }

    // Menutup koneksi saat objek dihancurkan
    public function __destruct() {
        echo "Database connection closed.\n";
    }
}

// Membuat objek
$db = new Database();
$db->query("SELECT * FROM users");

// Output:
// Connected to MySQL
// Executing query: SELECT * FROM users
// Database connection closed.
```

**Penjelasan Singkat:**

- Koneksi database dibuat saat objek diciptakan.
- Destructor menutup koneksi agar tidak membebani resource server.

---

## 4. Destructor with Multiple Objects 

Jika banyak objek dibuat, masing-masing akan memanggil destructor ketika dihancurkan.

```php
<?php
class Session {
    private string $user;

    public function __construct(string $user) {
        $this->user = $user;
        echo "Session started for {$this->user}\n";
    }

    public function __destruct() {
        echo "Session ended for {$this->user}\n";
    }
}

$anna = new Session("Anna Johnson");
$mark = new Session("Mark Lee");

// Output:
// Session started for Anna Johnson
// Session started for Mark Lee
// Session ended for Mark Lee
// Session ended for Anna Johnson
```

**Penjelasan Singkat:**

- Destructor dipanggil dalam **urutan terbalik** dari constructor.
- `$mark` dihancurkan lebih dulu karena dibuat terakhir.

---

## 5. Destructor with Inheritance 

Destructor dalam class child bisa memanggil destructor parent.

```php
<?php
class ParentClass {
    public function __construct() {
        echo "Parent constructor executed.\n";
    }

    public function __destruct() {
        echo "Parent destructor executed.\n";
    }
}

class ChildClass extends ParentClass {
    public function __construct() {
        parent::__construct();
        echo "Child constructor executed.\n";
    }

    public function __destruct() {
        echo "Child destructor executed.\n";
        parent::__destruct();
    }
}

$obj = new ChildClass();

// Output:
// Parent constructor executed.
// Child constructor executed.
// Child destructor executed.
// Parent destructor executed.
```

**Penjelasan Singkat:**

- `ChildClass` memanggil constructor parent dengan `parent::__construct()`.
- Destructor juga bisa memanggil `parent::__destruct()` agar eksekusi bersambung.

---

## Ringkasan (Summary)

- **Destructor (`__destruct()`)** adalah metode khusus yang otomatis dijalankan saat objek dihancurkan atau keluar dari scope.
- Umumnya digunakan untuk:

  - Menutup file
  - Menutup koneksi database
  - Membersihkan resource
  - Menampilkan pesan terakhir

- Destructor berjalan **otomatis** dan tidak menerima parameter.
- Jika ada banyak objek, destructor dipanggil dalam urutan terbalik dari constructor.
- Bisa digunakan juga pada inheritance untuk pemanggilan berurutan.

Dengan memahami destructor, kita bisa mengelola resource di PHP OOP secara lebih aman, efisien, dan profesional.
