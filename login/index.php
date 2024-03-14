<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>CRUD Operation | Login</title>
   <link rel="stylesheet" href="../css/login-style.css">
</head>

<body>
   <header class="h-content">
      <section>
         <img class="h-content__logo" src="../files/images/JC Logo Blue.png" alt="">
      </section>
   </header>
   <main class="whole-content">
      <section class="whole-content__left">
         <img class="whole-content__left left-illustration" src="../files/images/Computer login-rafiki.png" alt="">
      </section>

      <section class="whole-content__right">
         <section id="section-form__login" class="whole-content__right section-form w3-animate-left">
            <form class="section-form__login-register" action="../controllers/controller.php" method="post">
               <div>
                  <h1 class="section-form__login-register--header">Login</h1>
               </div>

               <div>
                  <div>
                     <label class="section-form__login-register--lbl" for="">Username:</label>
                  </div>
                  <div>
                     <input class="section-form__login-register--input" type="text" name="username" placeholder="Username" required>
                  </div>
               </div>

               <div>
                  <div>
                     <label class="section-form__login-register--lbl" for="">Password:</label>
                  </div>
                  <div>
                     <input class="section-form__login-register--input" type="password" name="password" placeholder="Password" required>
                  </div>
               </div>

               <div>
                  <button class="section-form__login-register--submit-btn" type="submit" name="login">Login</button>
               </div>
            </form>

            <div style="display: flex; justify-content: center; margin-top: 10px;">
               <button class="section-form__login-reg-btn" onclick="openRegisterContent()">Register Account</button>
            </div>
         </section>

         <section id="section-form__register" class="whole-content__right section-form w3-animate-right" style="display: none;">
            <form class="section-form__login-register" action="../controllers/controller.php" method="post">
               <div>
                  <h1 class="section-form__login-register--header">Register</h1>
               </div>

               <div>
                  <div>
                     <label class="section-form__login-register--lbl" for="">Firstname</label>
                  </div>
                  <div>
                     <input class="section-form__login-register--input" type="text" name="username" placeholder="Firstname" required>
                  </div>
               </div>

               <div>
                  <div>
                     <label class="section-form__login-register--lbl" for="">Lastname:</label>
                  </div>
                  <div>
                     <input class="section-form__login-register--input" type="password" name="password" placeholder="Lastname" required>
                  </div>
               </div>

               <div>
                  <div>
                     <label class="section-form__login-register--lbl" for="">Address:</label>
                  </div>
                  <div>
                     <input class="section-form__login-register--input" type="text" name="address" placeholder="Address" required>
                  </div>
               </div>

               <div>
                  <button class="section-form__login-register--submit-btn" type="submit" name="register">Register</button>
               </div>
            </form>

            <div style="display: flex; justify-content: center; margin-top: 10px;">
               <button class="section-form__login-reg-btn" onclick="openLoginContent()">Return to Login</button>
            </div>
         </section>

      </section>
   </main>

   <script src="../js/script.js"></script>
</body>

</html>