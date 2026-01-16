<?php
//ending php tag is optional, its good practice to omit it to avoid accidental whitespace issues unless you are embedding HTML
/* comments are same as HTML*/

//strict types declaration must be the first line
declare(strict_types = 1);

//require and include - used to include external files
//require will produce a fatal error if the file is not found, stopping script execution
//include will only produce a warning, allowing the script to continue
require_once 'connect.php'; //include the database connection file

//vars, data types, concatenation, conditional statements --------------------------------------
//vars initialized with $
$firstName = "mat";
$lastName = "Huston";
$age = 24;
$isInstructor = false;

//echo outputs data to the screen
//concatenation with . dot operator
//HTML markup can be included within echo statements
echo "<p> Hiya my name is " . $firstName . $lastName . " and I am " . $age . " years old. </p>";

//if-else --------------------------------------------------------------------------------------
if($isInstructor){
    echo "<p> I am an instructor </p>";
} else {
    echo "<p> I am not an instructor </p>";
}

//php is a "loosely typed" language, so you can change data types on the fly -------------------
$num1 = 67;
$num2 = "69";
//php will automatically parse a string to integer if needed
//"declare strict types" at the top of the file to avoid this behavior
//add type hints to make PHP less loosely typed - the int before the param enforces integer type
//function add($num1, $num2){ is loosely typed
function add(int $num1, int $num2): int {
    return $num1 + $num2; 
}
//making it strict will throw a TypeError if you try to pass a string
//echo "<p> Num1 and num2 is: " . add($num1, $num2) . "</p>";

//object oriented programming ------------------------------------------------------------------
//classes are blueprints for objects
class Person{
    public string $name;
    public int $age;
    public bool $isInstructor;
    //constructor method to initialize properties
    public function __construct(string $name, int $age, bool $isInstructor){
        //$this refers to the current object instance, use it to access properties and methods
        //$this also uses $
        $this->name = $name;
        $this->age = $age;
        $this->isInstructor = $isInstructor;
    }
    //method to create a new Person object
    public function getBadge(): string {
    $role = $this->isInstructor ? "Instructor" : "Student";
    return "<p> Name: {$this->name}, Age: {$this->age}, Role: {$role}</p>";
    }
}
//create a new Person object
$person1 = new Person("matHuston", 24, false);
echo $person1->getBadge();