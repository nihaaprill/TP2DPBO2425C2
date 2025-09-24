<?php
class Gadget {
    public $id;
    public $nama;
    public $harga;
    public $merk;
    public $stok;
    public $garansi;
    public $model;
    public $kategori;
    public $kapasitas;
    public $foto;

    public function __construct($id, $nama, $harga, $merk, $stok, $garansi, $model, $kategori, $kapasitas, $foto) {
        $this->id = $id;
        $this->nama = $nama;
        $this->harga = $harga;
        $this->merk = $merk;
        $this->stok = $stok;
        $this->garansi = $garansi;
        $this->model = $model;
        $this->kategori = $kategori;
        $this->kapasitas = $kapasitas;
        $this->foto = $foto;
    }
}
?>
