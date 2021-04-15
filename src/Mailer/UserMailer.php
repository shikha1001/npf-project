<?php
namespace App\Mailer; 
use Cake\Mailer\Mailer;    
class UserMailer extends Mailer
{
public function registered($users)
{
// attach a text file 
/*$this->attachments([
// attach an image file 
'edit.png'=>[
'file'=>'files/welcome.png',
'mimetype'=>'image/png',
'contentId'=>'734h3r38'
]
])*/

$this->to($users->email) // add email recipient
->emailFormat('html') // email format
->subject(sprintf('Welcome %s')) //  subject of email
->viewVars([   // these variables will be passed to email template defined in step 5 with 
//name registered.ctp
'username'=> 'shikha',
'useremail'=>'sahushikha956@gmail.com'
])
// the template file you will use in this email
->template('registered') // By default template with same name as method name is used.
// the layout  'default.ctp’ file you will use in this email
->layout(default); //optional field
}}