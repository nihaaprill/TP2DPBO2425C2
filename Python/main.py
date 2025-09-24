# main.py
from gadget import Gadget

listg = []

def seed():
    listg.extend([
        Gadget('G001','HP Super',2000000,'Samsung',10,12,'X1','smartphone',4000),
        Gadget('G002','Tab Pro',3500000,'Huawei',5,24,'T10','tablet',7000),
        Gadget('G003','NoteBook',8000000,'Acer',3,12,'N200','laptop',5000),
        Gadget('G004','EarPods',300000,'Thinkplus',20,6,'E1','accessory',0),
        Gadget('G005','SmartWatch',1500000,'IWatch',8,12,'W9','wearable',300)
    ])


def add_data():
    id = input("ID: ").strip()

    # cek apakah ID sudah ada
    for g in listg:
        if g.id == id:
            tambah_stok = int(input(f"ID sudah ada. Masukkan jumlah stok tambahan: ").strip())
            g.stok += tambah_stok
            print("Stok berhasil diperbarui!\n")
            return

    # jika ID belum ada, input data baru
    nama = input("Nama: ").strip()
    harga = int(input("Harga: ").strip())
    merk = input("Merk: ").strip()
    stok = int(input("Stok: ").strip())
    gar = int(input("Garansi (bulan): ").strip())
    model = input("Model: ").strip()
    kategori = input("Kategori: ").strip()
    kap = int(input("Kapasitas baterai (mAh): ").strip())
    listg.append(Gadget(id,nama,harga,merk,stok,gar,model,kategori,kap))
    print("Data berhasil ditambahkan!\n")

def show_all():
    headers = ['ID','Nama','Harga','Merk','Stok','Garansi(bln)','Model','Kategori','Kapasitas(mAh)']
    widths = [6,20,12,12,6,12,14,12,16]
    fmt = "".join("{:<" + str(w) + "}" for w in widths)
    print(fmt.format(*headers))
    print("-" * sum(widths))
    for g in listg:
        print(fmt.format(*g.to_row()))

if __name__ == '__main__':
    seed()
    while True:
        print("\n1. Add\n2. Show All\n3. Exit")
        opt = input("Pilih: ").strip()
        if opt == '1':
            add_data()
        elif opt == '2':
            show_all()
        elif opt == '3':
            break
        else:
            print("Pilihan tidak valid.")
