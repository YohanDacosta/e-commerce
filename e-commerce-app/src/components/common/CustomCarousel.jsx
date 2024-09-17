import React, { useState, useEffect } from 'react';
import { not_image, toggle_left, toggle_right, img_carousel_1, img_carousel_2, img_carousel_3, img_carousel_large_1, img_carousel_large_2, img_carousel_large_3} from '../../assets';

const CustomCarousel = () => {
  const images = [
    { src: img_carousel_1, src_l: img_carousel_large_1, alt: 'Image 1' },
    { src: img_carousel_2, src_l: img_carousel_large_2, alt: 'Image 2' },
    { src: img_carousel_3, src_l: img_carousel_large_3, alt: 'Image 3' }
  ];

  const [currentIndex, setCurrentIndex] = useState(0);
  const [windowSize, setWindowSize] = useState({
    width: window.innerWidth,
    height: window.innerHeight,
  });

  const handleResize = () => {
    setWindowSize({
      width: window.innerWidth,
      height: window.innerHeight,
    });
  };

  const nextImage = () => {
    setCurrentIndex((prevIndex) => (prevIndex + 1) % images.length);
  };

  const prevImage = () => {
    setCurrentIndex((prevIndex) => (prevIndex - 1 + images.length) % images.length);
  };

  const goToImage = (index) => {
    setCurrentIndex(index);
  };

  useEffect(() => {
    const interval = setInterval(nextImage, 5000);
    return () => clearInterval(interval);
  }, []);

  useEffect(() => {
    window.addEventListener('resize', handleResize);
    
    return () => {
      window.removeEventListener('resize', handleResize);
    };
  }, []);

  return (
    <div className="flex h-[30rem] md:h-[48rem] lg:h-[22rem] lg:w-[88rem] shadow-lg w-full mx-auto object-contain object-center overflow-hidden -z-30">
      <div className="flex w-full relative">
        <img
          className="flex w-full object-fill object-center"
          src={windowSize.width <= "1024" ? images[currentIndex].src : images[currentIndex].src_l}
          alt={images[currentIndex].alt}
        />

        <div className="flex absolute bottom-5 left-1/2 z-50 space-x-3 -translate-x-1/2">
          {images.map((_, index) => (
            <button
              key={index}
              onClick={() => goToImage(index)}
              className={`w-3 h-3 rounded-full ${index === currentIndex ? 'bg-gray-800' : 'bg-gray-500'}`}
            ></button>
          ))}
        </div>

        <button
          type="button"
          className="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
          onClick={prevImage}
        >
          <span className="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60">
            <img className="p-1" src={toggle_right} alt="Previous" />
          </span>
        </button>
        <button
          type="button"
          className="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
          onClick={nextImage}
        >
          <span className="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60  group-focus:outline-none">
            <img className="p-1" src={toggle_left} alt="Next" />
          </span>
        </button>
      </div>
    </div>
  );
};

export default CustomCarousel;
