<?php
    class zamestnanec
    {
        public $jmeno;
        public $prijmeni;
        public $telefon;
        public $email;
        public $username;
        public $password;
        
        public function __construct($jmeno,$prijmeni,$telefon,$email,$username,$password)
        {
            $this->jmeno=$jmeno;
            $this->prijmeni=$prijmeni;
            $this->telefon=$telefon;
            $this->email=$email;
            $this->username=$username;
            $this->password=$password;
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
        
        public function __construct($ico,$nazev,$jmeno,$prijmeni,$telefon,$email,$ulice,$mesto,$psc,$stat)
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
        }
    }
?>