<?php

namespace Fadhil\TestBundle\Entity\Todo;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notes
 */
class Notes
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var boolean
     */
    private $done;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set done
     *
     * @param boolean $done
     * @return Notes
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return boolean 
     */
    public function getDone()
    {
        return $this->done;
    }
}
