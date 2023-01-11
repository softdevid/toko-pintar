import Main from "@/Components/Admin/Main";
import React from "react";

const Index = () => {
  return (
    <>
      <div className="flex flex-row justify-between items-between my-4">
        <h1 className="font-bold text-2xl">Stok Produk</h1>
        <a
          href={route("produk.create")}
          type="button"
          className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
        >
          Tambah Produk
        </a>
      </div>
      <div className="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table className="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" className="px-6 py-3">
                Nama Produk
              </th>
              <th scope="col" className="px-6 py-3">
                Kategori
              </th>
              <th scope="col" className="px-6 py-3">
                Satuan
              </th>
              <th scope="col" className="px-6 py-3">
                Harga Beli
              </th>
              <th scope="col" className="px-6 py-3">
                Harga Jual
              </th>
              <th scope="col" className="px-6 py-3">
                Stok Gudang
              </th>
              <th scope="col" className="px-6 py-3">
                Stok Toko
              </th>
              <th scope="col" className="px-6 py-3">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <th
                scope="row"
                className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                Apple MacBook Pro 17"
              </th>
              <td className="px-6 py-4">Sliver</td>
              <td className="px-6 py-4">Laptop</td>
              <td className="px-6 py-4">$2999</td>
              <td className="px-6 py-4">$2999</td>
              <td className="px-6 py-4">$2999</td>
              <td className="px-6 py-4">$2999</td>
              <td className="px-6 py-4">
                <a
                  href={route("produk.edit", [1])}
                  type="button"
                  className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                >
                  Ubah
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </>
  );
};
Index.layout = (page) => <Main children={page} />;
export default Index;
