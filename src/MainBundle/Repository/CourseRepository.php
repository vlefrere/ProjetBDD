<?php
namespace MainBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CourseRepository extends EntityRepository {

    public function getCourseWithoutGroupQB()
    {
        $qb = $this->createQueryBuilder('c');
        $qb->where($qb->expr()->isNull('c.group'));

        return $qb;
    }
}
