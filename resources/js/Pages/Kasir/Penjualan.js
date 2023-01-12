import KasirLayout from "@/Layouts/KasirLayout";
import { XCircleIcon } from "@heroicons/react/20/solid";
import { Head } from "@inertiajs/inertia-react";
import React from "react";

const Penjualan = ({jual}) => {
  return (
    <>
      <Head title="Penjualan - Kasir" />
      <div>
        <div className="text-stone-800 text-xl mb-4">Penjualan</div>
        <div className="flex">
          <div className="bg-zinc-100 w-full p-4">
            <form className="flex items-center">
              <label htmlFor="simple-search" className="sr-only">
                Search
              </label>
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
                  id="simple-search"
                  className="bg-zinc-50 border border-zinc-300 text-zinc-900 text-sm rounded-lg focus:ring-dark-purple focus:border-dark-purple block w-full pl-10 p-2.5"
                  placeholder="Cari Produk"
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
        <div className="flex space-x-4 px-4">
          <div className="basis-2/3 overflow-auto">
            <div className="relative overflow-x-auto shadow-md sm:rounded-lg">
              <table className="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" className="px-6 py-3 whitespace-nowrap">
                      Nama Produk
                    </th>
                    <th scope="col" className="px-6 py-3 whitespace-nowrap">
                      Harga Jual
                    </th>
                    <th scope="col" className="px-6 py-3 whitespace-nowrap">
                      Harga Beli
                    </th>
                    <th scope="col" className="px-6 py-3 whitespace-nowrap">
                      Jumlah
                    </th>
                    <th scope="col" className="px-6 py-3 whitespace-nowrap">
                      Subtotal
                    </th>
                    <th scope="col" className="px-6 py-3 whitespace-nowrap">
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr className="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th
                      scope="row"
                      className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                      Sok drat dalam 1/2 Rucika AW | Socket SDD Rucika Pvc
                    </th>
                    <td className="px-6 py-4">Rp<span>2500</span></td>
                    <td className="px-6 py-4">Rp<span>2000</span></td>
                    <td className="px-6 py-4">20</td>
                    <td className="px-6 py-4">Rp<span>50000</span></td>
                    <td className="px-6 py-4">
                      <XCircleIcon className="h-5 w-5 text-red-600 cursor-pointer hover:text-red-800" />
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div className="basis-1/3">
            <ul className="p-4 bg-white border border-gray-200 rounded-lg shadow-md divide-y">
              <li className="py-3 px-1">
                <div className="flex justify-between flex-wrap">
                  <span className="text-md">Member : </span>
                  <span className="text-md">{`${"saya"}`}</span>
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
                <button
                  type="button"
                  className="px-7 py-3 text-base font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-500"
                >
                  Bayar
                </button>
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
