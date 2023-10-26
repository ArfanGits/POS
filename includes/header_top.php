<?php
$obj = new adminback();
$links = $obj->display_links();

?>



<div class="header-top bg-main hidden-xs">
    <div class="container">
        <div class="top-bar left">
            <ul class="horizontal-menu">
                </i>
                <li><a href="#">First Come First Serve</a></li>
            </ul>
        </div>
        <div class="top-bar right">
            <ul class="horizontal-menu">
                <li><a href="user_login.php" class="login-link"><i class="biolife-icon icon-login"></i>
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        } else {
                            echo "Login";
                        }
                        ?>
                    </a></li>

            </ul>
        </div>
    </div>
</div>