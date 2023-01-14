import KasirLayout from "@/Layouts/KasirLayout";
import { MinusIcon, PlusIcon, XCircleIcon } from "@heroicons/react/20/solid";
import { Head } from "@inertiajs/inertia-react";
import React from "react";

const Penjualan = ({ jual }) => {
  return (
    <>
      <Head title="Penjualan - Kasir" />
      <div>
        <div className="text-stone-800 text-xl mb-4">Penjualan</div>
        <div className="flex flex-wrap bg-zinc-100 w-full p-4 pt-1">
          <div className="w-full md:w-1/2 mb-3 md:mr-4">
            <label
              htmlFor="cari-barang"
              className="block mb-1 text-lg font-medium text-gray-900 dark:text-white"
            >
              Cari Barang
            </label>
            <form className="flex items-center">
              <div className="relative w-full">
                <div className="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg
                    aria-hidden="true"
                    className="w-5 h-5 text-zinc-500"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fillRule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clipRule="evenodd"
                    ></path>
                  </svg>
                </div>
                <input
                  type="text"
                  id="cari-barang"
                  className="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-dark-purple focus:border-dark-purple block w-full pl-10 p-2.5"
                  placeholder="Cari Barang"
                  required
                />
              </div>
              <button
                type="submit"
                className="p-2.5 ml-2 text-sm font-medium text-white bg-purple-900 rounded-lg border border-purple-800 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300"
              >
                <svg
                  className="w-5 h-5"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  ></path>
                </svg>
                <span className="sr-only">Search</span>
              </button>
            </form>
          </div>
          <div className="w-full md:w-1/3 mb-3">
            <label
              htmlFor="barcode-barang"
              className="block mb-1 text-lg font-medium text-gray-900 dark:text-white"
            >
              Barcode Barang
            </label>
            <form className="flex items-center">
              <div className="relative w-full">
                <div className="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg
                    aria-hidden="true"
                    className="w-5 h-5 text-zinc-500"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fillRule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clipRule="evenodd"
                    ></path>
                  </svg>
                </div>
                <input
                  type="text"
                  id="barcode-barang"
                  className="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-dark-purple focus:border-dark-purple block w-full pl-10 p-2.5"
                  placeholder="Cari Barang"
                  required
                />
              </div>
              <button
                type="submit"
                className="p-2.5 ml-2 text-sm font-medium text-white bg-purple-900 rounded-lg border border-purple-800 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300"
              >
                <svg
                  className="w-5 h-5"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  ></path>
                </svg>
                <span className="sr-only">Search</span>
              </button>
            </form>
          </div>
        </div>
        <div className="flex flex-wrap md:flex-nowrap space-y-3 md:space-y-0 md:space-x-4 px-4">
          <div className="basis-full md:basis-2/3 overflow-auto">
            <div className="relative overflow-x-auto max-h-screen border border-zinc-200 shadow-md sm:rounded-lg">
              <table className="w-full text-sm text-left text-gray-500">
                <thead className="text-md text-gray-700 uppercase bg-gray-50 sticky top-0">
                  <tr>
                    <th scope="col" className="p-3 whitespace-nowrap">
                      Barcode
                    </th>
                    <th scope="col" className="p-3 whitespace-nowrap">
                      Nama Produk
                    </th>
                    <th scope="col" className="p-3 whitespace-nowrap">
                      Harga Jual
                    </th>
                    <th scope="col" className="p-3 whitespace-nowrap">
                      Harga Beli
                    </th>
                    <th scope="col" className="p-3 whitespace-nowrap">
                      Jumlah
                    </th>
                    <th scope="col" className="p-3 whitespace-nowrap">
                      Subtotal
                    </th>
                    <th scope="col" className="p-3 whitespace-nowrap">
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody className="h-screen overflow-y-auto">
                  {Array.from({ length: 50 }, (_, i) => (
                    <tr
                      key={i}
                      className="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                    >
                      <td className="p-3">694963910001</td>
                      <th
                        scope="row"
                        className="p-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                      >
                        Sok drat dalam 1/2 Rucika AW | Socket SDD Rucika Pvc
                      </th>
                      <td className="p-3">
                        Rp<span>2500</span>
                      </td>
                      <td className="p-3">
                        Rp<span>2000</span>
                      </td>
                      <td className="px-6 py-4">
                        <div className="flex items-center space-x-3">
                          <button
                            className="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            type="button"
                          >
                            <span className="sr-only">Quantity button</span>
                            <MinusIcon className="h-4 w-4" />
                          </button>
                          <div>
                            <input
                              type="number"
                              id="first_product"
                              className="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="1"
                              required
                            />
                          </div>
                          <button
                            className="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                            type="button"
                          >
                            <span className="sr-only">Quantity button</span>
                            <PlusIcon className="h-4 w-4" />
                          </button>
                        </div>
                      </td>
                      <td className="p-3">
                        Rp<span>50000</span>
                      </td>
                      <td className="p-3">
                        <XCircleIcon className="h-5 w-5 text-red-600 cursor-pointer hover:text-red-800" />
                      </td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>
          </div>
          <div className="basis-full md:basis-1/3">
            <ul className="p-4 max-w-sm md:w-full mx-auto md:mx-0 bg-white border border-zinc-200 rounded-lg shadow-md divide-y">
              {/* <li className="py-3 px-1">
                <div className="flex justify-between flex-wrap">
                  <span className="text-md">Member : </span>
                  <span className="text-md">{`${"saya"}`}</span>
                </div>
              </li> */}
              <li className="py-3 px-1">
                <div className="flex justify-between flex-wrap">
                  <button
                    type="button"
                    className="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-md px-4 py-2 text-center inline-flex items-center mr-2"
                  >
                    <PlusIcon className="h-5 w-5" />
                    Tambah Member
                  </button>
                </div>
              </li>
              <li className="py-3 px-1">
                <div className="flex justify-between flex-wrap">
                  <span className="text-md">No Faktur Jual : </span>
                  <span className="text-md">{`${jual.fakturJual}`}</span>
                </div>
              </li>
              <li className="py-3 px-1 bg-zinc-100">
                <div className="flex justify-between flex-wrap">
                  <span className="text-lg">Total : </span>
                  <span className="text-2xl">RP{`${"50.000.000.000"}`}</span>
                </div>
              </li>
              <li className="py-3 px-1">
                <div>
                  <label
                    htmlFor="bayar"
                    className="block mb-2 text-xl font-medium text-gray-900 dark:text-white"
                  >
                    Bayar
                  </label>
                  <input
                    type="number"
                    id="bayar"
                    className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                    min="0"
                  />
                </div>
              </li>
              <li className="py-3 px-1">
                <div>
                  <label
                    htmlFor="kembali"
                    className="block mb-2 text-lg font-medium text-gray-900 dark:text-white"
                  >
                    Kembali
                  </label>
                  <input
                    type="number"
                    id="kembali"
                    className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                    readOnly
                  />
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </>
  );
};

Penjualan.layout = (page) => <KasirLayout children={page} />;

export default Penjualan;
