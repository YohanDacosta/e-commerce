import React from "react";
import { Link } from "react-router-dom";
import { logo, menu_bar, location, wallet, cart, user } from '../../assets';

const MenuNav = () => {
    return (
        <>
            <div className="flex flex-col h-[160px] border-b-2 shadow-sm">
                <div className="flex flex-row w-full h-[50%] justify-between items-center">
                    <div className="flex gap-3 px-4 py-2 items-center">
                        <a href="" className="w-[25px]"><img src={menu_bar} alt="Menu Bar" /></a>
                        <a href="" className="h-[40px]  w-[160px]"><img src={logo} alt="Logo" /></a>
                    </div>
                    <div className="flex gap-2 mr-6">
                            <button className=" hover:bg-gray-100 rounded-full p-2"><img className="h-[28px] w-[28px]" src={location} alt="Location" /></button>
                            <button className=" hover:bg-gray-100 rounded-full p-2"><img className="h-[28px] w-[28px]" src={wallet} alt="Location" /></button>
                            <button className=" hover:bg-gray-100 rounded-full p-2"><img className="h-[28px] w-[28px]" src={cart} alt="Location" /></button>
                            <button className=" hover:bg-gray-100 rounded-full p-2"><img className="h-[28px] w-[28px]" src={user} alt="Location" /></button>
                    </div>
                </div>

                <div className="flex-row w-full h-[50%] items-center justify-center">
                    <div className="flex w-full py-2 px-4">
                        <input className="py-2 font-thin px-4 w-full focus:outline-none focus:border-green-500 border border-gray-300 rounded-l-md" type="search" name="search" id="search" placeholder="Search" />    
                        <button className="py-2 px-4 bg-green-500 rounded-r-md hover:bg-green-700" type="button">Search</button>
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