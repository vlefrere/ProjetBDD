<?php
namespace MainBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GradeRepository extends EntityRepository {

    public function getReport($student)
    {
        $sql = "
            SELECT course.* , grade.*, (de_coef * DE) + (tp_coef * TP) + (pjt_coef * prj) + (ce_coef * DE) as grade
            FROM grade
            JOIN course ON course.id = grade.course_id
            WHERE student_id = '". $student->getMatricule() ."'
        ";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }
}
