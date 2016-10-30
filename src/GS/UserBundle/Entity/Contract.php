<?php

namespace GS\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Contract
 *
 * @ORM\Table(name="Contratos")
 * @ORM\Entity(repositoryClass="GS\UserBundle\Entity\ContractRepository")
 * @UniqueEntity(
 *     fields={"street", "nVivienda"},
 *     message="Esta dirección ya tiene un contrato registrado."
 * )
 * @ORM\HasLifecycleCallbacks()
 */
class Contract
{
    /**
     * @ORM\ManyToOne(targetEntity="Street", inversedBy="contracts")
     * @ORM\JoinColumn(name="street_id", referencedColumnName="id", onDelete="CASCADE")
     */
     
    protected $street;
    
   
    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="contracts1")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id", onDelete="CASCADE")
     */
     
    protected $client;
    
    /**
     * @ORM\OneToMany(targetEntity="Counter", mappedBy="contract")
    */
    
    protected $counters;
    

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="nVivienda", type="integer")
     */
    private $nVivienda;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean")
     */
    private $activo;

    /**
     * @var integer
     *
     * @ORM\Column(name="next", type="integer")
     */
    private $next;


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
     * Set nVivienda
     *
     * @param integer $nVivienda
     * @return Contract
     */
    public function setNVivienda($nVivienda)
    {
        $this->nVivienda = $nVivienda;

        return $this;
    }

    /**
     * Get nVivienda
     *
     * @return integer 
     */
    public function getNVivienda()
    {
        return $this->nVivienda;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Contract
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set next
     *
     * @param integer $next
     * @return Contract
     */
    public function setNext($next)
    {
        $this->next = $next;

        return $this;
    }

    /**
     * Get next
     *
     * @return integer 
     */
    public function getNext()
    {
        return $this->next;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->counters = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set street
     *
     * @param \GS\UserBundle\Entity\Street $street
     * @return Contract
     */
    public function setStreet(\GS\UserBundle\Entity\Street $street = null)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return \GS\UserBundle\Entity\Street 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set client
     *
     * @param \GS\UserBundle\Entity\Client $client
     * @return Contract
     */
    public function setClient(\GS\UserBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \GS\UserBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Add counters
     *
     * @param \GS\UserBundle\Entity\Counter $counters
     * @return Contract
     */
    public function addCounter(\GS\UserBundle\Entity\Counter $counters)
    {
        $this->counters[] = $counters;

        return $this;
    }

    /**
     * Remove counters
     *
     * @param \GS\UserBundle\Entity\Counter $counters
     */
    public function removeCounter(\GS\UserBundle\Entity\Counter $counters)
    {
        $this->counters->removeElement($counters);
    }

    /**
     * Get counters
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCounters()
    {
        return $this->counters;
    }
    
    public function getfullcontract()
    {
        return $this->id . "- " . $this->street->getfullstreet() . " " . $this->nVivienda;
    }

    /**
     * @ORM\PrePersist 
     */
    public function setactivodefaultValue()
    {
        $this->setActivo(false);
    }
}
