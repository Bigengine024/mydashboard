// NAVBAR TOGGLE
const toggle = document.querySelector(".menu-toggle");
const navLinks = document.querySelector(".nav-links");

toggle.addEventListener("click", () => {
  navLinks.classList.toggle("active");
});


// MODAL
const modal = document.getElementById("modal");
const openBtn = document.getElementById("openModal");
const closeBtn = document.querySelector(".close");

openBtn.addEventListener("click", () => {
  modal.style.display = "block";
});

closeBtn.addEventListener("click", () => {
  modal.style.display = "none";
});

// CLOSE MODAL WHEN CLICKING OUTSIDE
window.addEventListener("click", (e) => {
  if (e.target === modal) {
    modal.style.display = "none";
  }
});


// FETCH POSTS WITH ASYNC/AWAIT
async function fetchPosts() {
  const postsContainer = document.getElementById("posts");

  postsContainer.innerHTML = "<p>Loading...</p>";

  try {
    const response = await fetch("https://jsonplaceholder.typicode.com/posts");

    if (!response.ok) {
      throw new Error("Failed to fetch posts");
    }

    const data = await response.json();

    postsContainer.innerHTML = "";

    data.slice(0, 6).forEach(post => {
      const card = document.createElement("div");
      card.classList.add("card");

      const title = document.createElement("h3");
      title.textContent = post.title;

      const body = document.createElement("p");
      body.textContent = post.body;

      card.appendChild(title);
      card.appendChild(body);

      postsContainer.appendChild(card);
    });

  } catch (error) {
    postsContainer.innerHTML = "<p>Error loading posts. Please try again.</p>";
    console.error(error);
  }
}

fetchPosts();