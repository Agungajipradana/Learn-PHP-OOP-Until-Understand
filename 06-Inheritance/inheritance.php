<?php
/*
Inheritance dalam PHP memungkinkan sebuah class (child) untuk mewarisi properti dan metode dari class lain (parent).
Ini sangat penting dalam pengembangan web karena membantu kita membangun struktur kode yang reusable, rapi, dan mudah dikelola.
*/

echo "--------------------------------------------------- Inheritance in PHP ---------------------------------------------------" . "\n\n";

/*
1. Basic Inheritance
- Class child mewarisi properti dari class parent.
- Contoh sederhana: User dan Admin.
*/
echo "1. Basic Inheritance\n\n";

class User
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class Admin extends User
{
    public function showAdminInfo(): void
    {
        echo "Hello, I am Admin {$this->name}\n";
    }
}

$john = new Admin("John Carter");
$john->showAdminInfo();
// Output:
// Hello, I am Admin John Carter

echo "\n";

/*
2. Method Inheritance
- Class child bisa langsung menggunakan method dari class parent tanpa menulis ulang.
- Berguna untuk menjaga DRY (Don't Repeat Yourself).
*/
echo "2. Method Inheritance\n\n";

class Page
{
    public function render(string $title): void
    {
        echo "Rendering page: {$title}\n";
    }
}

class HomePage extends Page
{
    // Tidak perlu menulis ulang render()
}

$homepage = new HomePage();
$homepage->render("Welcome Page");
// Output:
// Rendering page: Welcome Page

echo "\n";

/*
3. Method Overriding
- Class child dapat mengganti (override) method dari class parent.
- Sangat penting untuk kustomisasi perilaku.
*/
echo "3. Method Overriding\n\n";

class Controller
{
    public function handleRequest(): void
    {
        echo "Handling request in base controller\n";
    }
}

class ApiController extends Controller
{
    public function handleRequest(): void
    {
        echo "Handling request in API controller\n";
    }
}

$api = new ApiController();
$api->handleRequest();
// Output:
// Handling request in API controller

echo "\n";

/*
4. Using parent:: keyword
- Kita bisa tetap memanggil method parent meskipun sudah di-override.
- Berguna ketika kita hanya ingin menambah perilaku, bukan mengganti sepenuhnya.
*/
echo "4. Using parent:: keyword\n\n";

class BaseController
{
    public function execute(): void
    {
        echo "Executing base logic\n";
    }
}

class UserController extends BaseController
{
    public function execute(): void
    {
        parent::execute();
        echo "Executing user-specific logic\n";
    }
}

$userCtrl = new UserController();
$userCtrl->execute();
// Output:
// Executing base logic
// Executing user-specific logic

echo "\n";

/*
5. Protected Properties in Inheritance
- Properti protected dapat diakses oleh class turunan.
- Contoh nyata: role pada sistem user.
*/
echo "5. Protected Properties in Inheritance\n\n";

class Account
{
    protected string $role;

    public function __construct(string $role)
    {
        $this->role = $role;
    }
}

class Moderator extends Account
{
    public function showRole(): void
    {
        echo "User role: {$this->role}\n";
    }
}

$sophia = new Moderator("Moderator");
$sophia->showRole();
// Output:
// User role: Moderator

echo "\n";

/*
6. Multilevel Inheritance
- Class child bisa menjadi parent bagi class lain.
- Contoh: User → Editor → SuperEditor.
*/
echo "6. Multilevel Inheritance\n\n";

class BasicUser
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

class Editor extends BasicUser
{
    public function editPost(): void
    {
        echo "{$this->name} is editing a post\n";
    }
}

class SuperEditor extends Editor
{
    public function deletePost(): void
    {
        echo "{$this->name} is deleting a post\n";
    }
}

$alex = new SuperEditor("Alex Johnson");
$alex->editPost();
$alex->deletePost();
// Output:
// Alex Johnson is editing a post
// Alex Johnson is deleting a post

echo "\n";

/*
7. Final Keyword
- Jika class atau method diberi final, maka tidak bisa di-extend atau di-override.
- Berguna untuk menjaga keamanan kode inti (core logic).
*/
echo "7. Final Keyword\n\n";

class Core
{
    final public function config(): void
    {
        echo "Core configuration loaded\n";
    }
}

class WebCore extends Core
{
    // Tidak bisa override config()
    public function boot(): void
    {
        echo "WebCore booting...\n";
    }
}

$core = new WebCore();
$core->config();
$core->boot();
// Output:
// Core configuration loaded
// WebCore booting...

echo "\n";

/*
8. Real Web Example: User Authentication System
- Inheritance digunakan untuk memperluas fungsionalitas.
- Base User class menyimpan data umum.
- AdminUser menambahkan fitur khusus admin.
*/
echo "8. Real Web Example: User Authentication System\n\n";

class AppUser
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

    public function doLogin(string $password): void
    {
        if (password_verify($password, $this->password)) {
            echo "{$this->username} logged in as {$this->role}\n";
        } else {
            echo "Invalid credentials for {$this->username}\n";
        }
    }
}

class AdminUser extends AppUser
{
    public function accessDashboard(): void
    {
        echo "Admin Dashboard access granted for {$this->username}\n";
    }
}

$emily = new AdminUser("EmilyClark", "adminPass", "Admin");
$emily->doLogin("adminPass");
$emily->accessDashboard();
// Output:
// EmilyClark logged in as Admin
// Admin Dashboard access granted for EmilyClark