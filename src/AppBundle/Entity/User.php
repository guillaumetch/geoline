<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    public function  __construct()
    {
        parent::__construct();
        $this->setLevel1(true);
        $this->setLevel2(false);
        $this->setLevel3(false);
        $this->setRoles(array("ROLE_USER"));
        $this->notes = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="level1", type="boolean", options={"default":true})
     */
    protected $level1;

    /**
     * @var string
     *
     * @ORM\Column(name="level2", type="boolean", options={"default":false})
     */
    protected $level2;

    /**
     * @var string
     *
     * @ORM\Column(name="level3", type="boolean", options={"default":false})
     */
    protected $level3;

    /**
     * @ORM\OneToMany(targetEntity="Note", mappedBy="user")
     */
    protected $notes;

    /**
     * @return string
     */
    public function getLevel1()
    {
        return $this->level1;
    }

    /**
     * @param string $level1
     */
    public function setLevel1($level1)
    {
        $this->level1 = $level1;
    }

    /**
     * @return string
     */
    public function getLevel2()
    {
        return $this->level2;
    }

    /**
     * @param string $level2
     */
    public function setLevel2($level2)
    {
        $this->level2 = $level2;
    }

    /**
     * @return string
     */
    public function getLevel3()
    {
        return $this->level3;
    }

    /**
     * @param string $level3
     */
    public function setLevel3($level3)
    {
        $this->level3 = $level3;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        $this->setUsername(($email));

        return $this;
    }

    /**
     * Add category
     *
     * @param \AppBundle\Entity\Note $note
     *
     * @return User
     */
    public function addNote(\AppBundle\Entity\Note $note)
    {
        $this->notes[] = $note;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\Note $note
     */
    public function removeNote(\AppBundle\Entity\Note $note)
    {
        $this->notes->removeElement($note);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotes()
    {
        return $this->notes;
    }

}

