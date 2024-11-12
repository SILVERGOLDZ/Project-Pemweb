    // List of items to autocomplete
    const items = ["Apple", "Banana", "Orange", "Mango", "Pineapple", "Peach", "Cherry", "Grape", "Watermelon", "Strawberry"];

    // Getting the input element
    const input = document.getElementById("searchInput");

    input.addEventListener("input", function() {
        const value = this.value.toLowerCase();
        closeAllLists();

        if (!value) return;

        // Create a div element to contain the autocomplete items
        const listContainer = document.createElement("div");
        listContainer.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(listContainer);

        // Check each item for match
        items.forEach(item => {
            if (item.toLowerCase().includes(value)) {
                const listItem = document.createElement("div");
                listItem.innerHTML = `<strong>${item.substring(0, value.length)}</strong>${item.substring(value.length)}`;
                listItem.classList.add("autocomplete-item");

                // On click, fill the search bar with the item and close suggestions
                listItem.addEventListener("click", () => {
                    input.value = item;
                    closeAllLists();
                });

                listContainer.appendChild(listItem);
            }
        });
    });

    function closeAllLists() {
        const items = document.getElementsByClassName("autocomplete-items");
        for (let item of items) {
            item.parentNode.removeChild(item);
        }
    }

    document.addEventListener("click", function(e) {
        closeAllLists();
    });
    //////////////////////////////////
    function addTag(tag) {
        const input = document.getElementById('searchInput');
        let currentText = input.value.trim();
        
        // If there’s already text, add a comma before the new tag
        if (currentText) {
            // Avoid adding duplicate tags
            if (!currentText.split(', ').includes(tag)) {
                input.value = currentText + ', ' + tag;
            }
        } else {
            input.value = tag;
        }

        // Focus back on the input field after adding the tag
        input.focus();
    }