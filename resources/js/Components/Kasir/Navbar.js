import {
  ArrowLeftOnRectangleIcon,
  BuildingStorefrontIcon,
  ShoppingBagIcon,
  ShoppingCartIcon,
} from "@heroicons/react/20/solid";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import { useState } from "react";
const Navbar = () => {
  const [open, setOpen] = useState(false);
  return (
    <>
      <div
        className={` ${
          open ? "w-60" : "w-20 "
        } bg-dark-purple h-screen p-5  pt-8 relative duration-300`}
      >
        <img
          src="/img/control.png"
          className={`absolute cursor-pointer -right-3 top-9 w-7 border-dark-purple
           border-2 rounded-full  ${!open && "rotate-180"}`}
          onClick={() => setOpen(!open)}
        />
        <Link href="/kasir" className="flex gap-x-4 items-center">
          <BuildingStorefrontIcon
            className={`cursor-pointer text-white w-8 md:w-10 ${!open && 'absolute'}`}
          />
          <h1
            className={`text-white origin-left font-medium text-xl duration-200 ${
              !open && "scale-0"
            }`}
          >
            Kasir TokoPintar
          </h1>
        </Link>
        <ul className="pt-6">
          <Link href={route("kasir.jual")} as="button">
            <li
              className={`flex  rounded-md p-2 cursor-pointer hover:bg-light-white text-gray-300 text-sm items-center gap-x-4`}
            >
              <ShoppingBagIcon className="h-6 w-6" />
              <span className={`${!open && "hidden"} origin-left duration-200`}>
                Penjualan
              </span>
            </li>
          </Link>
          <Link href={route("kasir.beli")} as="button">
            <li
              className={`flex  rounded-md p-2 cursor-pointer hover:bg-light-white text-gray-300 text-sm items-center gap-x-4`}
            >
              <ShoppingCartIcon className="h-6 w-6" />
              <span className={`${!open && "hidden"} origin-left duration-200`}>
                Pembelian
              </span>
            </li>
          </Link>
          <Link href="/logout" as="button">
            <li
              className={`flex  rounded-md p-2 cursor-pointer hover:bg-light-white text-gray-300 text-sm items-center gap-x-4`}
            >
              <ArrowLeftOnRectangleIcon className="h-6 w-6" />
              <span className={`${!open && "hidden"} origin-left duration-200`}>
                Keluar
              </span>
            </li>
          </Link>
        </ul>
      </div>
    </>
  );
};

export default Navbar;
