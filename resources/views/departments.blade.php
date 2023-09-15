<x-layout>
        <div class="col py-3">
            <h3>Get all the departments information</h3>
            <p class="text-break text-wrap fs-5" style="width: 80%">
               Here are the different routes that you can use for retrieving the departments information.
            </p>
            <ul class="list-unstyled mt-5">
                <li class="my-4">
                  <h4>Get all the departments</h4>
                  <p class="fw-bold">GET 
                    <code>
                      https://sivarrestapi.herokuapp.com/api/departments
                  </code>
                  </p>
                </li>
                <li class="my-4">
                  <h4>Get a department by id</h4>
                  <p class="fw-bold">GET 
                    <code class="text-primary" style="font-size: 1.1rem;" >
                      https://sivarrestapi.herokuapp.com/api/departments/{id}
                  </code>
                  </p>
                </li>
                <li class="my-4">
                  <h4 class="pb-2">Get a department by name</h4>
                   <code class="bg-dark p-2 text-light" >
                    GET https://sivarrestapi.herokuapp.com/api/departments/search/{name}
                  </code>
                 
                </li>
                <li class="my-4">
                  <h4>Get the top-five largest departments</h4>
                  <p class="fw-bold">GET 
                    <code class="text-primary" style="font-size: 1.1rem;" >
                      https://sivarrestapi.herokuapp.com/api/departments/area/top-five
                  </code>
                  </p>
                </li>
                 <li class="my-4">
                  <h4>Get a department by id</h4>
                  <p class="fw-bold">GET 
                    <code class="text-primary" style="font-size: 1.1rem;" >
                      https://sivarrestapi.herokuapp.com/api/departments/{id}
                  </code>
                  </p>
                </li>
            </ul>
        </div>
</x-layout>