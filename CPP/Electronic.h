// Electronic.h
#ifndef ELECTRONIC_H
#define ELECTRONIC_H
#include "Item.h"
#include <string>
using namespace std;

class Electronic : public Item {
public:
    string merk;
    int stok;
    int garansi;
    Electronic(string id="", string nama="", int harga=0, string merk="", int stok=0, int garansi=0)
    : Item(id,nama,harga), merk(merk), stok(stok), garansi(garansi) {}
    virtual ~Electronic() {}
};
#endif
