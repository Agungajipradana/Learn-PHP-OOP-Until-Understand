<?php
/*
Constructor dalam PHP adalah method khusus di dalam sebuah class yang otomatis dijalankan saat objek dibuat.
Sangat berguna dalam pengembangan web untuk inisialisasi data seperti user, produk, atau konfigurasi sistem.
*/

echo "--------------------------------------------------- Constructor in PHP ---------------------------------------------------" . "\n\n";

/*
1. Basic Constructor
- Constructor didefinisikan dengan __construct().
- Digunakan untuk memberikan nilai awal ke properti objek saat objek dibuat.
*/
echo "1. Basic Constructor\n\n";

class People
{
    public string $name;
    public string $email;

    // Constructor untuk inisialisasi data
    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function introduce(): string
    {
        return "Hi, my name is {$this->name}. You can contact me at {$this->email}.";
    }
}

$john = new People("John Carter", "john.carter@example.com");
echo $john->introduce() . "\n\n";
// Output: Hi, my name is John Carter. You can contact me at john.carter@example.com.

/*
2. Multiple Objects with Constructor
- Kita bisa membuat banyak objek dengan parameter berbeda menggunakan constructor yang sama.
*/
echo "2. Multiple Objects with Constructor\n\n";

$emma = new People("Emma Johnson", "emma.johnson@example.com");
$liam = new People("Liam Williams", "liam.williams@example.com");

echo $emma->introduce() . "\n";
// Output: Hi, my name is Emma Johnson. You can contact me at emma.johnson@example.com.
echo $liam->introduce() . "\n\n";
// Output: Hi, my name is Liam Williams. You can contact me at liam.williams@example.com.

/*
3. Default Values in Constructor
- Constructor juga bisa memiliki default value untuk parameter.
- Berguna dalam kasus web di mana data tidak selalu lengkap.
*/
echo "3. Default Values in Constructor\n\n";

class Product
{
    private string $name;
    private float $price;

    public function __construct(string $name, float $price = 100.0)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getInfo(): string
    {
        return "{$this->name} is priced at \${$this->price}.";
    }
}

$laptop = new Product("Laptop", 1200.0);
$mouse = new Product("Mouse"); // harga default 100.0

echo $laptop->getInfo() . "\n";
// Output: Laptop is priced at $1200.
echo $mouse->getInfo() . "\n\n";
// Output: Mouse is priced at $100.

/*
4. Constructor with Dependency Injection
- Constructor bisa menerima object lain (dependency).
- Umum di web development untuk menghubungkan antara class (misalnya service dengan database).
*/
echo "4. Constructor with Dependency Injection\n\n";

class Database
{
    public function connect(): string
    {
        return "Database connected successfully.";
    }
}

class UserService
{
    private Database $db;

    // Dependency injection via constructor
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getUserData(): string
    {
        return $this->db->connect() . " Fetched user data.";
    }
}

$db = new Database();
$userService = new UserService($db);
echo $userService->getUserData() . "\n\n";
// Output: Database connected successfully. Fetched user data.

/*
5. Real Web Example: API Response with Constructor
- Constructor digunakan untuk menerima data dan langsung membentuk response JSON.
- Sangat relevan untuk pembuatan REST API di web.
*/
echo "5. Real Web Example: API Response\n\n";

class ApiResponse
{
    private string $status;
    private string $message;
    private array $data;

    public function __construct(string $status, string $message, array $data = [])
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }

    public function toJson(): string
    {
        return json_encode([
            "status" => $this->status,
            "message" => $this->message,
            "data" => $this->data
        ]);
    }
}

$response = new ApiResponse("success", "User fetched successfully", [
    "id" => 1,
    "name" => "Oliver Smith",
    "email" => "oliver.smith@example.com"
]);

echo $response->toJson() . "\n";
// Output: {"status":"success","message":"User fetched successfully","data":{"id":1,"name":"Oliver Smith","email":"oliver.smith@example.com"}}
