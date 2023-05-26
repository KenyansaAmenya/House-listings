<!DOCTYPE html>
<html>
<head>
  <title>SakaKeja</title>
  <style>
    .gallery {
      display: flex;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      scrollbar-width: thin;
      scrollbar-color: #888888 transparent;
    }

    .gallery::-webkit-scrollbar {
      height: 5px;
    }

    .gallery::-webkit-scrollbar-track {
      background-color: transparent;
    }

    .gallery::-webkit-scrollbar-thumb {
      background-color: #888888;
      border-radius: 2.5px;
    }

    .gallery img {
      scroll-snap-align: start;
      width: 700px;
      height: 500px;
      object-fit: cover;
      margin-right: 10px;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .gallery img:hover {
      transform: scale(1.1);
    }

    .gallery-controls {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
    }

    .gallery-controls button {
      background: none;
      border: none;
      font-size: 24px;
      cursor: pointer;
    }
  </style>
  <script>
    function scrollGallery(direction) {
      const gallery = document.getElementById('image-gallery');
      const scrollAmount = gallery.offsetWidth;
      const maxScrollLeft = gallery.scrollWidth - gallery.offsetWidth;

      if (direction === 'next') {
        gallery.scrollLeft += scrollAmount;
        if (gallery.scrollLeft >= maxScrollLeft) {
          gallery.scrollLeft = 0;
        }
      } else if (direction === 'prev') {
        gallery.scrollLeft -= scrollAmount;
        if (gallery.scrollLeft <= 0) {
          gallery.scrollLeft = maxScrollLeft;
        }
      }
    }

    let autoplayInterval;

    function startAutoplay() {
      autoplayInterval = setInterval(() => {
        scrollGallery('next');
      }, 5000);
    }

    function stopAutoplay() {
      clearInterval(autoplayInterval);
    }

    document.addEventListener('DOMContentLoaded', () => {
      const gallery = document.getElementById('image-gallery');
      gallery.addEventListener('mouseover', stopAutoplay);
      gallery.addEventListener('mouseout', startAutoplay);
      startAutoplay();
    });
  </script>
</head>
<body>
  <h1>Image Gallery</h1>
  <div class="gallery" id="image-gallery">
    <img src="{{asset('images/Bungalow.jpg')}}" alt="Front view">
    <img src="{{asset('images/Balcony.jpg')}}"alt="House Image 2">
    <img src="{{asset('images/bedroom.jpg')}}" alt="House Image 3">
    <img src="{{asset('images/dining.jpg')}}" alt="House Image 4">
    <img src="{{asset('images/Kitchen.jpg')}}" alt="Front view">
    <img src="{{asset('images/Livingroom.jpg')}}"alt="House Image 2">
    <img src="{{asset('images/TV.jpg')}}" alt="House Image 3">
    <img src="{{asset('images/views.jpg')}}" alt="House Image 4">
    <!-- Add more images as needed -->
  </div>
  <div class="gallery-controls">
    <button onclick="scrollGallery('prev')">&#8249;</button>
    <button onclick="scrollGallery('next')">&#8250;</button>
  </div>
</body>
</html>