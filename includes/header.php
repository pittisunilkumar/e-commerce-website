<?php

    session_start();
    include("includes/db.php");
    include("functions/functions.php");

?>

<!DOCTYPE html>
<html>

    <head>
        <title>online shopping</title>
        <link href="styles/style.css" rel="stylesheet" media="all"/>
        <script src="js/jquery-3.4.1.js"></script>
        <style>
            .profile img{
                width:27px;
                height:27px;
                position:relative;
                top:-1.8px;
                border-radius:10px;
                
            }

            .profile ul{
                list-style: none;
                position:relative;
            }

            .profile ul a{
                line-height:35px;
                color:black;
                text-decoration:none;
            }

            .profile ul a:hover{
                text-decoration:underline;
            }
            .profile ul li ul{
                position:absolute;
                top:40px;
                right:1px;
                white-space:nowrap;
                width:auto;
                background:white;
                z-index:11;
                display:none;

            }

            .profile ul li ul li a{
                padding:2px 25px 2px 15px;

            }


            .profile{
                float:left;
                height:35px;
                line-height:35px;
                position:relative;
                top:15px;
                margin-left:35px;
            }

        </style>
    </head>

    <body>

        <div class="main_wrapper">

            <div class="header_wrapper">

                <div class="header_logo">
                    <a href="index.php">
                        <img id="logo" src="images/metrixcode100x30.png"/>
                    </a>

                </div>

                <div id="form">
                    <form method="get" action="resuts.php" enctype="multipart/form-data">
                        <input type="text" name="user_query" placeholder="Search a product"/>
                        <input type="submit" name="search" value="Search"/>
                    </form>

                </div>

                <div class="cart">
                    <ul>
                        <li class="dropdown_header_cart">
                            <div id="notification_total_art" class="shopping_cart">
                                <img src="images/cart_icon.png" id="cart_image">
                                <div class="noti_cart_number" style="background:red;position:absolute;top:-5px;left:25px;padding:1px 3px 1px 3px;color:white;">
                                    <?php 
                                        total_items();
                                    ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <?php if(!isset($_SESSION['user_id'])){?>


                <div class="register_login">
                    <div class="login">
                        <a href="index.php?action=login">Login</a>
                    </div>
                    <div class="register">
                        <a href="register.php">Register</a>
                    </div>
                </div>

                <?php }else{ ?>

                    <?php 

                    $select_user = mysqli_query($con,"select * from users where id='$_SESSION[user_id]'");
                    $data_user = mysqli_fetch_array($select_user);
                        
                    ?>

                    <div class="profile">
                        <ul>
                            <li class="dropdown_header">
                                <a>

                                <?php if($data_user['image']!=''){?>
                                    <span><img src="upload-files/<?php echo $data_user['image']; ?>"></span>
                                <?php }else{ ?>

                                    <span><img src="images/profile-icon.png"></span>

                                <?php } ?>
                                </a>
                                <ul class="dropdown_menu_header">
                                    <li><a href="my_account.php">Account Setting</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>

                <?php } ?>

            </div>

            <?php include('js/drop_down_menu.php');?>
            
            