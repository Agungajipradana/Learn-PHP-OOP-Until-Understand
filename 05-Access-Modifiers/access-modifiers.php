<?php
/*
Access Modifiers dalam PHP digunakan untuk mengatur visibilitas (tingkat akses) dari properti dan metode dalam sebuah class.
Ada tiga jenis utama:
- public: dapat diakses dari mana saja (luar class, dalam class, maupun turunan).
- private: hanya bisa diakses dalam class itu sendiri.
- protected: bisa diakses dalam class itu sendiri dan class turunannya.
Sangat berguna dalam pengembangan web untuk menjaga keamanan data (encapsulation) dan struktur kode yang lebih baik.
*/

echo "--------------------------------------------------- Access Modifiers in PHP ---------------------------------------------------" . "\n\n";

/*
1. Basic Public Property
- Properti public dapat diakses dari luar class.
- Berguna untuk data yang memang boleh terbuka, misalnya username.
*/
echo "1. Basic Public Property\n\n";

class User
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

$jack = new User("Jack Miller");
echo $jack->name . "\n";
// Output:
// Jack Miller

echo "\n";

/*
2. Private Property
- Properti private hanya bisa diakses dari dalam class.
- Biasanya dipakai untuk data sensitif, seperti password.
*/
echo "2. Private Property\n\n";

class Account
{
    private string $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function showPassword(): string
    {
        return "Encrypted: " . sha1($this->password);
    }
}

$anna = new Account("mypassword123");
echo $anna->showPassword() . "\n";
// Output (hash berbeda-beda):
// Encrypted: 91dfd9ddb4198affc5c194cd8ce6d338fde470e2

echo "\n";

/*
3. Protected Property with Inheritance
- Properti protected bisa diakses oleh class turunan.
- Sangat berguna dalam konsep role-based access di web.
*/
echo "3. Protected Property with Inheritance\n\n";

class Employee
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class Manager extends Employee
{
    public function introduce(): void
    {
        echo "I am Manager {$this->name}\n";
    }
}

$mark = new Manager("Mark Lee");
$mark->introduce();
// Output:
// I am Manager Mark Lee

echo "\n";

/*
4. Mixing Public, Private, and Protected
- Kita bisa kombinasikan semua jenis access modifier.
- Contoh pada sistem login sederhana: username (public), password (private), role (protected).
*/
echo "4. Mixing Public, Private, and Protected\n\n";

class AuthUser
{
    public string $username;
    private string $password;
    protected string $role;

    public function __construct(string $username, string $password, string $role)
    {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    public function login(): void
    {
        echo "{$this->username} logged in as {$this->role}\n";
    }
}

class AdminUser extends AuthUser
{
    public function showRole(): void
    {
        echo "Admin role: {$this->role}\n";
    }
}

$emily = new AdminUser("EmilyClark", "secret123", "Administrator");
$emily->login();
$emily->showRole();
// Output:
// EmilyClark logged in as Administrator
// Admin role: Administrator

echo "\n";

/*
5. Overriding Method Visibility
- Dalam inheritance, method dari parent class bisa di-override dengan visibilitas yang lebih terbuka.
- Tidak boleh lebih sempit. Misalnya: protected → public.
*/
echo "5. Overriding Method Visibility\n\n";

class ParentClass
{
    protected function greet(): void
    {
        echo "Hello from Parent\n";
    }
}

class ChildClass extends ParentClass
{
    public function greet(): void
    {
        echo "Hello from Child\n";
    }
}

$obj = new ChildClass();
$obj->greet();
// Output:
// Hello from Child

echo "\n";

/*
6. Constructor Property Promotion (PHP 8+)
- Sejak PHP 8, kita bisa langsung menuliskan access modifiers di parameter constructor.
- Membuat kode lebih ringkas dan tetap aman.
*/
echo "6. Constructor Property Promotion (PHP 8+)\n\n";

class Product
{
    public function __construct(
        public string $name,
        private float $price,
        protected int $stock
    ) {}

    public function getInfo(): void
    {
        echo "{$this->name} costs {$this->price} with stock: {$this->stock}\n";
    }
}

$laptop = new Product("Laptop Dell", 1200, 5);
$laptop->getInfo();
// Output:
// Laptop Dell costs 1200 with stock: 5

echo "\n";

/*
7. Real Web Example: User Authentication System
- Access modifiers sangat penting untuk mengamankan data user di aplikasi web.
- Username bisa public (untuk ditampilkan).
- Password harus private (tidak bisa diakses langsung).
- Role bisa protected (untuk digunakan oleh subclass seperti Admin).
*/
echo "7. Real Web Example: User Authentication System\n\n";

class WebUser
{
    public string $username;
    private string $password;
    protected string $role;

    public function __construct(string $username, string $password, string $role)
    {
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->role = $role;
    }

    public function login(string $password): void
    {
        if (password_verify($password, $this->password)) {
            echo "{$this->username} successfully logged in as {$this->role}\n";
        } else {
            echo "Invalid credentials for {$this->username}\n";
        }
    }
}

class AdminPanel extends WebUser
{
    public function accessPanel(): void
    {
        echo "Access granted for role: {$this->role}\n";
    }
}

$liam = new AdminPanel("LiamSmith", "adminPass", "Admin");
$liam->login("adminPass");
$liam->accessPanel();
// Output:
// LiamSmith successfully logged in as Admin
// Access granted for role: Admin
