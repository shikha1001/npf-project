public function updatedata()
 {
      $this->autoRender = false;
    $data = $this->connection->update('users',["first_name" =>"rishi","id"=>9])->save('users');
    print_r($data);
 }
   public function selectdata()
 {
   $this->autoRender=false;
  $data= $this->connection->execute("select * from users")->fetchAll();

 print_r($data);
  /*foreach($data as $key=>$value)
  {
  	echo"Name: ".$value->first_name. $value->last_name"<br>" $value->email;

  }*/
}
  public function selectall()
  {
  	$this->autoRender = false;
  	$this->loadModel('Users');
  	$resultset = $this->Users->find()->all();//all() method select all data 

    foreach ($resultset as $row)
    {
        echo $row->first_name . $row->last_name;
        echo "<br>";
    }
    
  }

 public function create()
 {   
 	$this->autoRender =false;
 	$data= $this->connection->insert("Users",[
   "first_name" => "Subhi",
   "last_name"=>"singh",
   "email" => "subhi@gmail.com",
   "password" => "12345",
   "city"=>"DELHI"
   ]); 
 	print_r($data);
 	if($this->request->is("post"))
 	{
      //$data = $this->request->data;
      print_r($data);
    }
     $this->Flash->set('You have successfully registered',
     [ 'element' => 'success']);
 }
   /*public function updatedata()
  { 
     $this->autoRender = false;
     $data = $this->connection->update('Users',["first_name" =>"rakesh","id"=>5]);
     print_r($data);
 /* }*/
 
/*  public function selectdata()
{
    $this->autoRender=false;
   $data= $this->connection->execute("select * from users")->fetchAll();
   print_r($data);
}*/

  public function insertdata()
  {
  	$this->autoRender = false;
  	 $data = $this->connection->insert('Users',[
   "id"=>'1',
   "first_name"=>"Pratibha",
   "last_name"=>"gupta",
   "email"=>"Pratibha@gmail.com",
   "password"=>"123455",
   "city" =>"Delhi"

   ]);
  	 print_r($data);
  	 foreach($data as $row)
  	 {
  	 	echo $row->first_name . $row->last_name;
        echo "<br>";
     }
  }
  //table regisrty method
  public function updatedat1()
  {


$usersTable = TableRegistry::get('Users');
//$usersTable = ConnectionManager::get('Users');
$user = $usersTable->newEntity();//insert data then use newEntity method;

$user->first_name= 'Monika';
$user->email ='monika@gmail.com';
$user->password = 12345;
$user->city = 'Allahabad';


if ($data=$usersTable->update($user))
  {
    // The $user entity contains the id now
    $id = $user->id;
    echo $id;
    print_r($data);
   }
}



public function update()
{
      
	$this->autoRender = false;
      $user = $usersTable->get(5); // Return article with id 8

      $user->first_name = 'KHUSHI';
      $data=$usersTable->save($user);
      print_r($data);
}
public function delete()
{
	
	//$user = $this->Users->get(14);
    $result = $this->Users->deleteall($user);
    print_r($result);
    print_r($user);
}