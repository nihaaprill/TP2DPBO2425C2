// Electronic.java
public class Electronic extends Item {
    protected String merk;
    protected int stok;
    protected int garansiBulan;

    public Electronic(String id, String nama, int harga, String merk, int stok, int garansiBulan) {
        super(id, nama, harga);
        this.merk = merk;
        this.stok = stok;
        this.garansiBulan = garansiBulan;
    }

    @Override
    public String[] toRowParts() {
        return new String[]{id, nama, String.valueOf(harga), merk, String.valueOf(stok), String.valueOf(garansiBulan)};
    }
}
