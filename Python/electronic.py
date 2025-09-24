# electronic.py
from item import Item

class Electronic(Item):
    def __init__(self, id, nama, harga, merk, stok, garansi):
        super().__init__(id, nama, harga)
        self.merk = merk
        self.stok = stok
        self.garansi = garansi

    def to_row(self):
        return [self.id, self.nama, str(self.harga), self.merk, str(self.stok), str(self.garansi)]
