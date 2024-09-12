import { useState } from "react";
import { Body, MenuNav, SideBar } from "../src/components/layout";
import 'react-toastify/dist/ReactToastify.css';

export default function App() {
  const [openSiderBar, setOpenSideBar] = useState(false);

  const toggleSideBar = () => {
    setOpenSideBar(!openSiderBar);
  }
  
  return (
    <div className="flex flex-col h-screen w-full">
        <MenuNav toggleSideBar={toggleSideBar} />
        <SideBar isOpen={openSiderBar} toggleSideBar={toggleSideBar} />
        <Body />
    </div>

  )
}