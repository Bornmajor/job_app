
const button = document.getElementById("orgModalButton");

button.addEventListener("click", function() {
  // Code to be executed when the button is clicked (optional)
  console.log("Button clicked!");


});

// Optionally, trigger the click programmatically


 const urlParams = new URLSearchParams(window.location.search);
  const register_company = urlParams.get('register_company');

  if(register_company === 'true'){
   button.click(); // This will hide the button immediately
  }

// openModal(); // Open the modal initially 
  // Get the value of the 'page' parameter from the URL

 
    const pageParam = urlParams.get('page');
    console.log(pageParam);

    //

    // Check if the 'page' parameter is equal to 'home'
    if (pageParam === 'dashboard') {
      // Create a new span element using jQuery
      const newSpan = $('<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"aria-hidden="true"></span>');

      // Append the new span element at the top of the container using jQuery
      $('.dashboard-nav-link').prepend(newSpan);
    }else if(pageParam === 'jobs'){
         // Create a new span element using jQuery
      const newSpan = $('<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"aria-hidden="true"></span>');

    // Append the new span element at the top of the container using jQuery
    $('.jobs-nav-link').prepend(newSpan); 

    }else if(pageParam === 'applications'){
         // Create a new span element using jQuery
      const newSpan = $('<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"aria-hidden="true"></span>');

    // Append the new span element at the top of the container using jQuery
    $('.applications-nav-link').prepend(newSpan); 

    }else if(pageParam === 'companies'){
         // Create a new span element using jQuery
      const newSpan = $('<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"aria-hidden="true"></span>');

    // Append the new span element at the top of the container using jQuery
    $('.companies-nav-link').prepend(newSpan); 

    }else if(pageParam === 'users'){
         // Create a new span element using jQuery
      const newSpan = $('<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"aria-hidden="true"></span>');

    // Append the new span element at the top of the container using jQuery
    $('.users-nav-link').prepend(newSpan); 

    }else if(pageParam === 'organization'){
      // Create a new span element using jQuery
   const newSpan = $('<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"aria-hidden="true"></span>');

    // Append the new span element at the top of the container using jQuery
    $('.organization-nav-link').prepend(newSpan); 

    }else{
                // Create a new span element using jQuery
            const newSpan = $('<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"aria-hidden="true"></span>');

    // Append the new span element at the top of the container using jQuery
    $('.dashboard-nav-link').prepend(newSpan);

    }

   // organization-nav-link