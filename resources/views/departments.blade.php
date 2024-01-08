<x-layout>
        <div class="col py-3">
            <h3>Get all the departments information</h3>
            <p class="text-break text-wrap fs-5" style="width: 80%">
               Here are the different routes that you can use for retrieving the departments information.
            </p>
            <ul class="list-unstyled mt-5">
                <li class="my-4">
                  <h4>Get all the departments</h4>
                  <p>Here is the route for getting all the departments</p>                  
                    <code class="bg-dark p-2 text-light" >
                    GET https://sivarrestapi.herokuapp.com/api/departments
                  </code>
                  
                </li>
                <li class="my-4">
                  <h4>Get a department by id</h4>
                  <p>Search a department by id</p> 
                    <code class="bg-dark p-2 text-light" >
                    GET  https://sivarrestapi.herokuapp.com/api/departments/{id}
                  </code>
                  
                </li>
                <li class="my-4">
                  <h4 class="pb-2">Get a department by name</h4>
                  <p>You want to search a department by name, no problem, here is the route</p> 
                   <code class="bg-dark p-2 text-light" >
                    GET https://sivarrestapi.herokuapp.com/api/departments/search/{name}
                  </code>
                 
                </li>
                <li class="my-4">
                  <h4>Get the top-five largest departments</h4>
                  <p>Getting a little bit more of insights, sure thing, here is the route</p>
                  <code class="bg-dark p-2 text-light" >
                    GET https://sivarrestapi.herokuapp.com/api/departments/area/top-five
                  </code>
                 
                </li>
                
            </ul>
        </div>
</x-layout>