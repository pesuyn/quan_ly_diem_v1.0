<?php
class diem_model{
    function construct(){

    }
    public $data = array();

    public function search($student, $subject, $teacher, $connect){
        $init = 1;
        $check = 1;
        $query = "SELECT 
        scores.id as 'NO',
        students.name as 'Sinh viên', 
        subjects.name as 'Môn học' , 
        teachers.name as 'Giáo viên', 
        scores.score as 'Điểm' 
        FROM scores, students, subjects, teachers
        WHERE scores.student_id = students.id 
        and scores.subject_id = subjects.id 
        and scores.teacher_id = teachers.id 
        and students.name LIKE '%$student%'
        and subjects.name LIKE '%$subject%'
        and teachers.name LIKE '%$teacher%'
        ORDER BY scores.id ASC ";
        $statement = $connect->prepare($query);
        $statement->execute();
        $rowCounts = $statement->rowCount();


        $this->data['init'] = $init;
        $this->data['check'] = $check;
        $this->data['statement'] = $statement;
        $this->data['rowCounts'] = $rowCounts;
        return $this->data;
    }

    public function initTable($connect){
        $init = 0;
        $check = 0;
        $queryScores = "SELECT teachers.id,
        scores.id as 'NO',
        students.name as 'Sinh viên', 
        subjects.name as 'Môn học' , 
        teachers.name as 'Giáo viên', 
        scores.score as 'Điểm' 
        FROM scores, students, subjects, teachers
        WHERE scores.student_id = students.id 
        and scores.subject_id = subjects.id 
        and scores.teacher_id = teachers.id
        ORDER BY teachers.id DESC";

        $statementScores =  $connect->prepare($queryScores);
        $statementScores->execute();
        $rowCountsScores = $statementScores->rowCount();  
        
        $this->data['init'] = $init;
        $this->data['check'] = $check;
        $this->data['statementScores'] = $statementScores;
        $this->data['rowCountsScores'] = $rowCountsScores;
        return $this->data;
    }

    public function delete($id,$connect){ 
        $delete = "DELETE FROM scores WHERE scores.id = $id";
        $deleteStatement = $connect->prepare($delete);
        $deleteStatement->execute();
}

    public function edit(){

    }
}


?>