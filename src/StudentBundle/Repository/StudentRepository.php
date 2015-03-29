<?php
namespace StudentBundle\Repository;

use Doctrine\ORM\EntityRepository;

class StudentRepository extends EntityRepository {

    public function getStudentCountForCurrentYear()
    {
        $now = new \DateTime();

        $sql = "
            SELECT count(matricule) as students
            FROM student
            WHERE YEAR(registerDate) = '" . $now->format('Y') . "'
        ";

        $stmt = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return intval($result[0]['students']);
    }
}
