<?php
/*
Polymorphism dalam PHP adalah kemampuan objek untuk menggunakan method yang sama
namun menghasilkan perilaku yang berbeda, tergantung class yang mengimplementasikannya.
Hal ini sangat berguna dalam pengembangan web karena membuat kode lebih fleksibel dan mudah diperluas.
*/

echo "--------------------------------------------------- Polymorphism in PHP ---------------------------------------------------" . "\n\n";

/*
1. Basic Method Overriding
- Child class dapat menimpa (override) method dari parent class.
- Method yang sama dipanggil, tapi hasilnya berbeda.
*/
echo "1. Basic Method Overriding\n\n";

class Person
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function introduce(): void
    {
        echo "Hello, I am {$this->name}\n";
    }
}

class Teacher extends Person
{
    public function introduce(): void
    {
        echo "Hello, I am Teacher {$this->name}\n";
    }
}

class Doctor extends Person
{
    public function introduce(): void
    {
        echo "Hello, I am Doctor {$this->name}\n";
    }
}

$john = new Teacher("John Smith");
$lisa = new Doctor("Lisa Adams");

$john->introduce();
$lisa->introduce();
// Output:
// Hello, I am Teacher John Smith
// Hello, I am Doctor Lisa Adams

echo "\n";

/*
2. Using parent:: keyword
- Kita bisa override method tapi tetap memanggil logika dari parent class.
- Cocok jika ingin menambahkan perilaku tambahan.
*/
echo "2. Using parent:: keyword\n\n";

class BaseController
{
    public function handle(): void
    {
        echo "Handling base logic\n";
    }
}

class ApiController extends BaseController
{
    public function handle(): void
    {
        parent::handle();
        echo "Handling API-specific logic\n";
    }
}

$api = new ApiController();
$api->handle();
// Output:
// Handling base logic
// Handling API-specific logic

echo "\n";

/*
3. Polymorphism with Abstract Class
- Abstract class dapat memiliki method abstract yang harus diimplementasikan oleh child class.
- Berguna untuk memastikan setiap class turunan punya implementasi spesifik.
*/
echo "3. Polymorphism with Abstract Class\n\n";

abstract class Animal
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    abstract public function makeSound(): void;
}

class Dog extends Animal
{
    public function makeSound(): void
    {
        echo "{$this->name} says: Woof!\n";
    }
}

class Cat extends Animal
{
    public function makeSound(): void
    {
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

echo "\n";

/*
4. Polymorphism with Interface
- Interface mendefinisikan kontrak method yang wajib diimplementasikan oleh class.
- Semua class punya method yang sama, tapi implementasinya berbeda.
*/
echo "4. Polymorphism with Interface\n\n";

interface PaymentMethod
{
    public function pay(float $amount): void;
}

class CreditCard implements PaymentMethod
{
    public function pay(float $amount): void
    {
        echo "Paid \${$amount} using Credit Card\n";
    }
}

class PayPal implements PaymentMethod
{
    public function pay(float $amount): void
    {
        echo "Paid \${$amount} using PayPal\n";
    }
}

class Bitcoin implements PaymentMethod
{
    public function pay(float $amount): void
    {
        echo "Paid \${$amount} using Bitcoin\n";
    }
}

$payments = [
    new CreditCard(),
    new PayPal(),
    new Bitcoin()
];

foreach ($payments as $method) {
    $method->pay(150.75);
}
// Output:
// Paid $150.75 using Credit Card
// Paid $150.75 using PayPal
// Paid $150.75 using Bitcoin

echo "\n";

/*
5. Real Web Example: User Authentication
- Dalam sistem login, kita bisa menggunakan berbagai cara autentikasi (Database, Google, Facebook).
- Semua class punya method login() yang sama, namun cara kerjanya berbeda.
*/
echo "5. Real Web Example: User Authentication\n\n";

interface Auth
{
    public function login(string $username, string $password): void;
}

class DatabaseAuth implements Auth
{
    public function login(string $username, string $password): void
    {
        echo "User {$username} logged in using Database\n";
    }
}

class GoogleAuth implements Auth
{
    public function login(string $username, string $password): void
    {
        echo "User {$username} logged in using Google OAuth\n";
    }
}

class FacebookAuth implements Auth
{
    public function login(string $username, string $password): void
    {
        echo "User {$username} logged in using Facebook OAuth\n";
    }
}

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

echo "\n";

/*
Ringkasan:
1. Polymorphism dengan overriding → method yang sama hasil berbeda.
2. parent:: → memanggil logika parent sambil menambahkan logika baru.
3. Abstract class → kerangka method yang harus diimplementasi.
4. Interface → kontrak method, class berbeda bisa punya implementasi sendiri.
5. Real web case → login system dengan banyak cara autentikasi.
*/
