<?php
 abstract class Persone{
     private $name;
     private $age;
     
     public function __construct($name,$age){
         $this->name = $name;
         $this->age = $age;
     }
 }
 class Clase{
     public $teacherId;
     private $className;
     private $passcode;
     private array $students=[];
     public function __construct($className,$passcode,$teacherId){
         $this->className = $className;
         $this->passcode = $passcode;
         $this->teacherId= $teacherId;
     }
     public function setName($name){
         $this->name = $name;
     }
     public function setPasscode($passcode){
         $this->passcode = $passcode;
     }
     
     public function setStudent($student){
         array_push($this->students, $student);
     }
     public function getStudents(){
         return $this->students;
     }
     public function getClassName(){
         return $this->ClassName;
     }
     public function getPassCode(){
         return $this->passcode;
     }
     
     
 }
 class Teacher extends Persone{
     public $teacherId;
     public $class;
     public function __construct($name,$age,$teacherId){
         parent::__construct($name,$age);
         $this->teacherId = $teacherId;
     }
     public function createClass($className,$passcode){
         return $this->class = new Clase($className,$passcode,$this->teacherId);
     }
 }
 class Student extends Persone{
     private $studentId;
     public function __construct($name,$age,$studentId){
         parent::__construct($name,$age);
         $this->studentId = $studentId;
     }
     public function getStudentId(){
         return $this->studentId;
     }
     
     public function joinClass($classes,$className,$code){
         foreach($classes as $class){
             if($className == $class->getClassName()){
                 if($code == $class->getPassCode()){
                     $class->setStudent($this);
                     return "valid";
                 }else{
                     return "incorrect password";
                 }
             }
         }
         return "class is not exist";
     }
 }
 
 class System {
     public array $teachers = [];
     public array $students = [];
     public array $classes = [];
     
     public function addStudents($student){
         array_push($this->students, $student);
     }
     public function addTeachers($teacher){
         array_push($this->teachers, $teacher);
     }
     public function addClasses($class){
         array_push($this->classes, $class);
     }
     public function getStudent($id){
         foreach($this->students as $student){
             if($id == $student->getStudentId()){
                 return $student;
             }
         }
                 return "this student doesnt existe";
             
     }
     
 }
 
 
 $said = new Teacher('said', 24,1);

 $system = new System();
 $system->addStudents( new Student('mohamed',20,1));
var_dump($system->getStudent(1));

?>
