<?php
require_once 'luasBidang.php';
class Lingkaran extends Bentuk2d
{
    protected $jari2;
    public function  __construct($jari2)
    {
        $this->jari2 = $jari2;
    }
    public function namaBidang()
    {
        echo 'Lingkaran';
    }
    public function keterangan()
    {
        echo 'Jari-Jari = ' . $this->jari2;
    }
    public function luasBidang()
    {
        echo 3.14 * $this->jari2 * $this->jari2;
    }
    public function kelilingBidang()
    {
        echo 3.14 * 2 * $this->jari2;
    }
}