document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("searchInput");
  const articles = document.querySelectorAll(".articles article");

  searchInput.addEventListener("input", function () {
    const keyword = this.value.toLowerCase();

    articles.forEach((article) => {
      const title = article.querySelector("h3").textContent.toLowerCase();
      const content = article.querySelector("p").textContent.toLowerCase();

      if (title.includes(keyword) || content.includes(keyword)) {
        article.style.display = "block";
      } else {
        article.style.display = "none";
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const searchInput = document.getElementById("searchInput");
  const articles = document.querySelectorAll(".articles article");
  const filterButtons = document.querySelectorAll(".article-filters button");

  // Filtrage par mot-clé
  searchInput.addEventListener("input", function () {
    const keyword = this.value.toLowerCase();

    articles.forEach((article) => {
      const title = article.querySelector("h3").textContent.toLowerCase();
      const content = article.querySelector("p").textContent.toLowerCase();
      const match = title.includes(keyword) || content.includes(keyword);

      article.style.display = match ? "block" : "none";
    });
  });

  // Filtrage par catégorie
  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      filterButtons.forEach((btn) => btn.classList.remove("active"));
      button.classList.add("active");

      const filter = button.getAttribute("data-filter");

      articles.forEach((article) => {
        const category = article.getAttribute("data-category");
        const keyword = searchInput.value.toLowerCase();
        const matchSearch = article.querySelector("h3").textContent.toLowerCase().includes(keyword) || article.querySelector("p").textContent.toLowerCase().includes(keyword);
        const matchCategory = filter === "all" || category === filter;

        article.style.display = (matchCategory && matchSearch) ? "block" : "none";
      });
    });
  });
});
