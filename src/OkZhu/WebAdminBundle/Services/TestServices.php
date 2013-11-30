<?php
namespace OkZhu\WebAdminBundle\Services;

use Doctrine\ORM\EntityManager;

class TestServices
{

	protected $em;
 
	public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function sssss()
    {
		return "ssssssssssssss";
    }
}

?>