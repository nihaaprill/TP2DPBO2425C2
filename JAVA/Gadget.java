public class Gadget {
    private String id, nama, merk, model, kategori;
    private int harga, stok, garansi, kapasitas;

    public Gadget(String id, String nama, int harga, String merk, int stok,
                  int garansi, String model, String kategori, int kapasitas) {
        this.id = id;
        this.nama = nama;
        this.harga = harga;
        this.merk = merk;
        this.stok = stok;
        this.garansi = garansi;
        this.model = model;
        this.kategori = kategori;
        this.kapasitas = kapasitas;
    }

    // Getter dan Setter
    public String getId() { return id; }
    public int getStok() { return stok; }
    public void setStok(int stok) { this.stok = stok; }

    // Method untuk tabel
    public String[] toRowParts() {
        return new String[]{id, nama, String.valueOf(harga), merk,
                            String.valueOf(stok), String.valueOf(garansi),
                            model, kategori, String.valueOf(kapasitas)};
    }
}
