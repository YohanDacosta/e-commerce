import React from 'react'
import { CustomCarousel } from '../components/common';

const HomePage = () => {
  return (
    <div className='flex h-[100%] w-[100%] bg-gray-200 px-4 py-2'>
        <div className='flex flex-col w-full'>
            {/* CAROUSEL */}
            <div className='flex w-full'>
                <CustomCarousel />
            </div>
            <div className=''></div>
            <div className=''></div>
            <div className=''></div>
            <div className=''></div>
        </div>
    </div>
  )
}

export default HomePage;