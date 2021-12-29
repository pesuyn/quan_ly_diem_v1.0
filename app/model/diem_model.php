<?php
class diem_model{
    function construct(){

    }
    
    public $connect;

    public function extract_conn(){
        require_once 'C:/xampp/htdocs/web/quanlydiem/app/common/quanlydiem_conn.php';
        $this->connect = $connect;
    }

    public $data = array();
    public function search($student, $subject, $teacher){
            $init = 1;
            $check = 1;
            $connect = $this->connect;
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

    public function initTable(){
        $init = 0;
        $check = 0;
        $connect = $this->connect;
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

    public function delete($id){ 
        $connect = $this->connect;
        $delete = "DELETE FROM scores WHERE scores.id = $id";
        $deleteStatement = $connect->prepare($delete);
        $deleteStatement->execute();
}

    public function edit(){

    }
}


?>