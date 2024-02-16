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

        .upload_text {}

        .custom-bg-light-blue-1 {
            background-color: #3498db14
        }

        .custom-text-dark-blue {
            color: #155783
        }

        .custom-text-light-blue {
            color: #15578394
        }

        .custom-w-fit {
            width: fit-content
        }

        .primary-btn {
            background: #3498db;
            padding: 12px 40px;
            margin-left: 30px;
            border-radius: 16px;
            color: #fff;
            border: none;
        }

        .primary-btn:hover {
            color: #fff;
            background: #4aa3df;
        }
    </style>


    <x-loader></x-loader>
    <!-- ======= Hero Section ======= -->
    
    <section class="d-flex align-items-center">
      <form id="img_submit_form" class="w-100" onsubmit="return image_processing(event,this)" action="" >
        @csrf
        {{-- =============== Image Upload =============== --}}
        <div class="container">
            <div class="row">
                <div class="pt-5 pb-5">
                    <h1 class="d-flex flex-column text-center">
                        <span>
                            <span class="bg-gradient-to-tr from-cyan-500 bg-clip-text text-transparent">
                                Remove unwanted objects or defects </span><br>from your pictures
                        </span>
                    </h1>
                    <div class="d-flex justify-content-around mt-5 row">

                        <div
                            class="col-sm-12 col-12 col-lg-4 col-md-5  overflow-hidden  rounded-4 position-relative custom-bg-light-blue-1">
                            <div
                                class="d-flex flex-column align-items-center justify-center py-5 text-center cursor-pointer ">
                                <p class=" text-center ">
                                    <strong class="custom-text-dark-blue" role='button'>

                                        Primary Image
                                    </strong>
                                    <br><br>
                                    <span class="custom-text-light-blue">

                                        Drag &amp; drop an image or click here to select
                                    </span>
                                </p>
                            <img src="#" style="display: none" id="primary_image_img_tag" width="200px" />

                            </div>
                            <div class="h-100 w-100 opacity-0 bg-black top-0 position-absolute">

                                <input type="file" onchange="preview_uploading_image('primary_image')" name="primary_image" id="primary_image" class="h-100 w-100 " accept="image/png,image/jpeg">
                            </div>
                        </div>

                        <div
                            class="col-sm-12 col-12 col-lg-4 col-md-5  overflow-hidden  rounded-4 position-relative custom-bg-light-blue-1 mt-lg-0 mt-md-0 mt-sm-5 mt-5">
                            <div class="d-flex flex-column align-items-center justify-center py-5 text-center ">
                                <p class=" text-center ">
                                    <strong class="custom-text-dark-blue">

                                        Masking Image
                                    </strong>
                                    <br><br>
                                    <span class="custom-text-light-blue">

                                        Drag &amp; drop an image or click here to select
                                    </span>
                                </p>
                            <img src="" style="display: none" id="masking_image_img_tag" width="200px" />

                            </div>
                            <div class="h-100 w-100 opacity-0 bg-black top-0 position-absolute">

                                <input type="file" onchange="preview_uploading_image('masking_image')" name="masking_image" id="masking_image" class="h-100 w-100 " accept="image/png,image/jpeg">
                                
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
        {{-- =========== end Image Upload end =========== --}}

      </form>
      <div id="preview">
      </div>

    </section>
    
    <!-- End Hero -->


    <script>
        function preview_uploading_image(input_class_id){
            preview_img = document.getElementById(`${input_class_id}_img_tag`);
            source_img = document.getElementById(`${input_class_id}`) ? document.getElementById(`${input_class_id}`) : '' ;
            preview_img.style.display = 'block';

            let [file] = source_img.files
            if (file) {
                preview_img.src = URL.createObjectURL(file)
            }
        }

        let url_post_image_url = "{{ route('post_cleanup');}}";
        function image_processing(event,form){
            
            event.preventDefault();
            
            let formData = new FormData(form);
            formData.append('_token', '{{ csrf_token() }}');

            console.log('from submited');
            console.log(url_post_image_url);
            loader_status(true)
            
            fetch(url_post_image_url, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                return response.json()
            })
            .then(data => {
                

                if(data.status =='error')
                {
                    console.log(data);
                    let clientError = data.client_error.split(' response:')[0].split('Client error:')[1].trim();
                    let mainError = data.client_error.split(' response:\n')[1].trim();
    
                    let notyf = new Notyf();
                    notyf.error(`${clientError}`);
 
                }else{
                    document.getElementById('modalImage').src = data.processed_image_path;
                    document.getElementById('downloadButton').href = data.processed_image_path;
                    const modal = new bootstrap.Modal(document.getElementById('imageModal'));
                    modal.show();

                    let notyf = new Notyf();
                    notyf.success(`${data.message}`);
                }
                loader_status(false)

            })
            .catch(error => {
                loader_status(false)
                console.log(error);
             
            });
        }


    </script>

</x-layout>
