<?php

/*
Class and Objects adalah inti dari OOP (Object Oriented Programming).
Konsep ini sangat berguna dalam pengembangan web untuk membuat kode lebih terstruktur,
mudah di-maintain, serta bisa digunakan ulang.
*/

echo "--------------------------------------------------- Class and Objects ---------------------------------------------------" . "\n\n";

/*
1. Define a Class (Mendefinisikan Kelas)
    - Class adalah blueprint untuk membuat objek.
    - Berisi properti (data) dan metode (perilaku).
*/

echo "1. Define a Class\n\n";

class User
{
    public string $name;
    public string $email;

    public function introduce(): string
    {
        return "Hi, my name is {$this->name}. You can reach me at {$this->email}.";
    }
}

$john = new User();
$john->name = "John Carter";
$john->email = "john.carter@example.com";

echo $john->introduce() . "\n\n";
// Output: Hi, my name is John Carter. You can reach me at john.carter@example.com.


/*
2. Define Objects (Mendefinisikan Objek)
    - Objek adalah instance nyata dari sebuah class.
    - Kita bisa membuat banyak objek dari 1 class yang sama dengan nilai berbeda.
*/

echo "2. Define Objects\n\n";

$emma = new User();
$emma->name = "Emma Johnson";
$emma->email = "emma.johnson@example.com";

$liam = new User();
$liam->name = "Liam Williams";
$liam->email = "liam.williams@example.com";

echo $emma->introduce() . "\n";
// Output: Hi, my name is Emma Johnson. You can reach me at emma.johnson@example.com.

echo $liam->introduce() . "\n\n";
// Output: Hi, my name is Liam Williams. You can reach me at liam.williams@example.com.


/*
3. The $this Keyword
    - Digunakan untuk merujuk ke objek saat ini.
    - Berguna saat mengakses properti dan metode dari dalam class.
    - Juga bisa digunakan untuk method chaining.
*/

echo "3. The \$this Keyword\n\n";

class Cart
{
    private array $items = [];

    public function addItem(string $item): self
    {
        $this->items[] = $item;
        return $this; // method chaining
    }

    public function showCart(): string
    {
        return "Cart Items: " . implode(", ", $this->items);
    }
}

$cart = new Cart();
echo $cart->addItem("Laptop")->addItem("Mouse")->showCart() . "\n\n";
// Output: Cart Items: Laptop, Mouse


/*
4. instanceof
    - Digunakan untuk memeriksa apakah sebuah objek adalah instance dari class tertentu.
    - Sangat berguna dalam validasi pada aplikasi web, misalnya saat autentikasi.
*/

echo "4. instanceof\n\n";

interface Authenticatable
{
    public function login(string $email, string $password): bool;
}

class Member implements Authenticatable
{
    private string $name;

    // Constructor wajib ada parameter $name
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function login(string $email, string $password): bool
    {
        return $email === strtolower($this->name) . "@example.com" && $password === "secret";
    }
}

class Admin extends Member
{
    public function manageUsers(): string
    {
        return "Admin can manage users.";
    }
}

// Membuat object dengan parameter di constructor
$emma = new Member("Emma");
$jack = new Admin("Jack");

// instanceof checks
echo "Is \$emma a Member? " . ($emma instanceof Member ? "Yes" : "No") . "\n"; // Yes
echo "Is \$emma an Admin? " . ($emma instanceof Admin ? "Yes" : "No") . "\n";   // No
echo "Is \$jack a Member? " . ($jack instanceof Member ? "Yes" : "No") . "\n"; // Yes
echo "Is \$jack Authenticatable? " . ($jack instanceof Authenticatable ? "Yes" : "No") . "\n\n"; // Yes


/*
5. Real Web Example
    - Class Response digunakan untuk mengembalikan data dalam format JSON.
    - Sering dipakai dalam pembuatan API.
*/

echo "5. Real Web Example\n\n";

class Response
{
    public function json(array $data): string
    {
        return json_encode($data);
    }
}

$response = new Response();
echo $response->json([
    "status" => "success",
    "message" => "Data fetched successfully",
    "data" => ["id" => 1, "name" => "Oliver Smith"]
]) . "\n";

// Output: {"status":"success","message":"Data fetched successfully","data":{"id":1,"name":"Oliver Smith"}}
