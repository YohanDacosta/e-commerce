import React from "react";
import { Link } from "react-router-dom";
import { logo, menu_bar, location, wallet, cart, user, search } from '../../assets';

const MenuNav = ({toggleSideBar}) => {
    return (
        <>
            <div className="flex flex-col h-[160px] border-b-2 shadow-sm">
                <div className="flex flex-row w-full h-[50%] justify-between items-center">
                    <div className="flex gap-3 px-4 py-2 items-center">
                        <a id="menu-bar" onClick={toggleSideBar} className=" hover:cursor-pointer w-[25px]"><img src={menu_bar} alt="menu_bar" /></a>
                        <a href="" className="h-[40px]  w-[160px]"><img src={logo} alt="logo" /></a>
                    </div>
                    <div className="flex gap-1 mr-6">
                            <button className=" hover:bg-gray-100 rounded-full p-2"><img className="h-[28px] w-[28px]" src={location} alt="Location" /></button>
                            <button className=" hover:bg-gray-100 rounded-full p-2"><img className="h-[28px] w-[28px]" src={wallet} alt="Location" /></button>
                            <button className=" hover:bg-gray-100 rounded-full p-2"><img className="h-[28px] w-[28px]" src={cart} alt="Location" /></button>
                            <button className=" hover:bg-gray-100 rounded-full p-2"><img className="h-[28px] w-[28px]" src={user} alt="Location" /></button>
                    </div>
                </div>

                <div className="flex-row w-full h-[50%] items-center justify-center">
                    <div className="flex w-full py-2 px-4">
                        <div className="relative w-full">
                            <input className="py-2 font-thin px-4 w-full focus:outline-none focus:border-green-500 border border-gray-300 rounded-md" type="search" name="search" id="search" placeholder="Search" />
                            <div className="absolute hover:cursor-pointer hover:bg-green-600 transition-colors duration-500 bg-green-400 w-12 right-0 top-0 bottom-0 rounded-r-md">
                                <a id="search"><img className="px-3.5 py-3" src={search} alt="search" /></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="flex-row w-full h-[50%]">
                        <ul className='flex gap-x-12 overflow-x-auto hide-scrollbar whitespace-nowrap font-thin py-2 px-8'>
                            <Link to="/">Foods</Link>
                            <Link to="/product/all">Personal and House grooming</Link>
                            <Link to="/company/all">Electrical appliances</Link>
                            <Link to="/contact">Hardware stores</Link>
                            <Link to="/contact">Liquoreria</Link>
                            <Link to="/contact">Offers</Link>
                        </ul>
                </div>
            </div>
        </>
    );
};

export default MenuNav;