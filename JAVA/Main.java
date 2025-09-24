import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    static ArrayList<Gadget> list = new ArrayList<>();
    static Scanner sc = new Scanner(System.in);

    static void seed() {
        list.add(new Gadget("G001", "HP Super", 2000000, "Samsung", 10, 12, "X1", "smartphone", 4000));
        list.add(new Gadget("G002", "Tab Pro", 3500000, "Huawei", 5, 24, "T10", "tablet", 7000));
        list.add(new Gadget("G003", "NoteBook", 8000000, "Acer", 3, 12, "N200", "laptop", 5000));
        list.add(new Gadget("G004", "EarPods", 300000, "Thinkplus", 20, 6, "E1", "accessory", 0));
        list.add(new Gadget("G005", "SmartWatch", 1500000, "IWatch", 8, 12, "W9", "wearable", 300));
    }

    static void addData() {
        System.out.print("ID: ");
        String id = sc.nextLine().trim();

        // cek apakah ID sudah ada
        for (Gadget g : list) {
            if (g.getId().equals(id)) {
                System.out.print("ID sudah ada. Masukkan jumlah stok tambahan: ");
                int tambahStok = Integer.parseInt(sc.nextLine().trim());
                g.setStok(g.getStok() + tambahStok);
                System.out.println("Stok berhasil diperbarui!\n");
                return;
            }
        }

        // jika ID belum ada, input data baru
        System.out.print("Nama: "); String nama = sc.nextLine().trim();
        System.out.print("Harga: "); int harga = Integer.parseInt(sc.nextLine().trim());
        System.out.print("Merk: "); String merk = sc.nextLine().trim();
        System.out.print("Stok: "); int stok = Integer.parseInt(sc.nextLine().trim());
        System.out.print("Garansi (bulan): "); int garansi = Integer.parseInt(sc.nextLine().trim());
        System.out.print("Model: "); String model = sc.nextLine().trim();
        System.out.print("Kategori: "); String kategori = sc.nextLine().trim();
        System.out.print("Kapasitas baterai (mAh): "); int kapasitas = Integer.parseInt(sc.nextLine().trim());

        list.add(new Gadget(id, nama, harga, merk, stok, garansi, model, kategori, kapasitas));
        System.out.println("Data berhasil ditambahkan!\n");
    }

    static void showAll() {
        String[] headers = {"ID","Nama","Harga","Merk","Stok","Garansi(bln)","Model","Kategori","Kapasitas(mAh)"};
        int[] widths = {6,20,12,12,6,12,14,12,16};

        for (int i=0;i<headers.length;i++) System.out.printf("%-" + widths[i] + "s", headers[i]);
        System.out.println();
        int totalWidth = 0; for (int w: widths) totalWidth += w;
        for (int i=0;i<totalWidth;i++) System.out.print("-");
        System.out.println();

        for (Gadget g : list) {
            String[] row = g.toRowParts();
            for (int i=0;i<row.length;i++) System.out.printf("%-" + widths[i] + "s", row[i]);
            System.out.println();
        }
    }

    public static void main(String[] args) {
        seed();
        while (true) {
            System.out.println("\n1. Add\n2. Show All\n3. Exit");
            System.out.print("Pilih: ");
            String opt = sc.nextLine().trim();
            if (opt.equals("1")) addData();
            else if (opt.equals("2")) showAll();
            else if (opt.equals("3")) break;
            else System.out.println("Pilihan tidak valid.");
        }
    }
}
