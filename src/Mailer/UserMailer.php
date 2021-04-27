<?php
namespace App\Mailer; 
use Cake\Mailer\Mailer;    
class UserMailer extends Mailer
{
   public function welcome($users)
   {
       $this->to($users->email) // add email recipient
       ->emailFormat('html') // email format
       ->subject('Successfully Registration') //  subject of email
        ->viewVars([  
        'username'=> ucfirst($users->name),
         'useremail'=>strtolower($users->email)
         ])  // these variables will be passed to email template defined  

         ->template('registered') ;// By default template with same name as method name is used.
          // the layout  'default.ctp’ file you will use in this email
        //->layout(default); //optional field
    }
     public function send_email_query($id)
   {
       $this->to($id) // add email recipient
       ->emailFormat('html') // email format
       ->subject('Query Reply') //  subject of email
       ->viewVars([   // these variables will be passed to email template  

       'useremail'=>strtolower($id)
       ])
       // the template file you will use in this email
      ->template('answerreply') ;// By default template with same name as method name is used.
       // the layout  'default.ctp’ file you will use in this email
       //->layout(default); //optional field
    }
}