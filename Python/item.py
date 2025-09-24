# item.py
class Item:
    def __init__(self, id, nama, harga):
        self.id = id
        self.nama = nama
        self.harga = harga

    def to_row(self):
        return [self.id, self.nama, str(self.harga)]
