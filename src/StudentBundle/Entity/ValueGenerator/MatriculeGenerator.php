<?php

namespace StudentBundle\Entity\ValueGenerator;

use Doctrine\ORM\Id\AbstractIdGenerator;
use Doctrine\ORM\EntityManager;

class MatriculeGenerator extends AbstractIdGenerator {

    /**
     * Generates an identifier for an entity.
     *
     * @param \Doctrine\ORM\EntityManager  $em
     * @param \Doctrine\ORM\Mapping\Entity $entity
     *
     * @return mixed
     */
    public function generate(EntityManager $em, $entity)
    {
        $studentCount = $em->getRepository('StudentBundle:Student')->getStudentCountForCurrentYear();
        $now          = new \DateTime();

        $studentCountStr = str_pad(strval($studentCount), 4, '0', STR_PAD_LEFT);

        return $now->format('Y') . $studentCountStr;
    }
}
