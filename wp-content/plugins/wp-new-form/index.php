<?php

/*
  Plugin Name: Our New Form Plugin
  Description: Creating a Form Plugim
  Version:1.0
  Author:Admin
*/
   function form_plugin()
   {?>
      <div class="form-wrap w-bor mb-20">
        <h2>Custom Form</h2>
         <form  action="" method="POST" enc >
          <input type="hidden" name="action" value="submit">
          
         <div class="form">
           <div>
           <label for="first_name">First Name<red>*</red></label>
           <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required="yes">
          </div></div>
          
         <div class="form">
           <label for="last_name">Last Name<red>*</red></label>
           <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required="yes">
          </div>
          
         <div class="form">
           <label for="email">Email Address<red>*</red></label>
           <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="yes">
         </div>
          
         <div class="form">
           <label for="phone">Phone Number<red>*</red></label>
           <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" required="yes">
          </div>

          <div class="form">
           <label for="comment">Comments<red>*</red></label>
           <input type="comment" class="form-control" name="comment" id="comment" placeholder="Comments" required="yes">
          </div>

          <div class="form">
           <label for="file">File<red>*</red></label>
           <input type="file" class="form-control" name="file" id="file" placeholder="File" required="yes">
          </div>
          
         <div class="form">
               <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
          
          </form>
     </div>



    <?php 
   }
   add_shortcode('new_form','form_plugin');

   function form_capture(){
     if(isset($_POST['submit'])){
       $firstname = sanitize_text_field($_POST['first_name']);
       $lastname = sanitize_text_field($_POST['last_name']);
       $email = sanitize_text_field($_POST['email']);
       $phone = sanitize_text_field($_POST['phone']);
       $file = sanitize_text_field($_POST['file']);
       $comment = sanitize_text_field($_POST['comment']);

      $to = 'abdul.nishar@ziffity.com';
      $headers = array('Content-Type: text/html; charset=UTF-8');
      $subject='Form Information';
      $message= 	" 
      Name:    $firstname $lastname\r\n <br/>
      Email:   $email\r\n <br/>
      Phone:   $phone\r\n <br/>
      comment: $comment
         ";
         $target_dir_array = wp_upload_dir();
         $target_dir = $target_dir_array['uploads/2022/06/'];
        $target = $target_dir . basename($_FILES['file']['name']);
         global $wpdb;
        $wpdb->insert('wp_form', array('firstname'=> $firstname, 'lastname'=> $lastname,'email'=>$email,'phone'=>$phone,'fcomment'=>$comment,'file'=>$target));
         
       if(wp_mail($to,$subject,$message,$headers,$file)){
        echo '<div class="alert alert-success pt-5 mt-5" role="alert">
        <center><h2>Thank you!<h2></center>
        </div>';
       }
      else {
        echo '<div class="alert alert-danger pt-5 mt-5" role="alert">
          <center><h2>Failed!</h2></center>
                  </div>';
                 
       }

     }
   }
   add_action('wp_head','form_capture');


   add_action('admin_menu', 'new_form_plugin');

   function new_form_plugin(){
    add_menu_page( 'Form Plugin Page', 'New Form Plugin', 'manage_options', 'test-plugin', 'details' );
}
 
function details() { ?>

  <div class="container admin">
  <h1>Form Details</h1>
       <table>
            <tr>
                 <th>Firstname</th>
                 <th>Lastname</th>
                 <th>Email</th>
                 <th>Phone</th>
                 <th>Comment</th>
                 <th>File</th>
            </tr>

            <?php
               global $wpdb;
               $result = $wpdb->get_results ( "SELECT * FROM wp_form" );
               foreach ( $result as $print ) {
          ?>
          <tr>
               <td><?php echo $print->FirstName;?></td>
               <td><?php echo $print->LastName;?></td>
               <td><?php echo $print->Email;?></td>
               <td><?php echo $print->phone;?></td>
               <td><?php echo $print->FComment;?></td>
               <td><a href="<?php echo $print->File;?>">View</a></td>
          </tr>
          <?php
          }
          ?>
     </table>
</div>

<?php }

add_action('admin_enqueue_scripts','reg_stylesheets');

function reg_stylesheets(){
  wp_enqueue_style('cover_stylesheet',plugins_url('style.css',__File__));
}


?>
