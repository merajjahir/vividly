<x-layout>
  
  <x-slot:title>
    CleanUP Image

  </x-slot> 
<style>
  .upload {
    position: absolute;
    top: 0px;
    bottom: 0px;
    right: 0px;
    left: 0px;
    visibility: hidden;
  }
  .upload_text {

  }
  .custom-bg-light-blue-1{
background-color:#3498db14
  }
  .custom-text-dark-blue{
    color: #155783
  }
  .custom-text-light-blue{
    color: #15578394
  }
  .custom-w-fit{
    width: fit-content
  }
  .primary-btn{
        background: #3498db;
    padding: 12px 40px;
    margin-left: 30px;
    border-radius: 16px;
    color: #fff;
    border: none;
  }
  .primary-btn:hover{
        color: #fff;
    background: #4aa3df;
  }
</style>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

     
    {{--=============== Image Upload ===============--}}
    <div class="container">
      <div class="row">
    <div class="pt-5 pb-5">
        <h1 class="d-flex flex-column text-center">
          <span > 
            <span class="bg-gradient-to-tr from-cyan-500 bg-clip-text text-transparent" >
              Remove text</span><br>from any image
          </span>
        </h1>
            <div class="d-flex justify-content-around mt-5 row">
              
              <div class="col-sm-12 col-12 col-lg-4 col-md-5  overflow-hidden  rounded-4 position-relative custom-bg-light-blue-1">
                <div class="d-flex flex-column align-items-center justify-center py-5 text-center cursor-pointer ">
                  <p class=" text-center ">
                    <strong class="custom-text-dark-blue" role='button'>

                      Primary Image
                    </strong>
                    <br><br>
                    <span class="custom-text-light-blue">

                      Drag &amp; drop an image or click here to select
                    </span>
                  </p>
                </div>
                <div class="h-100 w-100 opacity-0 bg-black top-0 position-absolute">

                  <input type="file" class="h-100 w-100 " accept="image/png,image/jpeg">
                </div>
              </div>

              <div class="col-sm-12 col-12 col-lg-4 col-md-5  overflow-hidden  rounded-4 position-relative custom-bg-light-blue-1 mt-lg-0 mt-md-0 mt-sm-5 mt-5" >
                <div class="d-flex flex-column align-items-center justify-center py-5 text-center ">
                  <p class=" text-center ">
                    <strong class="custom-text-dark-blue" role='button'>

                      Masking Image
                    </strong>
                    <br><br>
                    <span class="custom-text-light-blue">

                      Drag &amp; drop an image or click here to select
                    </span>
                  </p>
                </div>
                <div class="h-100 w-100 opacity-0 bg-black top-0 position-absolute">

                  <input type="file" class="h-100 w-100 " accept="image/png,image/jpeg">
                </div>
              </div>

              
              
              
            </div>
            
          </div>
          <div class="col-12">

            <div class="mx-auto custom-w-fit ">

              <button class="primary-btn">
              <h4 class="mb-0">

                Submit
              </h4>  
            </button>
            </div>
          </div>
      </div>
    </div>

    {{--=========== end Image Upload end ===========--}}

       

  </section><!-- End Hero -->

  <main id="main">
 
 
  </main><!-- End #main -->

</x-layout>