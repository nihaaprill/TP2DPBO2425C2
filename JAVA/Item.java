// Item.java
public class Item {
    protected String id;
    protected String nama;
    protected int harga;

    public Item(String id, String nama, int harga) {
        this.id = id;
        this.nama = nama;
        this.harga = harga;
    }

    public String[] toRowParts() {
        return new String[]{id, nama, String.valueOf(harga)};
    }
}
