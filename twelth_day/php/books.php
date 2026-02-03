<?php
   class Books {
      
      var $price;
      var $title;
      
     
      function setPrice($par){
         $this->price = $par;
      }
      
      function getPrice(){
         echo $this->price ."<br/>";
      }
      
      function setTitle($par){
         $this->title = $par;
      }
      
      function getTitle(){
         echo $this->title ." <br/>";
      }
   }

$physics = new Books;
$maths = new Books;
$chemistry = new Books;

$physics->setTitle( "Physics for High School" );
$chemistry->setTitle( "Advanced Chemistry" );
$maths->setTitle( "Algebra" );

$physics->setPrice( 50 );
$chemistry->setPrice( 75 );
$maths->setPrice( 100 );

$physics->getTitle();
$chemistry->getTitle();
$maths->getTitle();

$physics->getPrice();
$chemistry->getPrice();
$maths->getPrice();

?>