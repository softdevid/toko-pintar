import React, { useState } from "react";
import Main from "@/Components/Admin/Main";
const Create = (props) => {
  const [idKategori, setidKategori] = useState("");
  const [idSatuan, setidSatuan] = useState("");
  const [namaProduk, setnamaProduk] = useState("");
  const [hargaJual, sethargaJual] = useState("");
  const [hargaBeli, sethargaBeli] = useState("");
  const [stokToko, setstokToko] = useState("");
  const [stokGudang, setstokGudang] = useState("");
  const [deskripsi, setdeskripsi] = useState("");
  // const [notif, setNotif] = useState(false);

  const handleSubmit = (e) => {
    e.preventDefault();
    const data = {
      idKategori,
      idSatuan,
      namaProduk,
      hargaJual,
      hargaBeli,
      stokToko,
      stokGudang,
      deskripsi,
    };
    Inertia.post(route("produk.store"), data);
    setidKategori("");
    setidSatuan("");
    setnamaProduk("");
    sethargaJual("");
    sethargaBeli("");
    setstokToko("");
    setstokGudang("");
    setdeskripsi("");
  };
  // console.log(props, data);
  return (
    <>
      <div className="pt-3">
        <h1 className="font-bold text-3xl">Produk</h1>
      </div>
      <form className="m-4" onSubmit={handleSubmit} method="POST">
        <div className="grid gap-6 mb-6 md:grid-cols-2">
          <div>
            <label
              htmlFor="kategori"
              className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >
              Kategori
            </label>
            <select
              id="kategori"
              className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              name="kategori"
              onChange={(idKategori) => setidKategori(idKategori.target.value)}
              value={idKategori}
            >
              <option>Pilih Kategori</option>
              <option value="aspal">Aspal</option>
              <option value="baja">Baja</option>
              <option value="beton">Beton</option>
              <option value="kayu">Kayu</option>
              <option value="logam">Logam</option>
              <option value="pasir">Pasir</option>
              <option value="pengencang">Pengencang</option>
              <option value="pintu">Pintu</option>
              <option value="plastik">Plastik</option>
              <option value="semen">Semen</option>
            </select>
            {props.errors.idKategori && (
              <div className="text-red-600">! {props.errors.idKategori}</div>
            )}
          </div>
          <div>
            <label
              htmlFor="satuan"
              className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >
              Satuan
            </label>
            <select
              id="satuan"
              className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              name="kategori"
              onChange={(idSatuan) => setidSatuan(idSatuan.target.value)}
              value={idSatuan}
            >
              <option>Pilih Satuan</option>
              <option value="kilogram">Kg</option>
              <option value="pcs">Pcs</option>
              <option value="gram">Gram</option>
              <option value="centimeter">Cm</option>
            </select>
            {props.errors.idSatuan && (
              <div className="text-red-600">! {props.errors.idSatuan}</div>
            )}
          </div>
          <div>
            <label
              htmlFor="nama"
              className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >
              Nama Produk
            </label>
            <input
              type="text"
              id="nama"
              className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              name="nama"
              placeholder="Nama Produk"
              onChange={(namaProduk) => setnamaProduk(namaProduk.target.value)}
              value={namaProduk}
              required=""
            />
            {props.errors.namaProduk && (
              <div className="text-red-600">! {props.errors.namaProduk}</div>
            )}
          </div>
          <div>
            <label
              htmlFor="harga_beli"
              className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >
              Harga Beli
            </label>
            <input
              type="text"
              id="harga_beli"
              className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              name="harga_beli"
              placeholder="Harga Beli"
              onChange={(hargaBeli) => sethargaBeli(hargaBeli.target.value)}
              value={hargaBeli}
              required=""
            />
            {props.errors.hargaBeli && (
              <div className="text-red-600">! {props.errors.hargaBeli}</div>
            )}
          </div>
          <div>
            <label
              htmlFor="harga_jual"
              className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >
              Harga Jual
            </label>
            <input
              type="tel"
              id="harga_jual"
              className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              name="harga_jual"
              placeholder="Harga Jual"
              onChange={(hargaJual) => sethargaJual(hargaJual.target.value)}
              value={hargaJual}
              required=""
            />
            {props.errors.hargaJual && (
              <div className="text-red-600">! {props.errors.hargaJual}</div>
            )}
          </div>
          <div>
            <label
              htmlFor="stok_gudang"
              className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >
              Stok Gudang
            </label>
            <input
              type="number"
              className="htmlForm-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              name="stok_gudang"
              min="0"
              placeholder="0"
              onChange={(stokGudang) => setstokGudang(stokGudang.target.value)}
              value={stokGudang}
              required
            />
            {props.errors.stokGudang && (
              <div className="text-red-600">! {props.errors.stokGudang}</div>
            )}
          </div>
          <div>
            <label
              htmlFor="stok_toko"
              className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >
              Stok Toko
            </label>
            <input
              type="number"
              className="htmlForm-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              name="stok_toko"
              min="0"
              placeholder="0"
              onChange={(stokToko) => setstokToko(stokToko.target.value)}
              value={stokToko}
              required
            />
            {props.errors.stokToko && (
              <div className="text-red-600">! {props.errors.stokToko}</div>
            )}
          </div>
        </div>
        <div className="mb-6">
          <label
            htmlFor="deskripsi"
            className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
          >
            Deskripsi Produk
          </label>
          <textarea
            id="deskripsi"
            rows="4"
            className="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="deskripsi"
            placeholder="Deskripsi Produk"
            onChange={(deskripsi) => setdeskripsi(deskripsi.target.value)}
            value={deskripsi}
          ></textarea>
          {props.errors.deskripsi && (
            <div className="text-red-600">! {props.errors.deskripsi}</div>
          )}
        </div>
        <button
          type="submit"
          className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        >
          Submit
        </button>
        &nbsp;
        <a
          href={route("produk.index")}
          type="submit"
          className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        >
          Kembali
        </a>
      </form>
    </>
  );
};
Create.layout = (page) => <Main children={page} />;
export default Create;
