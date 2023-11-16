document.addEventListener("DOMContentLoaded", function() {
    const rating1 = document.getElementById("rating1").querySelectorAll(".fa-star");
    const rating2 = document.getElementById("rating2").querySelectorAll(".fa-star");

    addClickListener(rating1);
    addClickListener(rating2);

    function addClickListener(rating) {
        rating.forEach((star) => {
            star.addEventListener("click", function() {
                const currentRating = this.getAttribute("data-rating");
                removeAllActive(rating);
                highlightStars(rating, currentRating);
            });
        });
    }

    function removeAllActive(rating) {
        rating.forEach((star) => {
            star.classList.remove("checked");
        });
    }

    function highlightStars(rating, currentRating) {
        for (let i = rating.length - 1; i >= currentRating - 1; i--) {
            rating[i].classList.add("checked");
        }
    }
});