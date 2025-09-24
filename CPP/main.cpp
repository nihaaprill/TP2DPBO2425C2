// main.cpp
#include <iostream>
#include <vector>
#include <iomanip>
#include <limits>
#include <string>
#include "Gadget.h"
using namespace std;

vector<Gadget> listg;

void seed() {
    listg.push_back(Gadget("G001","HP Super",2000000,"Samsung",10,12,"X1","smartphone",4000));
    listg.push_back(Gadget("G002","Tab Pro",3500000,"Huawei",5,24,"T10","tablet",7000));
    listg.push_back(Gadget("G003","NoteBook",8000000,"Acer",3,12,"N200","laptop",5000));
    listg.push_back(Gadget("G004","EarPods",300000,"Thinkplus",20,6,"E1","accessory",0));
    listg.push_back(Gadget("G005","SmartWatch",1500000,"IWatch",8,12,"W9","wearable",300));
}

void addData() {
    string id, nama, merk, model, kategori;
    int harga, stok, garansi, kapasitas;
    cin.ignore(numeric_limits<streamsize>::max(), '\n');
    cout << "ID: "; getline(cin, id);

    // cek ID
    for (auto &g : listg) {
        if (g.id == id) {
            int tambahStok;
            cout << "ID sudah ada. Masukkan jumlah stok tambahan: ";
            cin >> tambahStok; cin.ignore(numeric_limits<streamsize>::max(), '\n');
            g.stok += tambahStok;
            cout << "Stok berhasil diperbarui!\n";
            return;
        }
    }

    cout << "Nama: "; getline(cin, nama);
    cout << "Harga: "; cin >> harga; cin.ignore(numeric_limits<streamsize>::max(), '\n');
    cout << "Merk: "; getline(cin, merk);
    cout << "Stok: "; cin >> stok; cin.ignore(numeric_limits<streamsize>::max(), '\n');
    cout << "Garansi (bulan): "; cin >> garansi; cin.ignore(numeric_limits<streamsize>::max(), '\n');
    cout << "Model: "; getline(cin, model);
    cout << "Kategori: "; getline(cin, kategori);
    cout << "Kapasitas baterai (mAh): "; cin >> kapasitas; cin.ignore(numeric_limits<streamsize>::max(), '\n');

    listg.push_back(Gadget(id,nama,harga,merk,stok,garansi,model,kategori,kapasitas));
    cout << "Data berhasil ditambahkan!\n";
}

void showAll() {
    vector<string> headers = {"ID","Nama","Harga","Merk","Stok","Garansi","Model","Kategori","Kapasitas"};
    vector<int> colWidths(headers.size(), 0);

    // hitung lebar kolom
    for (size_t i=0;i<headers.size();i++)
        colWidths[i] = headers[i].size();

    for (auto &g : listg) {
        vector<string> row = g.toRow();
        for (size_t i=0;i<row.size();i++)
            colWidths[i] = max(colWidths[i], (int)row[i].size());
    }

    // print border
    auto printBorder = [&]() {
        cout << "+";
        for (auto w : colWidths) cout << string(w+2,'-') << "+";
        cout << "\n";
    };

    printBorder();
    // print header
    cout << "|";
    for (size_t i=0;i<headers.size();i++)
        cout << " " << setw(colWidths[i]) << left << headers[i] << " |";
    cout << "\n";
    printBorder();

    // print isi
    for (auto &g : listg) {
        vector<string> row = g.toRow();
        cout << "|";
        for (size_t i=0;i<row.size();i++)
            cout << " " << setw(colWidths[i]) << left << row[i] << " |";
        cout << "\n";
    }
    printBorder();
}

int main() {
    seed();
    while (true) {
        cout << "\n1. Add\n2. Show All\n3. Exit\nPilih: ";
        int opt; if (!(cin >> opt)) { cin.clear(); cin.ignore(numeric_limits<streamsize>::max(), '\n'); continue; }
        if (opt == 1) addData();
        else if (opt == 2) showAll();
        else if (opt == 3) break;
        else cout << "Pilihan tidak valid.\n";
    }
    return 0;
}
