<?php

namespace Tracktus\AppBundle\Entity;

use Tracktus\UserBundle\Entity\User;

class Project {
    /**
     * Name of the project
     * @var string
     */
    private $name;

    /**
     * Description of the project
     * @var string
     */
    private $description;

    /**
     * Creation date of the project
     * @var \DateTime
     */
    private $creationDate;

    /**
     * Manager of the project
     * @var User
     */
    private $manager;

    /**
     * Creator of the project
     * @var User
     */
    private $creator;

    /**
     * Members that collaborate on this project
     * @var \SplObjectStorage
     */
    private $members;

    /**
     * Indicates whether a project is finished or not
     * @var bool
     */
    private $finished;

    /**
     * Constructor
     * @param string $name        Name of the project
     * @param string $description Description of the project
     */
    public function __construct($name = null, $description = null) {
        $this->name = $name;
        $this->description = $description;
        $this->creationDate = new \DateTime();
        $this->members = new \SplObjectStorage();
    }

    /**
     * Return the name of the project
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Return the description of the project
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Return the creation date of the project
     * @return \DateTime
     */
    public function createdAt()
    {
        return $this->creationDate;
    }

    /**
     * Set the name of the project
     * @param string $name Name of the project
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Sets the description of the Project
     * @param string $description Description of the project
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Return the manager of the project
     * @return Tracktus\UserBundle\Entity\User
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Set the manager
     * @param User $user Manager of the project
     */
    public function setManager(User $user)
    {
        $this->manager = $user;
    }

    /**
     * Return the creator of the project
     * @return User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Set the creator of the project
     * @param User $user Creator of the project
     */
    public function setCreator(User $user)
    {
        $this->creator = $user;
    }

    /**
     * Add a member to the project
     * @param User $user Member to add
     */
    public function addMember(User $user)
    {
        $this->members->attach($user);
    }

    /**
     * Get all the members of the project
     * @return \SplObjectStorage
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Determines if a member
     * @param  User    $user the user
     * @return boolean
     */
    public function isMember(User $user)
    {
        return $this->members->contains($user);
    }

    /**
     * Set if the project is finished
     * @param boolean $state the state of the project
     */
    public function setFinished($state)
    {
        if (!is_bool($state)){
            throw new \InvalidArgumentException('$state must be a boolean value');
        }
        $this->finished = $state;
    }

    /**
     * Return finished value of the project
     * @return boolean
     */
    public function isFinished()
    {
        return $this->finished;
    }
}