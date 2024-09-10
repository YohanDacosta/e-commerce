import React, { useState } from 'react'
import { close, side_bar_toggle_up, side_bar_toggle_down  } from '../../assets';

const SideBar = ({isOpen, toggleSideBar}) => {
    const [openListFoods, setOpenListFoods] = useState(false);

    const handleClickFoods = () => {
        setOpenListFoods(!openListFoods);
    }

    return (
        <aside className={`transition-all duration-500 ease-in-out transform ${isOpen ? 'translate-x-0 opacity-100' : '-translate-x-full opacity-0' } absolute top-0 left-0 bg-gray-100 h-[100%] max-h-[100%] w-[100%] max-w-[400px] overflow-scroll`}>
            <div className='flex-col'>
                <div className='flex-row h-[50px] px-6 py-3 w-full'>
                    <a className='flex h-[30px] justify-end'><img className='hover:cursor-pointer' onClick={toggleSideBar} src={close} alt="close" /></a>
                </div>
                <div className='flex w-full'>
                    <ul className='w-full my-4 ml-8 mr-2 space-y-2'>
                        <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Home</li>
                        <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>All Products</li>
                        <li className='flex flex-col items-start justify-between'>
                            <button type="button" className='flex justify-between w-full hover:bg-gray-300 py-2 px-4 rounded-sm' onClick={handleClickFoods}>
                                <span className="font-thin">Foods</span>
                                <img className='mx-2 w-6 h-6' src={!openListFoods ? side_bar_toggle_up : side_bar_toggle_down} alt="side_bar_toggle" />
                            </button>
                            <ul id="dropdown-side-bar" className={`${openListFoods ? 'block' : 'hidden'} ml-4 py-2 space-y-1`}>
                                <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Meats and sausages</li>
                                <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Dairies and eggs</li>
                                <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Fish and seafood</li>
                                <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Oils and fats</li>
                                <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Vegetables, fruits and viands</li>
                                <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Breads</li>
                                <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Water, juices, malt and soft drinks</li>
                                <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Cooking accessories</li>
                            </ul>
                        </li>
                        <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Personal and House grooming</li>
                        <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Electrical appliances</li>
                        <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Hardware stores</li>
                        <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Liquoreria</li>
                        <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Offers</li>
                        <hr />
                        <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Catalogue</li>
                        <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Wallet MarKuba</li>
                        <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Rewards</li>
                        <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Payment</li>
                        <li className='font-thin hover:bg-gray-300 py-2 px-4 rounded-sm'>Shipment</li>
                    </ul>
                </div>
            </div>
        </aside>
    )
}

export default SideBar