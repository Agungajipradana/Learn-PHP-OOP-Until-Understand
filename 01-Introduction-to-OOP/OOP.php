<?php

/*
Object-Oriented Programming (OOP) adalah cara penulisan program yang berorientasi pada objek.
Dalam pengembangan web, OOP mempermudah pengelolaan kode, membuatnya lebih terstruktur, 
mudah digunakan kembali (reusable), dan lebih aman.
*/

echo "--------------------------------------------------- OOP in PHP ---------------------------------------------------" . "\n\n";

/*
1. Class dan Object
   - Class adalah blueprint (cetak biru), sedangkan object adalah hasil instance dari class.
   - Sering digunakan untuk merepresentasikan entitas, misalnya User pada aplikasi web.
*/

echo "1. Class dan Object\n\n";

class User
{
    public $name;

    public function sayHello()
    {
        return "Hello, my name is " . $this->name;
    }
}

$user = new User();
$user->name = "Michael"; // Memberikan nilai
echo $user->sayHello() . "\n\n";
// Output: Hello, my name is Michael


/*
2. Constructor (__construct)
   - Method khusus yang otomatis dijalankan saat object dibuat.
   - Umumnya digunakan untuk menginisialisasi data seperti input dari database atau API.
*/

echo "2. Constructor (__construct)\n\n";

class Product
{
    public $title;
    public $price;

    public function __construct($title, $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    public function showProduct()
    {
        return "Product: {$this->title}, Price: {$this->price}";
    }
}

$product = new Product("Laptop", 1200);
echo $product->showProduct() . "\n\n";
// Output: Product: Laptop, Price: 1200


/*
3. Access Modifiers (public, private, protected)
   - Mengatur akses ke property dan method.
   - Sangat berguna untuk keamanan, misalnya menyembunyikan password user.
*/

echo "3. Access Modifiers\n\n";

class Account
{
    private $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return "The password is hidden for security.";
    }
}

$account = new Account("secret123");
// echo $account->password; // ERROR: tidak bisa akses langsung
echo $account->getPassword() . "\n\n";
// Output: The password is hidden for security.


/*
4. Inheritance (Pewarisan)
   - Class bisa mewarisi property dan method dari class lain.
   - Contoh: Admin adalah turunan dari User, tapi punya kemampuan tambahan.
*/

echo "4. Inheritance\n\n";

class Member
{
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getRole()
    {
        return "I am a Member";
    }
}

class Admin extends Member
{
    public function getRole()
    {
        return "I am an Admin";
    }
}

$member = new Member("Sophia");
echo $member->name . " - " . $member->getRole() . "\n";
// Output: Sophia - I am a Member

$admin = new Admin("Daniel");
echo $admin->name . " - " . $admin->getRole() . "\n\n";
// Output: Daniel - I am an Admin


/*
5. Polymorphism
   - Method yang sama dapat memiliki perilaku berbeda di class turunan.
   - Sering digunakan untuk menangani berbagai jenis pembayaran di aplikasi e-commerce.
*/

echo "5. Polymorphism\n\n";

class Payment
{
    public function pay($amount)
    {
        return "Paying $amount";
    }
}

class CreditCard extends Payment
{
    public function pay($amount)
    {
        return "Paying $amount using Credit Card";
    }
}

class PayPal extends Payment
{
    public function pay($amount)
    {
        return "Paying $amount using PayPal";
    }
}

$payment1 = new CreditCard();
echo $payment1->pay(200) . "\n";
// Output: Paying 200 using Credit Card

$payment2 = new PayPal();
echo $payment2->pay(300) . "\n\n";
// Output: Paying 300 using PayPal


/*
6. Abstraction
   - Abstract class tidak bisa dibuat object langsung.
   - Digunakan untuk membuat kerangka (blueprint) agar class turunan wajib mengimplementasikan method tertentu.
*/

echo "6. Abstraction\n\n";

abstract class Controller
{
    abstract public function handleRequest();
}

class HomeController extends Controller
{
    public function handleRequest()
    {
        return "Loading Home Page...";
    }
}

$home = new HomeController();
echo $home->handleRequest() . "\n\n";
// Output: Loading Home Page...


/*
7. Interface
   - Interface adalah kontrak yang harus diikuti oleh class yang mengimplementasikannya.
   - Biasa digunakan di aplikasi besar untuk standarisasi struktur kode.
*/

echo "7. Interface\n\n";

interface Logger
{
    public function log($message);
}

class FileLogger implements Logger
{
    public function log($message)
    {
        return "Logging to file: $message";
    }
}

class DatabaseLogger implements Logger
{
    public function log($message)
    {
        return "Logging to database: $message";
    }
}

$fileLogger = new FileLogger();
echo $fileLogger->log("User registered") . "\n";
// Output: Logging to file: User registered

$dbLogger = new DatabaseLogger();
echo $dbLogger->log("Payment success") . "\n\n";
// Output: Logging to database: Payment success


/*
8. Static Properties dan Methods
   - Property atau method yang dimiliki class, bukan object.
   - Biasanya digunakan untuk helper function di aplikasi web.
*/

echo "8. Static Properties dan Methods\n\n";

class MathHelper
{
    public static $pi = 3.14;

    public static function square($num)
    {
        return $num * $num;
    }
}

echo "PI value: " . MathHelper::$pi . "\n";
// Output: PI value: 3.14
echo "Square of 5: " . MathHelper::square(5) . "\n\n";
// Output: Square of 5: 25


/*
9. Magic Methods
   - Method khusus yang diawali dengan __ (double underscore).
   - Contoh: __toString dipanggil saat object di-echo.
*/

echo "9. Magic Methods\n\n";

class Article
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function __toString()
    {
        return "Article Title: " . $this->title;
    }

    public function __destruct()
    {
        echo "The article object is destroyed.\n";
    }
}

$article = new Article("Learning PHP OOP");
echo $article . "\n\n";
// Output: Article Title: Learning PHP OOP
// Destructor akan dijalankan otomatis di akhir script
