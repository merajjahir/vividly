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
</style>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

     
    {{--=============== Image Upload ===============--}}
      
    <div class="container">
      <div class="row">
    <div class="pt-5 pb-5">
      <h1 class="d-flex flex-column text-center">
        <span>
          <span class="bg-gradient-to-tr from-cyan-500 to-blue-600 bg-clip-text text-transparent">
            Remove text</span><br>from any image</span></h1>
            <div class="d-flex">
              
              <div class="col-sm-12 col-lg-6 w-100 overflow-hidden rounded-3xl border-4 border-dashed border-black">
                <div class="d-flex flex-column align-items-center justify-center px-4 py-4 text-center cursor-pointer">
                  <p class=" text-center ">
                    <strong>

                      Primary Image
                    </strong>
                    <br>
                    Drag &amp; drop an image or click here to select
                  </p>
                  <input type="file" class=" " accept="image/png,image/jpeg">
                </div>
              </div>
              
              <div class="col-sm-12 col-lg-6 w-100 overflow-hidden rounded-3xl border-4 border-dashed border-black">
                <div class="d-flex flex-column align-items-center justify-center px-4 py-4 text-center cursor-pointer">
                  <p class=" text-center ">
                  <strong>
                    Masking Image
                  </strong>
                    <br>
                    Drag &amp; drop an image or click here to select
                  </p>
                  <input type="file" class=" " accept="image/png,image/jpeg">
                </div>
              </div>

            </div>
            
          </div>
      </div>
    </div>

    {{--=========== end Image Upload end ===========--}}

       

  </section><!-- End Hero -->

  <main id="main">
 
 
  </main><!-- End #main -->

</x-layout>