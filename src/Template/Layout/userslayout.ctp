<!doctype html>
<html>
<head>
<title> <?= $this->fetch('title') ?></title>
	
</head>


<body>
  <?= $this->element('header')  ?>
    <div class="container clearfix">
    	 <?= $this->Flash->render() ?> 
        <?= $this->fetch('content') ?>
    </div>
   <footer>
     <?= $this->element('footer')  ?>
   </footer>
</body>





</html>