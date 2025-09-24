// Item.h
#ifndef ITEM_H
#define ITEM_H
#include <string>
using namespace std;

class Item {
public:
    string id;
    string nama;
    int harga;
    Item(string id="", string nama="", int harga=0): id(id), nama(nama), harga(harga) {}
    virtual ~Item() {}
};
#endif
