import Main from "@/Components/Admin/Main";
import React from "react";

const index = () => {
  console.log(props);

  //search
  const [query, setQuery] = useState("");
  const keys = ["namaMember", "kodeMember", "email"];

  const search = (data) => {
    return data.filter((item) =>
      keys.some((key) => item[key].toString().toLowerCase().includes(query))
    );
  };
  return (
    <>
      <div className="flex flex-row justify-between items-between my-4">
        <h1 className="font-bold text-2xl">Member</h1>
        <Link
          href={route("member.create")}
          type="button"
          className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
        >
          Tambah Member
        </Link>
      </div>
      <div className="mt-1 mb-7 mx-auto max-w-xl">
        <div className="flex items-center">
          <label htmlFor="search-member" className="sr-only">
            Cari...
          </label>
          <div className="relative w-full">
            <div className="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg
                aria-hidden="true"
                className="w-5 h-5 text-gray-500 dark:text-gray-400"
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
              id="search-member"
              className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Cari..."
              onChange={(e) => setQuery(e.target.value)}
              required
            />
          </div>
        </div>
      </div>

      <div className="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table className="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" className="px-6 py-3">
                Nama Member
              </th>
              <th scope="col" className="px-6 py-3">
                Kode Member
              </th>
              <th scope="col" className="px-6 py-3">
                Email
              </th>
              <th scope="col" className="px-6 py-3">
                No Hp
              </th>
              <th scope="col" className="px-6 py-3">
                Alamat
              </th>
              <th scope="col" className="px-6 py-3">
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            {search(props.products.data).length > 0 ? (
              search(props.products.data).map((data, i) => {
                return (
                  <tr
                    key={i}
                    className="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                  >
                    <th
                      scope="row"
                      className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                      {data.namaMember}
                    </th>
                    <td className="px-6 py-4">{data.kodeMember}</td>
                    <td className="px-6 py-4">{data.email}</td>
                    <td className="px-6 py-4">{data.noHp}</td>
                    <td className="px-6 py-4">{data.alamat}</td>
                    <td className="px-6 py-4 text-right">
                      <Link
                        href={route("member.edit", [1])}
                        type="button"
                        className="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                      >
                        Ubah
                      </Link>
                      <Link
                        href={route("member.destroy", [1])}
                        type="button"
                        className="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                      >
                        Hapus
                      </Link>
                    </td>
                  </tr>
                );
              })
            ) : query !== "" ? (
              <tr>
                <td colSpan="7">{`Tidak ada data dengan pencarian '${query}'`}</td>
              </tr>
            ) : (
              <tr>
                <td colSpan="7">{`Tidak ada data`}</td>
              </tr>
            )}
          </tbody>
        </table>
      </div>
    </>
  );
};
Index.layout = (page) => <Main children={page} />;
export default index;
