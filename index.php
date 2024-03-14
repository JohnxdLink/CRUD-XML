<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation XML</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./css/custom-style.css">
</head>

<body>
    <div class="custom-header">
        <div class="custom-header__left-sect">
            <div class="left-sect__left">
                <img class="left-sect__left--logo" src="./files/images/JC Logo Blue.png" alt="Logo">
            </div>

            <div class="left-sect__right">
                <div>
                    <button>Home</button>
                </div>
                <div>
                    <button id="loginButton" onclick="redirectToLoginPage()">Login</button>
                </div>
                <div>
                    <button>About</button>
                </div>
            </div>
        </div>

        <div class="custom-header__right-sect">
            <button id="jsonButton" onclick="redirectToJsonPage()">Json Page</button>
        </div>
    </div>

    <div class="container">
        <h1 class="page-header text-center">CRUD Operation in XML Files using PHP</h1>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> New</a>
                <?php
                session_start();
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-info text-center" style="margin-top:20px;">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                <?php

                    unset($_SESSION['message']);
                }
                ?>
                <table class="table table-bordered table-striped" style="margin-top:20px;">
                    <thead>
                        <th>UserID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Address</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        //load xml file
                        $file = simplexml_load_file('files/members.xml');

                        foreach ($file->user as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->firstname; ?></td>
                                <td><?php echo $row->lastname; ?></td>
                                <td><?php echo $row->address; ?></td>
                                <td>
                                    <a href="#edit_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                    <a href="#delete_<?php echo $row->id; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </td>
                                <?php include('edit_delete_modal.php'); ?>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="custom-container">
        <section>
            <form action="controllers/save_delete_json.php" method="post">
                <button type="submit" name="save_json">Save JSON Format</button>
                <button type="submit" name="delete_json">Delete JSON File</button>
            </form>
        </section>
    </div>

    <?php include('add_modal.php'); ?>
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>