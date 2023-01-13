import React, { useRef, useState } from "react";
import Main from "@/Components/Admin/Main";
import { Inertia } from "@inertiajs/inertia";


const Create = (props) => {

  const [values, setValues] = useState({
    barcode: "",
    idKategori: "",
    idSatuan: "",
    namaProduk: "",
    hargaJual: "",
    hargaBeli: "",
    stokToko: "",
    stokGudang: "",
    deskripsi: "",
  })

  function handleChange(e) {
    setValues(values => ({
      ...values,
      [e.target.id]: e.target.value,
      idUser: props.auth.user.id,
      idToko: props.toko.id,
    }))
  }

  const handleSubmit = (e) => {
    e.preventDefault();

    Inertia.post(route("produk.store"), values);
    setValues({
      barcode: "",
      idKategori: "",
      idSatuan: "",
      namaProduk: "",
      hargaJual: "",
      hargaBeli: "",
      stokToko: "",
      stokGudang: "",
      deskripsi: "",
    });
  };
  console.log(props);

  return (
    <>
      <div className="pt-3">
        <h1 className="font-bold text-3xl">Produk</h1>
      </div>
      {props.flash.message &&
          <div className="mx-5">
            <div className="flex p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
              <svg aria-hidden="true" className="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clipRule="evenodd"></path></svg>
              <span className="sr-only">Info</span>
              <div>
                <span className="font-medium">{props.flash.message}</span>
              </div>
            </div>
          </div>
        }

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
              id="idKategori"
              className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              name="idKategori"
              // onChange={(idKategori) => setidKategori(idKategori.target.value)}
              onChange={handleChange}
              value={values.idKategori}
            >
              <option value="">Pilih Kategori</option>
              <option value="1">Aspal</option>
              <option value="2">Baja</option>
              <option value="3">Beton</option>
              <option value="4">Kayu</option>
              <option value="5">Logam</option>
              <option value="6">Pasir</option>
              <option value="7">Pengencang</option>
              <option value="8">Pintu</option>
              <option value="9">Plastik</option>
              <option value="10">Semen</option>
            </select>
            {props.errors.idKategori && (
              <div className="text-red-600">{props.errors.idKategori}</div>
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
              id="idSatuan"
              className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              // onChange={(idSatuan) => setidSatuan(idSatuan.target.value)}
              onChange={handleChange}
              value={values.idSatuan}
            >
              <option>Pilih Satuan</option>
              <option value="1">Kg</option>
              <option value="2">Pcs</option>
              <option value="3">Gram</option>
              <option value="4">Cm</option>
            </select>
            {props.errors.idSatuan && (
              <div className="text-red-600">{props.errors.idSatuan}</div>
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
              id="namaProduk"
              className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              name="nama"
              placeholder="Nama Produk"
              // onChange={(namaProduk) => setnamaProduk(namaProduk.target.value)}
              onChange={handleChange}
              value={values.namaProduk}
            />
            {props.errors.namaProduk && (
              <div className="text-red-600">{props.errors.namaProduk}</div>
            )}
          </div>
          <div>
            <label
              htmlFor="barcode"
              className="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
            >
              Barcode
            </label>
            <input
              type="text"
              id="barcode"
              className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              name="barcode"
              placeholder="Barcode"
              // onChange={(namaProduk) => setnamaProduk(namaProduk.target.value)}
              onChange={handleChange}
              value={values.barcode}
            />
            {props.errors.barcode && (
              <div className="text-red-600">{props.errors.barcode}</div>
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
              id="hargaBeli"
              className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              name="harga_beli"
              placeholder="Harga Beli"
              // onChange={(hargaBeli) => sethargaBeli(hargaBeli.target.value)}
              onChange={handleChange}
              value={values.hargaBeli}
            />
            {props.errors.hargaBeli && (
              <div className="text-red-600">{props.errors.hargaBeli}</div>
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
              id="hargaJual"
              className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              name="hargaJual"
              placeholder="Harga Jual"
              // onChange={(hargaJual) => sethargaJual(hargaJual.target.value)}
              onChange={handleChange}
              value={values.hargaJual}

            />
            {props.errors.hargaJual && (
              <div className="text-red-600">{props.errors.hargaJual}</div>
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
              id="stokGudang"
              min="0"
              placeholder="0"
              // onChange={(stokGudang) => setstokGudang(stokGudang.target.value)}
              onChange={handleChange}
              value={values.stokGudang}

            />
            {props.errors.stokGudang && (
              <div className="text-red-600">{props.errors.stokGudang}</div>
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
              id="stokToko"
              min="0"
              placeholder="0"
              // onChange={(stokToko) => setstokToko(stokToko.target.value)}
              onChange={handleChange}
              value={values.stokToko}

            />
            {props.errors.stokToko && (
              <div className="text-red-600">{props.errors.stokToko}</div>
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
            // onChange={(deskripsi) => setdeskripsi(deskripsi.target.value)}
            onChange={handleChange}
            value={values.deskripsi}

          ></textarea>
          {props.errors.deskripsi && (
            <div className="text-red-600">{props.errors.deskripsi}</div>
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
