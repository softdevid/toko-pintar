import KasirLayout from "@/Layouts/KasirLayout";
import { Head } from "@inertiajs/inertia-react";
import React from "react";

const Pembelian = () => {
  return (
    <>
      <Head title="Pembelian - Kasir" />
      <div>Pembelian</div>
    </>
  );
};

Pembelian.layout = (page) => <KasirLayout children={page} />;

export default Pembelian;
