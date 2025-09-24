// Gadget.h
#ifndef GADGET_H
#define GADGET_H
#include "Electronic.h"
#include <string>
using namespace std;

class Gadget : public Electronic {
public:
    string model;
    string kategori;
    int kapasitas;
    Gadget(string id="", string nama="", int harga=0, string merk="", int stok=0, int garansi=0,
           string model="", string kategori="", int kapasitas=0)
    : Electronic(id,nama,harga,merk,stok,garansi), model(model), kategori(kategori), kapasitas(kapasitas) {}
    ~Gadget() {}
};
#endif
