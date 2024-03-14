<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
   <title>CRUD Operation | JSON</title>
</head>

<body>
   <main>
      <section>
         <div>
            <h3>JSON Page</h3>
         </div>
      </section>

      <section>
         <section>
            <h4>Invalid Members</h4>
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

      <section>
         <form action="../controllers/json-controller.php" method="POST">
            <input type="text" name="timestamp" id="timestamp" placeholder="Timestamp"><br>
            <input type="text" name="username" id="username" placeholder="Firstname" required><br>
            <input type="text" name="password" id="password" placeholder="Lastname" required><br>
            <input type="text" name="address" placeholder="Address" required><br>
            <input type="submit" value="Save Data XML">
         </form>
      </section>
   </main>
</body>

</html>