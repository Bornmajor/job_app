

<script>
      function getUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);

            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
        getUserLocation()
        
        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            // You can now send these values to your server using fetch or another method.
            // console.log("Latitude: " + latitude);
            // console.log("Longitude: " + longitude);

            $.post("async/store_location_session.php",{latitude:latitude,longitude:longitude},function(data){
              console.log(data);
            })
            // Example: sending to server using fetch
            // fetch('process_location.php', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //     },
            //     body: JSON.stringify({ latitude, longitude }),
            // })
            // .then(response => response.json())
            // .then(data => console.log(data))
            // .catch(error => console.error('Error:', error));
        }
         
      function loadCompanyData(){
        $.ajax({
            url: "async/companies_data.php",
            type:"POST",
            success:function(data){
            if(!data.error){
            $('.load_company_data').html(data);       
            }
            
            }
          }); 
      }

      loadCompanyData();
     
      function loadJobData(){
        $.ajax({
            url: "async/jobs_data.php",
            type:"POST",
            success:function(data){
            if(!data.error){
            $('.load_jobs_data').html(data);       

            }
              
            }
          }); 
      }

      loadJobData();

  

      $('.auth-btn').click(function(e){
        let auth = $(this).attr("context-auth");
        $.post("async/auth_modal.php",{auth:auth},function(data){
            $('.auth_modal_feeds').html(data);
        })

    });

    $(".create_job_form").submit(function(e){
        e.preventDefault();
        let postData = $(this).serialize();
        $.post("async/create_job.php",postData,function(data){
            $('.create_job_feeds').html(data);
        });
        //load jobs data after adding
        loadJobData();
    })

    $(".add_org_title_form").submit(function(e){
      e.preventDefault();

      let postData = $(this).serialize();

      $.post("async/add_org_title.php",postData,function(data){
        $(".load_company_forms").html(data);


      })
    })
    //submit form

    //onchanges submit select 
    $('.filter_select_job').change(function(){
        $('.filter_job_form').submit();
      });

    //load all jobs in filter data
    function loadAllFilterJobs(){
    $.ajax({
      url:'async/filter_jobs.php',
      type:"POST",
            success:function(data){
            if(!data.error){
            $('.filter_results').html(data);       
            }
          }

    })
    }

    loadAllFilterJobs();

    $(".form_hero_section").submit(function(e){
      e.preventDefault();

      let ind_id = $(".industry").val();
      let exp_id = $(".experience").val();


      //https://localhost/apps/job_app/?page=job_filter
      // Example usage without a separate function
      const baseUrl = 'https://localhost/apps/job_app/?page=job_filter';
      const params = { ind_id:  ind_id, exp_id: exp_id };

      // Construct the URL with parameters
      const queryString = new URLSearchParams(params).toString();

      // Redirect the user
      window.location.href = `https://localhost/apps/job_app/?page=job_filter&${queryString}`;

      //console.log(ind_id,exp_id);
    })

    $(".filter_job_form").submit(function(e){
      e.preventDefault();

      let postData = $(this).serialize();

      $.post("async/filter_jobs.php",postData,function(data){
        $('.filter_results').html(data);
      })

      // console.log('Form submited',postData);

    });


    //submit form on select file 
    $(".upload_logo_file").change(function(){
              // Submit the form when a file is selected
              $('.upload_org_logo_form').submit();

    })

   $(".upload_org_logo_form").submit(function(e){
    e.preventDefault();

    $.ajax({
            url: "async/upload_organization_logo.php",
            type:"POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(data){
            if(!data.error){
              loadOrganizationLogo();    
            }
              
            }
          });

   })

   //load company logo in organization page
   function loadOrganizationLogo(){
    $.ajax({
      url:'async/load_organization_logo.php',
      type:"POST",
      success:function(data){
      if(!data.error){
      $('.logo_company_img').attr('src',data);  
      $('.logo_feed').html(data);      
      }
    }
    })

   }

   loadOrganizationLogo();

   $(".update_company_form").submit(function(e){
    e.preventDefault();

    let postData = $(this).serialize();

    $.post("async/update_company_data.php",postData,function(data){
      $(".update_company_feed").html(data);
    })
   });

   $(".update_profile_form").submit(function(e){
    e.preventDefault();

    let postData = $(this).serialize();

    $.post("async/update_user_data.php",postData,function(data){
      $(".update_profile_feeds").html(data);
    })
   
   })

   $(".support_mail_form").submit(function(e){
        e.preventDefault();

        $('.submit_support_btn').html('<i class="fas fa-spinner fa-spin"></i> Sending message...');
        $('.submit_support_btn').attr("disabled",true);

        let postData = $(this).serialize(data);
        $.post("async/send_support_mail.php",postData,function(data){
          $(".support_feeds").html(data);
          $('.submit_support_btn').attr("disabled",false);

          $(".support_mail_form")[0].reset();

        });
      })

      //load users docs in dashboard

      function loadUserDbDocs(){
    $.ajax({
    url:'async/dashboard_user_docs.php',
    type:"POST",
    success:function(data){
    if(!data.error){
    $('.load_users_db_docs').html(data);      
    }
    }
    })

    }

    loadUserDbDocs();

    $(".form_upload_user_docs_db").submit(function(e){

      e.preventDefault();

      $.ajax({
            url: "async/upload_user_docs_dashboard.php",
            type:"POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(data){
            if(!data.error){
              loadUserDbDocs();    
            }
              
            }
          });
      

    })
</script>

<script src="assets/js/all.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/myscript.js"></script>
</body>
</html>