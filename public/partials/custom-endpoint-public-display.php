<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/Orinwebsolutions
 * @since      1.0.0
 *
 * @package    Custom_Endpoint
 * @subpackage Custom_Endpoint/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php get_header(); ?>
<div class="container">
        
        <?php
            if(!empty($result))
            {
        ?>
            <div class="loader"></div>
            <div class="main-container">
            <div class="row text-center">
                <div class="col-sm-12 col-md-2">
                    <strong>ID</strong>
                </div>
                <div class="col-sm-12 col-md-2">
                    <strong>Name</strong>
                </div>
                <div class="col-sm-12 col-md-2">
                    <strong>Username</strong>
                </div>
                <div class="col-sm-12 col-md-2">
                    <strong>Email</strong>
                </div>
                <div class="col-sm-12 col-md-2">
                    <strong>Phone</strong>
                </div>
                <div class="col-sm-12 col-md-2">
                    <strong>Address</strong>
                </div>
            </div>
            <?php 
            $nonce = wp_create_nonce("user_profile_nonce");
                foreach ($result as $key => $value) {
            ?>
            <div class="row text-center">
                <div class="col-sm-12 col-md-2">
                    <a class="link user_id" data-user_id="<?php echo $value->id;?>"  data-user_nonce="<?php echo $nonce;?>" href="#"><?php echo $value->id; ?></a>
                </div>
                <div class="col-sm-12 col-md-2">
                    <a class="link user_id" data-user_id="<?php echo $value->id;?>" data-user_nonce="<?php echo $nonce;?>" href="#"><?php echo $value->name; ?></a>
                </div>
                <div class="col-sm-12 col-md-2">
                    <a class="link user_id" data-user_id="<?php echo $value->id;?>" data-user_nonce="<?php echo $nonce;?>" href="#"><?php echo $value->username; ?></a>
                </div>
                <div class="col-sm-12 col-md-2">
                    <?php echo $value->email; ?>
                </div>
                <div class="col-sm-12 col-md-2">
                    <?php echo $value->phone; ?>
                </div>
                <div class="col-sm-12 col-md-2">
                    <?php
                    echo sprintf(
                        '%s, %s, %s, %s',
                        $value->address->street,
                        $value->address->suite,
                        $value->address->city,
                        $value->address->zipcode
                    );
                    // echo $value->address->street.', ';
                    //  echo $value->website; 
                     ?>
                </div>
            </div>
            <?php
                }
            ?>
            </div>
            <div class="user_detail">
                <div class=header>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="#" id="gobackbtn">Go back</a>
                            <h2>User details<h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-2">
                        <strong>Name:</strong>
                    </div>
                    <div class="col-sm-12 col-md-10" id="name">
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <strong>Username:</strong>
                    </div>
                    <div class="col-sm-12 col-md-10" id="username">
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <strong>Email:</strong>
                    </div>
                    <div class="col-sm-12 col-md-10" id="email">
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <strong>Address:</strong>
                    </div>
                    <div class="col-sm-12 col-md-10" id="address">
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <strong>Phone:</strong>
                    </div>
                    <div class="col-sm-12 col-md-10" id="contactNo">
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <strong>Website:</strong>
                    </div>
                    <div class="col-sm-12 col-md-10" id="website">
                    </div>
                    <div class="col-sm-12 col-md-2">
                        <strong>Company:</strong>
                    </div>
                    <div class="col-sm-12 col-md-10" id="company">
                    </div>

                </div>
            </div>
        <?php
        }
        else
        {
        ?>
            <div class="row">
                <div class="col-sm-12">
                    No result found
                </div>
            </div>
        <?php 
        } 
        ?>
</div>
<?php get_footer(); ?>