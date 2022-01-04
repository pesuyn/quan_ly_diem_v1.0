<?php
    $data = array();

    function search($student, $subject, $teacher, $connect){
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


        $data['init'] = $init;
        $data['check'] = $check;
        $data['statement'] = $statement;
        $data['rowCounts'] = $rowCounts;
        return $data;
    }

    function delete($id,$connect){ 
        $delete = "DELETE FROM scores WHERE scores.id = $id";
        $deleteStatement = $connect->prepare($delete);
        $deleteStatement->execute();
}

    function edit(){

    }
?>