import { useState } from "react";
import { Body, MenuNav, SideBar } from "../src/components/layout";
import 'react-toastify/dist/ReactToastify.css';
import CustomModalLocate from "./components/common/CustomModalLocate";

export default function App() {
  const [openSiderBar, setOpenSideBar] = useState(false);
  const [openLocate, setOpenLocate] = useState(false);

  const toggleSideBar = () => {
    setOpenSideBar(!openSiderBar);
  }

  const toggleLocate = () => {
    setOpenLocate(!openLocate);
  }
  
  return (
    <div>
        <MenuNav toggleSideBar={toggleSideBar} toggleLocate={toggleLocate} />
        <SideBar isOpen={openSiderBar} toggleSideBar={toggleSideBar} />
        {openLocate ? (<CustomModalLocate toggleLocate={toggleLocate} />) : ''}
        {/* <Body isOpen={openLocate} /> */}
    </div>

  )
}