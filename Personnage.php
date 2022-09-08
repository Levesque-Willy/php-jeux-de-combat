<?php 

class Personage{
    private $_nom;
    private $_force;
    private $_xp;
    private $_pv;

    public function __construct(string $nom , int $force)
    {
        $this->_nom = $nom;
        $this->setPv(100);
        $this->setForce($force);
        $this->setxp(0);
    }
    
    public function frapper(Personage $adversaire) {
        $adversaire->setPv($adversaire->getPv() - $this->getForce());

    }
    public function gagnerExperience() {
        $this ->$this->setxp($this ->_xp+1);
        return $this ;

    }
    public function parler() {
        print('<br/>boujour je m apelle '. $this->_nom
        .'ma force est de : '. intval($this->_force).'<br/>'
        .' mon experience '.intval($this->_xp).' xp!');
        return $this;
    }

    /**
     * Get the value of _nom
     */ 
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * Set the value of _nom
     *
     * @return  self
     */ 
    public function setNom(string $_nom)
    {
        $this->_nom = $_nom;

        return $this;
    }

    /**
     * Get the value of _force
     */ 
    public function getForce()
    {
        return $this->_force;
    }

    /**
     * Set the value of _force
     *
     * @return  self
     */ 
    public function setForce(int $_force)
    {
        $this->_force = $_force;

        return $this;
    }

    /**
     * Get the value of _xp
     */ 
    public function getXp()
    {
        return $this->_xp;
    }

    /**
     * Set the value of _xp
     *
     * @return  self
     */ 
    public function setXp(int$_xp)
    {
        $this->_xp = $_xp;

        if ($this->_xp >100) {
           $this->_xp =100;
        }

        return $this;
    }

    

    /**
     * Get the value of _pv
     */ 
    public function getPv()
    {
        return $this->_pv;
    }

    /**
     * Set the value of _pv
     *
     * @return  self
     */ 
    public function setPv(int $_pv)
    {
        $this->_pv = $_pv;

        return $this;
    }
}
