document.addEventListener("DOMContentLoaded", () => {
    document.getElementById('searchbar').addEventListener('keyup', () => {
        let searchValue = document.getElementById("searchbar").value;
        const route = '/search/' + searchValue;
        searchList = document.getElementById('searchlist');
        searchList.innerHTML = "";


        fetch(route)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Http error! Status : ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                data.forEach(product => {
                    const listItem = document.createElement('li');
                    listItem.textContent = product.name;
                    searchList.appendChild(listItem);
                });
            })
            .catch(error => {
                console.error('Error: ', error)
            })
    });

})


