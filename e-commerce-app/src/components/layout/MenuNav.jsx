import React from "react";
import { Link } from "react-router-dom";
import { logo, menu_bar, location, wallet, cart, user, search, side_bar_toggle_up } from '../../assets';

const MenuNav = ({toggleSideBar}) => {
    const menu_nav_1 = () => {
        return (                        
            <ul className='flex md:hidden gap-x-12 overflow-x-auto hide-scrollbar whitespace-nowrap font-thin pb-2 px-8'>
                <Link to="/">Foods</Link>
                <Link to="/product/all">Personal and House grooming</Link>
                <Link to="/company/all">Electrical appliances</Link>
                <Link to="/contact">Hardware stores</Link>
                <Link to="/contact">Liquoreria</Link>
                <Link to="/contact">Offers</Link>
            </ul>
        )
    }

    const menu_nav_2 = () => {
        return (
            <ul className='hidden md:flex gap-x-12 overflow-x-auto hide-scrollbar whitespace-nowrap font-thin pb-2 px-8'>
                <Link to="/">Catalogue</Link>
                <Link to="/product/all">Offers</Link>
                <Link to="/company/all">Wallet MarKuba</Link>
                <Link to="/contact">Rewards</Link>
                <Link to="/contact">Payment</Link>
                <Link to="/contact">Shipment</Link>
                <Link to="/contact">Frequently questions</Link>
            </ul>
        )
    }

    return (
        <>
            <div className="flex flex-col border-b-2 shadow-sm">
                
                <div className="flex flex-col h-[150px] md:flex-row md:h-[80px] md:py-4 items-center justify-center">
                    <div className="flex flex-row w-full h-[50%] justify-between items-center">
                        <div className="flex gap-3 px-4 py-2 items-center">
                            <a id="menu-bar" onClick={toggleSideBar} className="md:hidden hover:cursor-pointer w-[25px]"><img src={menu_bar} alt="menu_bar" /></a>
                            <a href="" className="h-[40px]  w-[160px]"><img src={logo} alt="logo" /></a>
                        </div>
                        <div className="md:absolute md:right-0 first:flex gap-1 mr-6 md:mr-12">
                                <button className=" hover:bg-gray-100 rounded-full p-2"><img className="h-[28px] w-[28px]" src={location} alt="Location" /></button>
                                <button className=" hover:bg-gray-100 rounded-full p-2"><img className="h-[28px] w-[28px]" src={wallet} alt="Location" /></button>
                                <button className=" hover:bg-gray-100 rounded-full p-2"><img className="h-[28px] w-[28px]" src={cart} alt="Location" /></button>
                                <button className=" hover:bg-gray-100 rounded-full p-2"><img className="h-[28px] w-[28px]" src={user} alt="Location" /></button>
                        </div>
                    </div>

                    <div className="md:relative  md:bottom-3 md:right-[32.5%] flex-row w-full h-[50%] m-4 items-center justify-center">
                        <div className="flex w-full py-2 px-4">
                            <div className="relative w-full">
                                <input className="py-2 font-thin px-4 w-full focus:outline-none focus:border-green-500 border border-gray-300 rounded-md" type="search" name="search" id="search" placeholder="Search" />
                                <div className="absolute hover:cursor-pointer hover:bg-green-600 transition-colors duration-500 bg-green-400 w-12 right-0 top-0 bottom-0 rounded-r-md">
                                    <a id="search"><img className="px-3.5 py-3" src={search} alt="search" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="flex-row w-full h-[50%]">
                            {menu_nav_1()}
                      <div className="flex flex-row justify-between py-2">
                        <div className="hidden lg:flex flex-row justify-between items-center w-[8rem] border rounded-md mx-4 py-1 pl-2 pr-6">
                            <button className="flex justify-between w-full">
                                <span className="flex font-thin">Products</span>
                                <img className="flex w-4 justify-center items-center py-1 mx-1" src={side_bar_toggle_up} alt="logo" />
                            </button>
                        </div>
                       {menu_nav_2()}
                      </div>
                </div>
            </div>
        </>
    );
};

export default MenuNav;