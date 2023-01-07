import React, { useState } from "react";
import Main from "@/Components/Admin/Main";
const Create = () => {
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
        <h1 className="font-bold text-3xl">Stok Produk</h1>
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
            >
              <option>Pilih Kategori</option>

              <option value=""></option>
            </select>
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
              required=""
            />
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
              required=""
            />
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
              required=""
            />
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
              required
            />
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
              required
            />
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
          ></textarea>
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
