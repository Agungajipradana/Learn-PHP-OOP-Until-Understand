<?php
/*
Destructor dalam PHP adalah method khusus di dalam sebuah class yang otomatis dijalankan saat objek dihancurkan 
atau keluar dari scope. Sangat berguna dalam pengembangan web untuk menutup koneksi database, menutup file, atau 
membersihkan resource lain agar aplikasi lebih aman dan efisien.
*/

echo "--------------------------------------------------- Destructor in PHP ---------------------------------------------------" . "\n\n";

/*
1. Basic Destructor
- Destructor didefinisikan dengan __destruct().
- Digunakan untuk menjalankan aksi tertentu ketika objek dihancurkan.
*/
echo "1. Basic Destructor\n\n";

class Person
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
        echo "Object for {$this->name} is created.\n";
    }

    public function __destruct()
    {
        echo "Object for {$this->name} is destroyed.\n";
    }
}

$jack = new Person("Jack Miller");
// Output ketika script selesai:
// Object for Jack Miller is created.
// Object for Jack Miller is destroyed.

echo "\n";

/*
2. Multiple Objects with Destructor
- Setiap objek akan memanggil destructor-nya masing-masing ketika keluar dari scope.
- Urutan destructor terbalik dari pembuatan objek.
*/
echo "2. Multiple Objects with Destructor\n\n";

$emily = new Person("Emily Johnson");
$liam = new Person("Liam Smith");

// Output:
// Object for Emily Johnson is created.
// Object for Liam Smith is created.
// Object for Liam Smith is destroyed.
// Object for Emily Johnson is destroyed.

echo "\n";

/*
3. Destructor with File Handling
- Destructor sangat berguna untuk menutup file otomatis.
- Dalam web development, ini bisa dipakai untuk menulis log aktivitas user.
*/
echo "3. Destructor with File Handling\n\n";

class ActivityLogger
{
    private $file;

    public function __construct(string $filename)
    {
        $this->file = fopen($filename, "a");
        echo "File {$filename} opened.\n";
    }

    public function write(string $message): void
    {
        fwrite($this->file, $message . "\n");
    }

    public function __destruct()
    {
        fclose($this->file);
        echo "File closed automatically.\n";
    }
}

$logger = new ActivityLogger("activity.log");
$logger->write("User Anna logged in.");
// Output di console:
// File activity.log opened.
// File closed automatically.
//
// Isi file activity.log:
// User Anna logged in.

echo "\n";

/*
4. Destructor with Database Simulation
- Biasanya dipakai untuk menutup koneksi database.
- Dalam pengembangan web, ini menjaga resource tetap aman dan tidak boros.
*/
echo "4. Destructor with Database Simulation\n\n";

class Database
{
    private string $connection;

    public function __construct()
    {
        $this->connection = "Connected to MySQL Database";
        echo $this->connection . "\n";
    }

    public function query(string $sql): void
    {
        echo "Executing query: {$sql}\n";
    }

    public function __destruct()
    {
        echo "Database connection closed.\n";
    }
}

$db = new Database();
$db->query("SELECT * FROM users WHERE id = 1");
// Output:
// Connected to MySQL Database
// Executing query: SELECT * FROM users WHERE id = 1
// Database connection closed.

echo "\n";

/*
5. Destructor with Inheritance
- Destructor juga bisa digunakan pada pewarisan class.
- Biasanya digunakan untuk memastikan resource di parent class juga dibersihkan.
*/
echo "5. Destructor with Inheritance\n\n";

class ParentClass
{
    public function __construct()
    {
        echo "Parent constructor executed.\n";
    }

    public function __destruct()
    {
        echo "Parent destructor executed.\n";
    }
}

class ChildClass extends ParentClass
{
    public function __construct()
    {
        parent::__construct();
        echo "Child constructor executed.\n";
    }

    public function __destruct()
    {
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

echo "\n";

/*
6. Real Web Example: Temporary File Handling
- Dalam pengembangan web, kita sering membuat file sementara (misalnya upload).
- Destructor bisa digunakan untuk menghapus file sementara setelah script selesai.
*/
echo "6. Real Web Example: Temporary File Handling\n\n";

class TempFile
{
    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
        file_put_contents($this->filename, "Temporary data for user session.");
        echo "Temporary file {$this->filename} created.\n";
    }

    public function __destruct()
    {
        if (file_exists($this->filename)) {
            unlink($this->filename);
            echo "Temporary file {$this->filename} deleted automatically.\n";
        }
    }
}

$temp = new TempFile("session.tmp");
// Output:
// Temporary file session.tmp created.
// Temporary file session.tmp deleted automatically.
