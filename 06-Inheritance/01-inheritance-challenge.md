# PHP Inheritance Challenges

## Easy

1. Buat class `User` dengan properti `public $name`.

   - Buat class `Admin` yang mewarisi `User`.
   - Tambahkan method `showAdminInfo()` di `Admin` untuk menampilkan:
     ```
     Hello, I am Admin {name}
     ```

2. Buat class `Page` dengan method `render($title)`.

   - Buat class `HomePage` yang mewarisi `Page` tanpa menambahkan method baru.
   - Panggil method `render("Welcome Page")`.
   - Output:
     ```
     Rendering page: Welcome Page
     ```

3. Buat class `Controller` dengan method `handleRequest()`.
   - Buat class `ApiController` yang override method tersebut.
   - Tampilkan:
     ```
     Handling request in API controller
     ```

---

## Medium

4. Buat class `BaseController` dengan method `execute()`.

   - Override di `UserController` dan tambahkan `parent::execute()` sebelum menampilkan `"Executing user-specific logic"`.
   - Output:
     ```
     Executing base logic
     Executing user-specific logic
     ```

5. Buat class `Account` dengan properti `protected $role`.

   - Buat class `Moderator` yang mewarisi `Account` dan method `showRole()`.
   - Output:
     ```
     User role: Moderator
     ```

6. Buat class `BasicUser` dengan properti `public $name`.
   - Buat class `Editor` yang mewarisi `BasicUser` dengan method `editPost()`.
   - Buat class `SuperEditor` yang mewarisi `Editor` dengan method `deletePost()`.
   - Uji dengan nama `"Alex"`.
   - Output:
     ```
     Alex is editing a post
     Alex is deleting a post
     ```

---

## Hard

7. Buat class `Core` dengan method `final config()`.

   - Buat class `WebCore` yang mewarisi `Core`.
   - Tambahkan method `boot()` dengan output:
     ```
     WebCore booting...
     ```
   - Panggil kedua method tersebut.

8. Buat class `AppUser` dengan properti:

   - `public $username`,
   - `private $password`,
   - `protected $role`.
   - Tambahkan method `doLogin($password)` yang memverifikasi password menggunakan `password_verify()`.
   - Uji dengan `"Emily", "adminPass", "Admin"`.

9. Buat class `AdminUser` yang mewarisi `AppUser`.

   - Tambahkan method `accessDashboard()` untuk menampilkan:
     ```
     Admin Dashboard access granted for {username}
     ```
   - Uji login berhasil lalu akses dashboard.

10. Simulasikan **Mini CMS System**:
    - Class `Content` dengan `public $title`.
    - Class `Post` mewarisi `Content` dengan method `publish()`.
    - Class `Page` mewarisi `Content` dengan method `render()`.
    - Class `AdminContent` mewarisi `Post` dan `Page` (pakai pewarisan bertingkat).
    - Uji alur: buat post `"My First Post"` lalu publish, buat page `"About Us"` lalu render.
