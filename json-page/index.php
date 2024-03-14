<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
   <link rel="stylesheet" href="../css/json-style.css">
   <title>CRUD Operation | JSON</title>
</head>

<body>
   <header class="h-content">
      <section class="h-content__section-left">
         <section>
            <img class="h-content__logo" src="../files/images/JC Logo Blue.png" alt="">
         </section>
         <section>
            <h3>JSON PAGE</h3>
         </section>
      </section>
      <section>
         <button id="returnMainButton" class="h-content__btn" onclick="returnMainIndex()">Return Index</button>
      </section>
   </header>
   <main class="m-content">
      <section class="m-content__sections m-content__left-sections">
         <form class="m-content__form" action="../controllers/json-controller.php" method="POST">
            <div>
               <h4 class="m-content__form-header">Register Invalid Account</h4>
            </div>
            <div>
               <div>
                  <label class="m-content__form-lbl" for="">Timestamp:</label>
               </div>
               <div>
                  <input class="m-content__form-input" type="text" name="timestamp" id="timestamp" placeholder="Timestamp">
               </div>
            </div>

            <div>
               <div>
                  <label class="m-content__form-lbl" for="">Firstname:</label>
               </div>
               <div>
                  <input class="m-content__form-input" type="text" name="username" id="username" placeholder="Firstname" required>
               </div>
            </div>

            <div>
               <div>
                  <label class="m-content__form-lbl" for="">Lastname:</label>
               </div>
               <div>
                  <input class="m-content__form-input" type="text" name="password" id="password" placeholder="Lastname" required>
               </div>
            </div>

            <div>
               <div>
                  <label class="m-content__form-lbl" for="">Address:</label>
               </div>
               <div>
                  <input class="m-content__form-input" type="text" name="address" placeholder="Address" required>
               </div>
            </div>

            <div>
               <input class="form__btn-submit" type="submit" value="Save Data XML">
            </div>
         </form>
      </section>

      <section class="m-content__sections m-content__table">
         <section>
            <h4>Invalid Accounts</h4>
         </section>
         <section>
            <table id="invalidMembersTable" class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th>Timestamp</th>
                     <th>Username</th>
                     <th>Password</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  // Fetch data from JSON file
                  $json_data = file_get_contents('../json/invalid-members.json');
                  $members = json_decode($json_data, true);

                  // Display data in table
                  foreach ($members as $member) {
                     echo "<tr>";
                     echo "<td>" . $member['id'] . "</td>";
                     echo "<td>" . $member['username'] . "</td>";
                     echo "<td>" . $member['password'] . "</td>";
                     echo "</tr>";
                  }
                  ?>
               </tbody>
            </table>
         </section>
      </section>
      </section>
   </main>

   <script src="../js/script.js"></script>
</body>

</html>