<?php
    class Book{
        private $id;
        private $title;
        private $author;
        
        public function __construct($id,$title,$author){
            $this->id = $id;
            $this->title = $title;
            $this->author = $author;
        }
        public function getId(){
            return $this->id;
        }
        public function getTitle(){
            return $this->title;
        }
        public function getAuthor(){
            return $this->author;
        }
        public function setId($id){
             $this->id = $id;
        }
        public function setTitle($title){
             $this->title = $title;
        }
        public function setAuthor($author){
             $this->author = $author;
        }
    }
    class Library{
        public array $books;
        
        public function __construct($books){
            $this->books = $books;
        }
        
        public function update($id,$title,$author){
            foreach($this->books as $book){
                if($book->getId() == $id){
                    $book->setTitle($title)  ;
                    $book->setAuthor($author) ;
                }
            }
        }
        public function delet($id){
            foreach($this->books as $book){
                if($book->getId() ==$id){
                    $key = array_search($book, $this->books);
                    array_splice($this->books, $key, 1);
                }
            }
        }
        
        public function Read(){
            echo "this library has : ".count($this->books). " books.\n";
            foreach($this->books as $book){
               echo "ID : ".$book->getId(). " Title : ".$book->getTitle(). "Author : " .$book->getAuthor(). ". \n" ; 
            }
            echo"\n";
        }

    
    }
    $book1 = new Book(1,'title1','author1');
    $book2 = new Book(2,'title2','author2');
    $book3 = new Book(3,'title3','author3');
    $books = [$book1,$book2];
    $library = new Library($books);
    $library->update(1,'update','updated');
    // $library->delet(1);
    $library->Read();
    // var_dump($library);
?>