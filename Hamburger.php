<?php
class Hamburger {
    private $id;
    private $nev;
    private $fajta;
    private $ar;
    private $kaloria;
    private $lejarat;
    public function __construct(string $nev, string $fajta, int $ar, int $kaloria, DateTime $lejarat)
    {
        $this->nev = $nev;
        $this->fajta = $fajta;
        $this->ar = $ar;
        $this->kaloria = $kaloria;
        $this->lejarat = $lejarat;
    }
    
    public function uj()
    {
        global $db;
        $db->prepare('INSERT INTO burger (nev, fajta, ar, kaloria, lejarat) VALUES (:nev, :fajta, :ar, :kaloria, :lejarat)')
        ->execute([':nev'=>$this->nev,':fajta'=>$this->fajta,':ar'=>$this->ar,':kaloria'=>$this->kaloria,':lejarat'=>$this->lejarat->format("Y-m-d h:i:s")]);
    }
    public static function mentes($nev, $fajta, $ar, $kaloria, $lejarat, $id)
    {
        global $db;
        $db->prepare('UPDATE burger SET nev = :nev, fajta = :fajta, ar = :ar, kaloria = :kaloria, lejarat = :lejarat WHERE id = :id')
        ->execute([':nev'=>$nev, ':fajta'=>$fajta,':ar'=>$ar,':kaloria'=>$kaloria,':lejarat'=>$lejarat->format("Y-m-d h:i:s"), ':id'=>$id]);
    }
    public static function torol(int $id)
    {
        global $db;
        $db->prepare('DELETE FROM burger WHERE id = :id')->execute([':id'=>$id]);
    }

    //get
    public function getNev():string{
        return $this->nev;
    }
    public function getFajta():string{
        return $this->fajta;
    }
    public function getId():?int{
        return $this->id;
    }
    public function getAr():int{
        return $this->ar;
    }
    public function getKaloria():int{
        return $this->kaloria;
    }
    public function getLejarat():DateTime{
        return $this->lejarat;
    }

    //set
    public function setNev(string $nev){
        $this->nev = $nev;
    }
    public function setFajta(string $nev){
        $this->fajta = $fajta;
    }
    public function setAr(int $ar){
        $this->ar = $ar;
    }
    public function setKaloria(int $kaloria){
        $this->kaloria = $kaloria;
    }
    public function setLejarat(DateTime $lejarat){
        $this->lejarat = $lejarat;
    }
    
    public static function osszes():array
    {
        global $db;
        $tomb = [];
        $tomb = $db->query("SELECT * FROM burger ORDER BY id ASC")->fetchall();
        $data = [];
        foreach ($tomb as $elem) {
            $hamburger = new Hamburger($elem['nev'], $elem['fajta'], $elem['ar'], $elem['kaloria'], new DateTime($elem['lejarat']));
            $hamburger->id = $elem['id'];
            $data[] = $hamburger;
        }
        return $data;
    }
}