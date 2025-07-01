<?php
class Student
{
    public string $name;
    public array $courses = [];


    public function __construct(string $name, string $course, int $score)
    {
        $this->name = $name;
        $this->courses[] = [$course, $score];
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function addCourse(string $course, int $score)
    {
        $this->courses[] = [$course, $score];
    }
    // ваш код
    public function hasDebts($scoresInfo)
    {
        $debtsCourseName = [];
        foreach ($this->courses as $cours){
            foreach ($scoresInfo as $scoreInfo){
                if($cours[1] < $scoreInfo[1] && $cours[0] == $scoreInfo[0]){
                    print($this->name);
                    print($cours[1]."<".$scoreInfo[1]."&&".$cours[0]."==".$scoreInfo[0]);
                    $debtsCourseName[] = $cours[0];
                }
            }
        }
        print_r($debtsCourseName);
        return $debtsCourseName;
    }
}


class CourseManager
{
    public array $students = [];
    public  array $scoresInfo = [];

    public function __construct(string $scoresInfo)
    {
        $scoresInfo = explode(';',$scoresInfo);
        $scoresInfoArray = [];
        foreach ($scoresInfo as $scoreInfoArray){
            $scoresInfoArray[] = explode(',',$scoreInfoArray);
        }
        $this->scoresInfo = $scoresInfoArray;
    }
    public function studentExists($name)
    {
        foreach ($this->students as $student) {
            if($student->name == $name){
                return true;
            };
        }
        return false;
    }
    // ваш код
    public function getStudentByNameIndex($name)
    {
        for($i = 0; $i < count($this->students); $i++){
            if($this->students[$i]->name == $name){
                return $i;
            }
        }
    }
    public function addStudentsInfo($studentsInfo)
    {
        $studentsInfo = explode(";", $studentsInfo);
        $studentsInfoArray = [];
        foreach ($studentsInfo as $studentInfo) {
            $studentsInfoArray[] = explode(',',$studentInfo);
        }
        foreach ($studentsInfoArray as $studentInfoArray){
            if($this->studentExists($studentInfoArray[0])){
                $this->students[$this->getStudentByNameIndex($studentInfoArray[0])]
                    ->addCourse($studentInfoArray[1], $studentInfoArray[2]);
            }else{
                $this->students[] = new Student($studentInfoArray[0],
                    $studentInfoArray[1], $studentInfoArray[2]);
            }
        }
    }

    public function courseWithStudentDebts()
    {
        $courseWithStudentDebts = [];
        foreach ($this->students as $student){
            array_merge($courseWithStudentDebts, $student->hasDebts($this->scoresInfo));
        }
        if(empty($courseWithStudentDebts)){
            return "Пусто";
        }else{
            $array_unique = array_unique($courseWithStudentDebts);
            sort($array_unique);
            $result = '';
            foreach ($array_unique as $line){
                $result .= $line.PHP_EOL;
            }
            return $result;
        }
    }
}


$studentsInfo = "Анна,Математика,85;Анна,Химия,90;Борис,Математика,75;Борис,История,80;Евгений,Математика,95;Евгений,История,85";
$scoresInfo = "Математика,80;Химия,60;История,80";

$CourseManager = new CourseManager($scoresInfo);
$CourseManager->addStudentsInfo($studentsInfo);
echo $CourseManager->courseWithStudentDebts();
// ваш код
