import { Head } from "@inertiajs/inertia-react";
import React from "react";
import Navbar from "./Navbar";

const Main = (props) => {
  return (
    <>
      <Head title={props.title} />
      <div className="flex">
        <Navbar />
        <div className="container mx-auto my-auto">
          <div className="h-screen flex-1 p-7">{props.children}</div>
        </div>
      </div>
    </>
  );
};
export default Main;
