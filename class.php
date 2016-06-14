<?php
    class zamestnanec
    {
        public $jmeno;
        public $prijmeni;
        public $telefon;
        public $email;
        public $username;
        public $password;
        public $vlozil;
        
        public function __construct($jmeno,$prijmeni,$telefon,$email,$username,$password,$vlozil)
        {
            $this->jmeno=$jmeno;
            $this->prijmeni=$prijmeni;
            $this->telefon=$telefon;
            $this->email=$email;
            $this->username=$username;
            $this->password=$password;
            $this->vlozil=$vlozil;
        }
    }
    class klient
    {
        public $ico;
        public $nazev;
        public $jmeno;
        public $prijmeni;
        public $telefon;
        public $email;
        public $ulice;
        public $mesto;
        public $psc;
        public $stat;
        public $vlozil;
        
        public function __construct($ico,$nazev,$jmeno,$prijmeni,$telefon,$email,$ulice,$mesto,$psc,$stat,$vlozil)
        {
            $this->ico=$ico;
            $this->nazev=$nazev;
            $this->jmeno=$jmeno;
            $this->prijmeni=$prijmeni;
            $this->telefon=$telefon;
            $this->email=$email;
            $this->ulice=$ulice;
            $this->mesto=$mesto;
            $this->psc=$psc;
            $this->stat=$stat;
            $this->vlozil=$vlozil;
        }
    }

    class spis
    {
        public $spisova_znacka;
        public $klient;
        public $protistrana;
        public $nazev;
        public $taxa;
        public $pausal;
        public $vlozil;
        
        public function __construct($spisova_znacka,$klient,$protistrana,$nazev,$taxa,$pausal,$vlozil)
        {
            $this->spisova_znacka=$spisova_znacka;
            $this->klient=$klient;
            $this->protistrana=$protistrana;
            $this->nazev=$nazev;
            $this->taxa=$taxa;
            $this->pausal=$pausal;
            $this->vlozil=$vlozil;
        }
    }
?>