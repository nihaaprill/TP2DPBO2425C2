# gadget.py
from electronic import Electronic

class Gadget(Electronic):
    def __init__(self, id, nama, harga, merk, stok, garansi, model, kategori, kapasitas):
        super().__init__(id, nama, harga, merk, stok, garansi)
        self.model = model
        self.kategori = kategori
        self.kapasitas = kapasitas

    def to_row(self):
        return [self.id, self.nama, str(self.harga), self.merk, str(self.stok), str(self.garansi),
                self.model, self.kategori, str(self.kapasitas)]
