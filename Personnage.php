<?php

class Personnage{
    private static $_compteur = 0;
    private $_nom;
    private $_force;
    private $_xp;
    private $_pv;

    const FORCE_PETIT =20;
    const FORCE_MOYENNE =50;
    const FORCE_GRAND =80;

    public function __construct(string $nom, int $force)
    {
        $this->_id= self::$_compteur += 1 ;
        $this->_nom = $nom;
        $this->setPv(100);
        $this->setForce($force);
        $this->setxp(0);
    }

    public function frapper(Personnage $adversaire)
    {
        $adversaire->setPv($adversaire->getPv() - $this->getForce());
    }
    public function gagnerExperience():Personnage
    {
        $this->setxp($this->_xp + 1);
        return $this;
    }
    public function  parler()
    {
        print("je suis le ".self::$_compteur." personnage <br/>");
    }
    public function __toString():string
    {
        return ('<br/>boujour je m apelle ' . $this->_nom
        . '<br/> ma force est de : ' . intval($this->_force) . '<br/>'
        . ' mon experience ' . intval($this->_xp) . ' xp! <br/>')
        .'ma vie est de '.intval($this->_pv).'pv.<br/><br/>';
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
    public function setNom(string $nom)
    {
        $this->_nom = $nom;

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
    public function setForce(int $force)
    {
        if (in_array($force, array(self::FORCE_PETIT,self::FORCE_MOYENNE,self::FORCE_GRAND))){
            $this->_force = $force;
        }
        

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
    public function setXp(int $xp)
    {
        $this->_xp = $xp;

        if ($this->_xp > 100) {
            $this->_xp = 100;
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
