<?php
namespace App\Mailer; 
use Cake\Mailer\Mailer;
use App\Model\Table;
use Cake\ORM\TableRegistry;    
class AnswersDetailMailer extends Mailer
{
   public function welcome($id)
   {
       $this->to($id) // add email recipient
       ->emailFormat('html') // email format
       ->subject('Query Reply') //  subject of email
       ->viewVars([   // these variables will be passed to email template defined in step 5 with 

       'useremail'=>strtolower($id)
       ])
       // the template file you will use in this email
      ->template('answerreply') ;// By default template with same name as method name is used.
       // the layout  'default.ctp’ file you will use in this email
       //->layout(default); //optional field
    }
}