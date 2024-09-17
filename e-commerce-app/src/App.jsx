import { useState } from "react";
import { Body, MenuNav, SideBar } from "../src/components/layout";
import 'react-toastify/dist/ReactToastify.css';

export default function App() {
  const [openSiderBar, setOpenSideBar] = useState(false);

  const toggleSideBar = () => {
    setOpenSideBar(!openSiderBar);
  }
  
  return (
    <div className="flex flex-col h-full w-full">
        <MenuNav toggleSideBar={toggleSideBar} />
        <div className="flex justify-center">
          <SideBar isOpen={openSiderBar} toggleSideBar={toggleSideBar} />
          <Body />
        </div>
    </div>

  )
}