import Navbar from "@/Components/Kasir/Navbar";
import Sidebar from "@/Components/Kasir/Sidebar";
import { Head } from "@inertiajs/inertia-react";
import React from "react";

const KasirLayout = ({ children }) => {
  return (
    <>
      <Navbar />
      <div className="container">
        <div className="pt-4 pb-10">{children}</div>
      </div>
    </>
  );
};

export default KasirLayout;
