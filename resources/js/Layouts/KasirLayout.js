import Navbar from "@/Components/Kasir/Navbar";
import { Head } from "@inertiajs/inertia-react";
import React from "react";

const KasirLayout = ({ children }) => {
  return (
    <div className="flex">
      <Navbar />
      <div className="container mx-auto my-auto">
        <div className="h-screen flex-1 p-7">{children}</div>
      </div>
    </div>
  );
};

export default KasirLayout;
