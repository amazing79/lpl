function searchBooks() 
{
    const controller = new AbortController ();
    
    const query = (search) => fetch(`https://gutendex.com/books?search=${search}`, 
                                { signal: controller.signal })
                                .then((response) => response.json ());
    
    return {
            controller, 
            query,
        };
}
       
const input = document.getElementById('search');
const books = document.getElementById("books");
    
let ctr;
let timeout;


input.addEventListener("input", (event) => {    

    if(timeout) {
        clearTimeout(timeout);
    }

    timeout = setTimeout( () => {
        if(ctr){
            console.log('abortando llamada previa con valor',event.target.value);
            ctr.abort();
        }
        const { query, controller } = searchBooks();
            
        ctr = controller;
            
        query(event.target.value)
            .then((response) => {
                books.innerHTML = "";
                response.results.forEach((book) => {
                    books.innerHTML += `<li>${book.title}</li>`;
                });
                ctr = null;
            })
            .catch(() => {   
                console.log ("fetch cancelado");
            });
    }, 1000);
});