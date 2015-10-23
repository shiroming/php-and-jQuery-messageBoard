<?php

session_start();
require_once 'class/Token.php';

$token = Token::generate();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>message</title>
    <link rel="stylesheet" type="text/css" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        body {
            margin-top: 2em;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <p class="text-muted">The recent message.</p>
                <div class="messages">
                    <div class="message">
                        <script id="messageTemplate" type="app/template">
                            <div class="message">
                                <p><b>{{ name }}: </b>{{ message }}</p>
                            </div>
                        </script>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <form action="api/post.php">
                    <input type="hidden" id="token" name="token" value="<?= $token ?>">
                    <!-- Name field -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" id="name" value="">
                    </div>

                    <!-- Message field -->
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control"></textarea>
                    </div>

                    <input type="submit" class="btn btn-default" value="Send">
                </form>
            </div>
        </div>
    </div>

    <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>