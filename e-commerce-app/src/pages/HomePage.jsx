import React from 'react'
import { CustomCarousel } from '../components/common';
import { suggestion_1, suggestion_2, popular_1 } from '../../public/images'
import { cart, star_black, star_white } from '../assets';
import {ButtonAction} from '../components/common';

const HomePage = () => {
  const array = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20];

  return (
    <div className='flex h-[100%] w-[100%] px-4 py-2 mt-4 xl:w-[88rem] justify-center items-center'>
        <div className='flex flex-col h-full w-full'>
            
            
            {/* CAROUSEL */}
            <div className='flex w-full'>
                <CustomCarousel />
            </div>


            
            {/* NAVIGATIONS */}
            <div className='flex w-full h-[17rem] mt-6 mb-2 gap-x-2 overflow-x-auto whitespace-normal'>
                
                <div className='flex flex-col min-w-[160px] max-w-[200px] justify-center items-center rounded-lg border py-2 shadow-sm'>
                  <div className='flex basis-2/6 items-center'>
                    <p className='flex text-ellipsis whitespace-normal overflow-x-hidden py-2 px-4'>Special Gifts</p>
                  </div>
                  <div className='flex basis-4/6 overflow-y-hidden'>
                    <img className='w-full h-full object-cover' src={ suggestion_1 } alt="special gifts" />
                  </div>
                </div>

                <div className='flex flex-col min-w-[160px] max-w-[200px] justify-center items-center rounded-lg border py-2 shadow-sm'>
                  <div className='flex basis-2/6 items-center'>
                    <p className='flex text-ellipsis whitespace-normal overflow-x-hidden py-2 px-4'>Special Gifts Special Gifts Special Gifts Special Gifts</p>
                  </div>
                  <div className='flex basis-4/6 overflow-y-hidden'>
                    <img className='w-full h-full object-cover' src={ suggestion_1 } alt="special gifts" />
                  </div>
                </div>

                <div className='flex flex-col min-w-[160px] max-w-[200px] justify-center items-center rounded-lg border py-2 shadow-sm'>
                  <div className='flex basis-2/6 items-center'>
                    <p className='flex text-ellipsis whitespace-normal overflow-x-hidden py-2 px-4'>Special Gifts</p>
                  </div>
                  <div className='flex basis-4/6 overflow-y-hidden'>
                    <img className='w-full h-full object-cover' src={ suggestion_1 } alt="special gifts" />
                  </div>
                </div>

                <div className='flex flex-col min-w-[160px] max-w-[200px] justify-center items-center rounded-lg border py-2 shadow-sm'>
                  <div className='flex basis-2/6 items-center'>
                    <p className='flex text-ellipsis whitespace-normal overflow-x-hidden py-2 px-4'>Special Gifts Special Gifts Special Gifts Special Gifts</p>
                  </div>
                  <div className='flex basis-4/6 overflow-y-hidden'>
                    <img className='w-full h-full object-cover' src={ suggestion_1 } alt="special gifts" />
                  </div>
                </div>

                <div className='flex flex-col min-w-[160px] max-w-[200px] justify-center items-center rounded-lg border py-2 shadow-sm'>
                  <div className='flex basis-2/6 items-center'>
                    <p className='flex text-ellipsis whitespace-normal overflow-x-hidden py-2 px-4'>Special Gifts Special Gifts Special Gifts Special Gifts</p>
                  </div>
                  <div className='flex basis-4/6 overflow-y-hidden'>
                    <img className='w-full h-full object-cover' src={ suggestion_1 } alt="special gifts" />
                  </div>
                </div>

                <div className='flex flex-col min-w-[160px] max-w-[200px] justify-center items-center rounded-lg border py-2 shadow-sm'>
                  <div className='flex basis-2/6 items-center'>
                    <p className='flex text-ellipsis whitespace-normal overflow-x-hidden py-2 px-4'>Special Gifts Special Gifts Special Gifts Special Gifts</p>
                  </div>
                  <div className='flex basis-4/6 overflow-y-hidden'>
                    <img className='w-full h-full object-cover' src={ suggestion_1 } alt="special gifts" />
                  </div>
                </div>

                <div className='flex flex-col min-w-[160px] max-w-[200px] justify-center items-center rounded-lg border py-2 shadow-sm'>
                  <div className='flex basis-2/6 items-center'>
                    <p className='flex text-ellipsis whitespace-normal overflow-x-hidden py-2 px-4'>Special Gifts Special Gifts Special Gifts Special Gifts</p>
                  </div>
                  <div className='flex basis-4/6 overflow-y-hidden'>
                    <img className='w-full h-full object-cover' src={ suggestion_1 } alt="special gifts" />
                  </div>
                </div>

            </div>
            
            
            
            {/* SUGGESTIONS */}
            <div className='flex flex-col'>
              <span className='font-extrabold px-2 py-4 text-3xl'>New Suggestions</span>
              <div className='grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-x-2 w-full'>

              {array.map((index) => {
                return (
                  <div key={index} className='flex flex-col w-[100%] md:w-full md:max-w-[18rem] rounded-3xl shadow-2xl font-thin'>
                  
                  {/*  */}
                  <div className='flex min-h-[13rem] m-4'>
                    <img className='rounded-3xl w-full h-full md:object-cover object-contain' src={ popular_1 } alt="special gifts" />
                  </div>
                  
                  {/*  */}
                  <div className='flex flex-col gap-y-2 px-2 mb-4'>
                    <p>Condensed milk Southern Star, 380g</p>
                    <div className='flex gap-x-1 w-[20px]'>
                      <img className='w-full h-full object-cover' src={ star_black } alt="special gifts" />
                      <img className='w-full h-full object-cover' src={ star_black } alt="special gifts" />
                      <img className='w-full h-full object-cover' src={ star_black } alt="special gifts" />
                      <img className='w-full h-full object-cover' src={ star_white } alt="special gifts" />
                      <img className='w-full h-full object-cover' src={ star_white } alt="special gifts" />
                      <span className='ml-1 font-serif'>37</span>
                    </div>
                    <span className='text-green-500 font-semibold'>1,90 &euro;</span>
                  </div>
                  
                  {/*  */}
                  <div className='flex flex-col gap-y-2 w-full px-4 mb-4'>
                    <button className='flex w-full border border-green-500 rounded-md px-6 py-1 justify-between'>
                      <span>&minus;</span>
                      <span>&#124;</span>
                      <span>1</span>
                      <span>&#124;</span>
                      <span>+</span>
                    </button>
                    <button className='flex justify-center w-full bg-green-500 rounded-md px-4 py-1'>Add</button>
                  </div>



                </div>
                )
              }
              )}

              </div>

            </div>

            {/* THE MOST POPULAR */}
            <div className='flex w-full my-8'>
              <div className='flex flex-col bg-blue-100 h-[17rem] w-full'>

              </div>
            </div>
            {/* LATEST */}
            <div className='flex w-full my-8'>
              <div className='bg-blue-100 h-[17rem] w-full'>
                <h1>Latest</h1>
              </div>
            </div>
        </div>
    </div>
  )
}

export default HomePage;