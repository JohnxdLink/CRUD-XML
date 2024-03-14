<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CRUD Operation | Login</title>
</head>

<body>
   <main>
      <section>
         <form action="../controllers/controller.php" method="post">
            <div>
               <h1>Login</h1>
               <input type="text" name="username" placeholder="Username" required><br>
               <input type="password" name="password" placeholder="Password" required><br>
               <button type="submit" name="login">Login</button>
            </div>
         </form>
      </section>

      <section>
         <form action="../controllers/controller.php" method="post">
            <div>
               <h1>Register</h1>
               <input type="text" name="username" placeholder="Username" required><br>
               <input type="password" name="password" placeholder="Password" required><br>
               <input type="text" name="address" placeholder="Address" required><br>
               <button type="submit" name="register">Register</button>
            </div>
         </form>
      </section>
   </main>
</body>

</html>