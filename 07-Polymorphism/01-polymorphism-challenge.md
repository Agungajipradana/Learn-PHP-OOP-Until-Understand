# PHP Polymorphism Challenges

## Easy

1. Buat class `Person` dengan method `introduce()` yang menampilkan:

   ```
   Hello, I am {name}
   ```

   - Buat class `Teacher` yang override method `introduce()` dengan output:

     ```
     Hello, I am Teacher {name}
     ```

   - Buat class `Doctor` yang override method `introduce()` dengan output:

     ```
     Hello, I am Doctor {name}
     ```

   - Uji dengan nama `"John Smith"` untuk Teacher dan `"Lisa Adams"` untuk Doctor.

---

2. Buat class `BaseController` dengan method `handle()` yang menampilkan:

   ```
   Handling base logic
   ```

   - Override method `handle()` di `ApiController` dengan tambahan `parent::handle()` sebelum menampilkan:

     ```
     Handling API-specific logic
     ```

   - Output:

     ```
     Handling base logic
     Handling API-specific logic
     ```

---

3. Buat abstract class `Animal` dengan abstract method `makeSound()`.

   - Buat class `Dog` yang mengimplementasikan `makeSound()` dengan output:

     ```
     Buddy says: Woof!
     ```

   - Buat class `Cat` yang mengimplementasikan `makeSound()` dengan output:

     ```
     Luna says: Meow!
     ```

---

## Medium

4. Buat interface `PaymentMethod` dengan method `pay($amount)`.

   - Buat class `CreditCard` yang mengimplementasikan `PaymentMethod` dengan output:

     ```
     Paid ${amount} using Credit Card
     ```

   - Buat class `PayPal` dengan output:

     ```
     Paid ${amount} using PayPal
     ```

   - Buat class `Bitcoin` dengan output:

     ```
     Paid ${amount} using Bitcoin
     ```

   - Uji dengan `$amount = 100.50`.

---

5. Buat interface `Auth` dengan method `login($username, $password)`.

   - Buat class `DatabaseAuth` yang mengimplementasikan `login()` dengan output:

     ```
     User {username} logged in using Database
     ```

   - Buat class `GoogleAuth` yang mengimplementasikan `login()` dengan output:

     ```
     User {username} logged in using Google OAuth
     ```

   - Buat class `FacebookAuth` yang mengimplementasikan `login()` dengan output:

     ```
     User {username} logged in using Facebook OAuth
     ```

   - Uji login dengan user `"Michael"`.

---

6. Buat abstract class `Notification` dengan abstract method `send($message)`.

   - Buat class `EmailNotification` yang menampilkan:

     ```
     Sending Email: {message}
     ```

   - Buat class `SMSNotification` yang menampilkan:

     ```
     Sending SMS: {message}
     ```

   - Buat class `PushNotification` yang menampilkan:

     ```
     Sending Push Notification: {message}
     ```

   - Uji dengan pesan `"Welcome to our platform!"`.

---

## Hard

7. Buat sistem **Shape Calculator** menggunakan Polymorphism:

   - Buat abstract class `Shape` dengan abstract method `getArea()`.
   - Buat class `Circle` dengan constructor `($radius)` dan implementasi `getArea()`.
   - Buat class `Rectangle` dengan constructor `($width, $height)` dan implementasi `getArea()`.
   - Buat class `Triangle` dengan constructor `($base, $height)` dan implementasi `getArea()`.
   - Uji beberapa bentuk dan tampilkan luasnya.

---

8. Buat interface `ReportGenerator` dengan method `generate($data)`.

   - Buat class `PDFReport` yang menampilkan:

     ```
     Generating PDF Report: {data}
     ```

   - Buat class `ExcelReport` yang menampilkan:

     ```
     Generating Excel Report: {data}
     ```

   - Buat class `HTMLReport` yang menampilkan:

     ```
     Generating HTML Report: {data}
     ```

   - Uji dengan data `"Sales Data 2025"`.

---

9. Buat simulasi **Payment Gateway**:

   - Interface `Gateway` dengan method `process($amount)`.
   - Class `StripeGateway`, `PayPalGateway`, `SquareGateway` masing-masing implementasi dengan output berbeda.
   - Buat fungsi `checkout(Gateway $gateway, $amount)` yang memanggil `process($amount)`.
   - Uji dengan tiga gateway berbeda untuk amount `200`.

---

10. Simulasikan **User Notification System**:

    - Interface `Notifier` dengan method `notify($user, $message)`.
    - Buat class `EmailNotifier`, `SMSNotifier`, dan `SlackNotifier`.
    - Setiap class menampilkan notifikasi dengan cara berbeda, contoh:

      ```
      Sending Email to {user}: {message}
      Sending SMS to {user}: {message}
      Sending Slack Message to {user}: {message}
      ```

    - Uji notifikasi untuk user `"Emily"` dengan pesan `"Your order has been shipped!"`.
