// api key = 45db54b719c5fbddd3268a480d8a917a
// movie details = https://api.themoviedb.org/3/movie/616820?api_key=<<api_key>>&language=en-US
// popular url = https://api.themoviedb.org/3/movie/popular?api_key=45db54b719c5fbddd3268a480d8a917a&poster_path&images
// trending url = https://api.themoviedb.org/3/trending/all/day?api_key=<<api_key>>
//Discover url = https://api.themoviedb.org/3/discover/movie?api_key={api_key}&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate
// https://api.themoviedb.org/3/search/movie?api_key={apikey}&query={search term}
const apikey = '45db54b719c5fbddd3268a480d8a917a';
const imgPath = 'https://image.tmdb.org/t/p/w500/';
const trending_Movies = document.querySelector('.trending_movie_Card');
const discover_Movies = document.querySelector('.discover_movie_Card');
const popular_Movies = document.querySelector('.popular_movie_Card');
const popup_Container = document.querySelector('#popup');
const close_popup = document.querySelector('.close_popup');
const movie_detail = document.querySelector('.movie_details')
const movieSearchBox = document.querySelector('.search_bar')
const movieSearchList = document.querySelector('#search-list')
const trend_prev = document.querySelector('.prevbtn_trending')
const trend_next = document.querySelector('.nextbtn_trending')
const disc_prev = document.querySelector('.prevbtn_discover')
const disc_next = document.querySelector('.nextbtn_discover')
const popular_prev = document.querySelector('.prevbtn_popular')
const popular_next = document.querySelector('.nextbtn_popular')

// click event for pop-up
function click_to_popup(cards){
  cards.forEach(card => {
    card.addEventListener("click", () => show_pop(card));
  });
}
// get the movie genre
function get_Movie_Genre(el, ids){
  fetch('https://api.themoviedb.org/3/genre/movie/list?api_key=45db54b719c5fbddd3268a480d8a917a&language=en-US')
    .then(respData => respData.json())
    .then(data => {
      genres = data.genres;
      genres.map(genre => {
        if (ids.includes(genre.id)){
          document.querySelector('#'+el+' h4').innerHTML += `<span>${genre.name}</span>`;
        }
      });
    });
    return "";
}
//search box on search term
async function loadMovies(searchTerm){
  const res = await fetch('https://api.themoviedb.org/3/search/movie?api_key=' + apikey + '&query=' + searchTerm)
  const data = await res.json();
  if(data.response = "true") displayMovieList(data.results);
}

function findMovies(){
  let searchTerm = (movieSearchBox.value).trim();
  if(searchTerm.length > 0){
    movieSearchList.classList.remove('hide-search-list');
    loadMovies(searchTerm);
  }else{
    movieSearchList.classList.add('hide-search-list');
  }

}

function displayMovieList(movies){
  movieSearchList.innerHTML = "";
  for(let i = 0; i < movies?.length; i++){
      let movieListItem = document.createElement('div');
      movieListItem.dataset.id = movies[i].imdbID;
      movieListItem.classList.add('search-list-item');
      if(movies[i].poster_path != ""){
          moviePoster = imgPath + movies[i].poster_path;
      } else {
          moviePoster = "image_not_found.jpg";
        };
      movieListItem.innerHTML = `
      <div class= "movie_card_search" data-id="${movies[i].id}">
      <div class = "search-item-thumbnail"  >
          <img src = "${moviePoster}">
      </div>
      <div class = "search-item-info">
          <h3>${movies[i].original_title}</h3>
          <p>${movies[i].release_date}</p>
      </div>
      </div>
      `;
      const cards = document.querySelectorAll('.movie_card_search');
      click_to_popup(cards);
      movieSearchList.appendChild(movieListItem);

  }
}

window.onload = function(){
  document.onclick = function(event){
    if(event.target.class !== "search-list")
    {
      movieSearchList.classList.add('hide-search-list');
    }
  };
};
// search box ends
// get the trending movie
async function get_Trending_Movies(){
  const resp = await fetch('https://api.themoviedb.org/3/trending/movie/day?api_key=' + apikey)
  const respData = await resp.json();
  // posts = respData.results.slice(0,6);
  posts = respData.results;
  posts.map((posts, idx) => {  //how to get genre ID from the api and display
    trending_Movies.innerHTML += `
    <div class="movies_card" data-id="${posts.id}" id="tmovies_card${idx}">
    <img src="${imgPath + posts.poster_path}">
    <h3>${posts.title}</h3>
    <div class= "movie_card_details">
    <h3>${posts.title}</h3>
    <h2><span>Release data : </span>${posts.release_date}</h2>
    <span><span>language available </span>: ${posts.original_language}</span>
    <h4>${get_Movie_Genre(`tmovies_card${idx}`, posts.genre_ids)}</h4>
    <p><span>Sypnosis: </span>${posts.overview}</p>
    </div>
    </div>
    `;
  });
  const cards = document.querySelectorAll('.movies_card');
  click_to_popup(cards);

}
get_Trending_Movies();

// getting movies to discover
async function get_Discover_Movies(){
  const resp = await fetch('https://api.themoviedb.org/3/discover/movie?api_key=' + apikey + '&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=1&with_watch_monetization_types=flatrate')
  const respData = await resp.json();
  posts = respData.results.slice(0,6);
  posts.map((posts, idx) => {
    discover_Movies.innerHTML += `
    <div class="movies_card" data-id="${posts.id}" id="dmovies_card${idx}">
    <img src="${imgPath + posts.poster_path}">
    <h3>${posts.title}</h3>
    <div class= "movie_card_details">
    <h3>${posts.title}</h3>
    <h2><span>Release data : </span>${posts.release_date}</h2>
    <span><span>language available </span>: ${posts.original_language}</span>
    <h4>${get_Movie_Genre(`dmovies_card${idx}`, posts.genre_ids)}</h4>
    <p><span>Sypnosis: </span>${posts.overview}</p>
    </div>
    </div>
    `;
  });
  const cards = document.querySelectorAll('.movies_card');
  click_to_popup(cards);
}
get_Discover_Movies()
// getting popular movies
async function get_popular_movies(){
  const resp = await fetch('https://api.themoviedb.org/3/movie/popular?api_key=' + apikey + '&poster_path&images')
  const respData = await resp.json();
  posts = respData.results.slice(6,12);
  posts.map((posts, idx) => {
    popular_Movies.innerHTML += `
    <div class="movies_card" data-id="${posts.id}" id="pmovies_card${idx}">
    <img src="${imgPath + posts.poster_path}">
    <h3>${posts.title}</h3>
    <div class= "movie_card_details">
    <h3>${posts.title}</h3>
    <h2><span>Release data : </span>${posts.release_date}</h2>
    <span><span>language available </span>: ${posts.original_language}</span>
    <h4>${get_Movie_Genre(`pmovies_card${idx}`, posts.genre_ids)}</h4>
    <p><span>Sypnosis: </span>${posts.overview}</p>
    </div>
    </div>
    `;
  });
  const cards = document.querySelectorAll('.movies_card');
  click_to_popup(cards);

}
get_popular_movies()


// popup styling
async function show_pop(cards){
  popup_Container.classList.add("show");//show the popup
  close_popup.addEventListener('click',() => {
    popup_Container.classList.remove("show");
  });
  const movie_ID = cards.getAttribute("data-id");
  const resp = await fetch('https://api.themoviedb.org/3/movie/' + movie_ID +'?api_key=' + apikey + '&language=en-US') //get the movie id
  const moviedetails = await resp.json();
  console.log(moviedetails);
  let genre = moviedetails.genres; //
  let genreprint = JSON.stringify(genre);
  document.querySelector('.poster1').src = `${imgPath + moviedetails.poster_path}`;
  document.querySelector('.movie_title').innerHTML = `${moviedetails.title}`;
  document.querySelector('.movie_release_year').innerHTML = `${moviedetails.release_date}`;
  document.querySelector('.movie_genre').innerHTML = `${genreprint}`;
  document.querySelector('.movie_runtime').innerHTML = `${moviedetails.runtime} mins`;
  document.querySelector('.movie_sypnosis').innerHTML = `${moviedetails.overview}`;
  document.querySelector('.movie_langauge').innerHTML = `${moviedetails.original_language}`;
  document.querySelector('.movie_revenue').innerHTML = `$${moviedetails.revenue}`;
  document.querySelector('.movie_title').innerHTML = `${moviedetails.original_title}`;
  console.log(movie_ID);
}

// function for slider
let index = 0;

trend_next.addEventListener('click',() => {
  index++;
  if(index > trending_Movies.length){
    changeSlide(index);
  }else{
    index = 0;
    changeSlide(index);
  }
});

trend_prev.addEventListener('click',() => {
  index++;
  if(index > 0){
    index=-1
    changeSlide(index);
  }else{
    index = -1;
    changeSlide(index);
  }
});
function changeSlide(index){
  trending_movies.map((i) => {
    if(i == index){
      trending_Movies.style.transform = `translate(-${index*1825}px)`;
    }
    });
  }


// function get_ls(){
//   localStorage.setItem("ID","25255");
//   // localStorage.removeItem("ID");
//   console.log(localStorage);
// }
// get_ls();
