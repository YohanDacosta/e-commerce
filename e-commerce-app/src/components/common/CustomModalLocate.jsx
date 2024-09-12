import React from 'react'

const CustomModalLocate = ({toggleLocate}) => {
  return (
    <div className='flex absolute top-5 w-full h-screen z-50 justify-center items-center bg-transparent'>
        <div className='flex my-4 p-6 bg-gray-100 shadow-lg max-h-max max-w-sm items-center rounded-md'>
            <div className='flex-col space-y-8 font-thin'>
                <div className='flex-col space-y-2'>
                    <p>The products that can be delivered in the province you select will be shown.</p>
                    <p>After completing a purchase you will be able to choose another recipient in the same province or in another province, to make a new purchase if you wish.</p>
                </div>
                <div className='flex-col space-y-3'>
                    <div>
                        <label className='ml-2' htmlFor="province">Province</label>
                        <select id="province" className='bg-gray-300 border rounded-md border-gray-300 px-4 py-2.5 w-full' name="">
                            <option value="">Basel</option>
                            <option value="">Bern</option>
                            <option value="">Zurich</option>
                        </select>
                    </div>
                    <div>
                        <label className='ml-2' htmlFor="municipality">Municipality</label>
                        <select id="muncipality" className='bg-gray-300 border rounded-md border-gray-300 px-4 py-2.5 w-full' name="">
                            <option value="">Base Land</option>
                            <option value="">Soloturn</option>
                            <option value="">Ditikon</option>
                        </select>
                    </div>
                </div>
                <div className='flex flex-row justify-end space-x-4 font-thin'>
                    <button type='button' className=' text-green-500 hover:bg-gray-200 shadow-md bg-gray-50 px-4 py-1 rounded-md' onClick={toggleLocate}>Cancel</button>
                    <button type='button' className='hover:bg-green-500 text-gray-600  bg-green-300 px-4 py-1 shadow-md rounded-md'>Agree</button>
                </div>
            </div>
        </div>
    </div>
  )
}

export default CustomModalLocate