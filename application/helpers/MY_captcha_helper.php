<?php

function captchaLogin()
{
        $vals = array(
          'img_path'   => './captcha/',
          'img_url'  => base_url().'captcha/',
          'img_width'  => '200',
          'img_height' => 30,
          'border' => 0, 
          'font_size'     => 16,
          'expiration' => 7200,
          'img_id'      => 'Imageid',
          // White background and border, black text and red grid
          'colors'        => array(
                  'background' => array(255, 255, 255),
                  'border' => array(255, 255, 255),
                  'text' => array(0, 0, 0),
                  'grid' => array(255, 40, 40)
          ),

        );
   
        // create captcha image
        $cap = create_captcha($vals);
      
        // store image html code in a variable
        $data['image'] = $cap['image'];
        $data['word'] = $cap['word'];
        $_SESSION['captchaCode'] = $cap['word'];
        return $data;
}
