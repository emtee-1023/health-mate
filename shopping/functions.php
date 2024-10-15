<?php
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="cart.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
            <header>
                <div class="content-wrapper">
                    <h1>Health Mate</h1>
                    <nav>
                        <a href="../index.php">Home</a>
                    </nav>
                    <div class="link-icons">
                        <a href="cart.php">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </header>
            <main>
    EOT;
    }
    // Template footer
    function template_footer() {
    $year = date('Y');
    echo <<<EOT
            </main>
            <footer>
                <div class="content-wrapper">
                    <p>&copy; $year, Health Mate</p>
                </div>
            </footer>
        </body>
    </html>
    EOT;
    }
?>