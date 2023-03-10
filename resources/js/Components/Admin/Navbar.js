import {
  ArrowLeftOnRectangleIcon,
  BuildingStorefrontIcon,
  CircleStackIcon,
  ClipboardDocumentIcon,
  Cog6ToothIcon,
  ComputerDesktopIcon,
  ListBulletIcon,
  UserGroupIcon,
  UserIcon,
} from "@heroicons/react/20/solid";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import { useState } from "react";
const Navbar = () => {
  const [open, setOpen] = useState(true);
  return (
    <>
      <div
        className={` ${open ? "w-72" : "w-20 "
          } bg-dark-purple h-screen p-5  pt-8 relative duration-300`}
      >
        <img
          src="/img/control.png"
          className={`absolute cursor-pointer -right-3 top-9 w-7 border-dark-purple
           border-2 rounded-full  ${!open && "rotate-180"}`}
          onClick={() => setOpen(!open)}
        />
        <div className="flex gap-x-4 items-center">
          <img
            src="/img/admin.png"
            className={`cursor-pointer duration-500 w-8 md:w-10 ${open}`}
          />
          <h1
            className={`text-white origin-left font-medium text-xl duration-200 ${!open && "scale-0"
              }`}
          >
            Admin TokoPintar
          </h1>
        </div>
        <ul className="pt-6">
          <Link href="/dashboard-toko">
            <li
              className={`flex  rounded-md p-2 cursor-pointer hover:bg-light-white text-gray-300 text-sm items-center gap-x-4`}
            >
              <ComputerDesktopIcon className="h-6 w-6" />
              <span className={`${!open && "hidden"} origin-left duration-200`}>
                Dashboard
              </span>
            </li>
          </Link>
          <Link href={route("produk.index")}>
            <li
              className={`flex  rounded-md p-2 cursor-pointer hover:bg-light-white text-gray-300 text-sm items-center gap-x-4`}
            >
              <CircleStackIcon className="h-6 w-6" />
              <span className={`${!open && "hidden"} origin-left duration-200`}>
                Produk
              </span>
            </li>
          </Link>
          <Link href={route("member.index")}>
            <li
              className={`flex  rounded-md p-2 cursor-pointer hover:bg-light-white text-gray-300 text-sm items-center gap-x-4`}
            >
              <ListBulletIcon className="h-6 w-6" />
              <span className={`${!open && "hidden"} origin-left duration-200`}>
                Member
              </span>
            </li>
          </Link>
          <Link href="#">
            <li
              className={`flex  rounded-md p-2 cursor-pointer hover:bg-light-white text-gray-300 text-sm items-center gap-x-4`}
            >
              <UserGroupIcon className="h-6 w-6" />
              <span className={`${!open && "hidden"} origin-left duration-200`}>
                Karyawan
              </span>
            </li>
          </Link>
          {/* <Link href="/admin-pelanggan">
            <li
              className={`flex  rounded-md p-2 cursor-pointer hover:bg-light-white text-gray-300 text-sm items-center gap-x-4`}
            >
              <UserIcon className="h-6 w-6" />
              <span className={`${!open && "hidden"} origin-left duration-200`}>
                Pelanggan
              </span>
            </li>
          </Link>
          <Link href="/admin-pembayaran">
            <li
              className={`flex  rounded-md p-2 cursor-pointer hover:bg-light-white text-gray-300 text-sm items-center gap-x-4`}
            >
              <ClipboardDocumentIcon className="h-6 w-6" />
              <span className={`${!open && "hidden"} origin-left duration-200`}>
                Pembayaran
              </span>
            </li>
          </Link> */}
          {/* <Link href={route("laporan.index")}>
            <li
              className={`flex  rounded-md p-2 cursor-pointer hover:bg-light-white text-gray-300 text-sm items-center gap-x-4`}
            >
              <ClipboardDocumentIcon className="h-6 w-6" />
              <span className={`${!open && "hidden"} origin-left duration-200`}>
                Laporan
              </span>
            </li>
          </Link> */}
          <Link href="/admin-setting">
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
