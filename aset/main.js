document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('navbarSearchInput');
    const searchResults = document.getElementById('searchResults');

    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const query = this.value;

            if (query.length > 2) {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', '../search/live_search_packages.php?q=' + encodeURIComponent(query), true);
                xhr.onload = function() {
                    if (this.status === 200) {
                        searchResults.innerHTML = this.responseText;
                        searchResults.style.display = 'block';
                    }
                }
                xhr.send();
            } else {
                searchResults.style.display = 'none';
            }
        });

        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target)) {
                searchResults.style.display = 'none';
            }
        });
    }
});