<?php
/*
Encapsulation dalam PHP adalah konsep OOP untuk menyembunyikan data (properties)
agar tidak bisa diakses langsung dari luar class, melainkan melalui method (getter dan setter).
Hal ini membuat kode lebih aman, terstruktur, dan mudah dipelihara.
*/

echo "--------------------------------------------------- Encapsulation in PHP ---------------------------------------------------" . "\n\n";

/*
1. Basic Encapsulation with private property
- Menggunakan private untuk menyembunyikan property.
- Mengakses data hanya melalui getter dan setter.
*/
echo "1. Basic Encapsulation with private property\n\n";

class User
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}

$john = new User("John Smith");
echo $john->getName() . "\n"; // John Smith
$john->setName("Michael Brown");
echo $john->getName() . "\n"; // Michael Brown

echo "\n";

/*
2. Public, Private, Protected
- public bisa diakses dari mana saja.
- private hanya bisa diakses dalam class.
- protected bisa diakses oleh class ini dan turunannya.
*/
echo "2. Public, Private, Protected\n\n";

class Employee
{
    public string $position;
    private float $salary;
    protected string $name;

    public function __construct(string $position, float $salary, string $name)
    {
        $this->position = $position;
        $this->salary = $salary;
        $this->name = $name;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }
}

$anna = new Employee("Manager", 7500.00, "Anna Johnson");
echo $anna->position . "\n";         // Manager
echo $anna->getSalary() . "\n";      // 7500
$anna->setSalary(8000.00);
echo $anna->getSalary() . "\n";      // 8000

echo "\n";

/*
3. Encapsulation with Validation
- Setter digunakan untuk validasi sebelum data disimpan.
- Contoh: validasi nama produk tidak boleh kosong, harga tidak boleh negatif.
*/
echo "3. Encapsulation with Validation\n\n";

class Product
{
    private string $name;
    private float $price;

    public function __construct(string $name, float $price)
    {
        $this->setName($name);
        $this->setPrice($price);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        if (empty($name)) {
            throw new Exception("Product name cannot be empty");
        }
        $this->name = $name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        if ($price < 0) {
            throw new Exception("Price cannot be negative");
        }
        $this->price = $price;
    }
}

$laptop = new Product("Laptop Dell", 1200.00);
echo $laptop->getName() . " - $" . $laptop->getPrice() . "\n"; // Laptop Dell - $1200
$laptop->setPrice(1350.00);
echo $laptop->getName() . " - $" . $laptop->getPrice() . "\n"; // Laptop Dell - $1350

echo "\n";

/*
4. Encapsulation in Inheritance
- protected property bisa digunakan oleh child class.
- Data tetap terlindungi tapi dapat diakses lewat pewarisan.
*/
echo "4. Encapsulation in Inheritance\n\n";

class Account
{
    protected string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->setPassword($password);
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    protected function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}

class CustomerAccount extends Account
{
    public function login(string $password): void
    {
        if ($this->verifyPassword($password)) {
            echo "Customer {$this->username} logged in successfully\n";
        } else {
            echo "Login failed for {$this->username}\n";
        }
    }
}

$customer = new CustomerAccount("lisa", "mypassword");
$customer->login("mypassword");   // Customer lisa logged in successfully
$customer->login("wrongpass");    // Login failed for lisa

echo "\n";

/*
5. Real Web Example: User Registration & Authentication
- Enkapsulasi digunakan untuk melindungi data sensitif (misalnya password).
- Password tidak boleh bisa diakses langsung, hanya bisa diatur dan diverifikasi.
*/
echo "5. Real Web Example: User Registration & Authentication\n\n";

class AuthUser
{
    private string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->setPassword($password);
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function verify(string $password): bool
    {
        return password_verify($password, $this->password);
    }
}

$authUser = new AuthUser("david", "securePass123");
echo "Username: " . $authUser->getUsername() . "\n";  // Username: david
echo $authUser->verify("securePass123") ? "Login success\n" : "Login failed\n"; // Login success
echo $authUser->verify("wrongPass") ? "Login success\n" : "Login failed\n";     // Login failed

echo "\n";
