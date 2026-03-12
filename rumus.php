<?php

class BangunDatar
{
    public function hitungLuas()
    {
        return 0;
    }
}

class Persegi extends BangunDatar
{
    public $sisi;

    public function __construct($sisi)
    {
        $this->sisi = $sisi;
    }

    public function hitungLuas()
    {
        return $this->sisi * $this->sisi;
    }
}

class Lingkaran extends BangunDatar
{
    public $r;

    public function __construct($r)
    {
        $this->r = $r;
    }

    public function hitungLuas()
    {
        return pi() * $this->r * $this->r;
    }
}

class Segitiga extends BangunDatar
{
    public $alas;
    public $tinggi;

    public function __construct($alas, $tinggi)
    {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function hitungLuas()
    {
        return 0.5 * $this->alas * $this->tinggi;
    }
}
